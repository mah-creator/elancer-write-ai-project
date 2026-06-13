<?php

namespace App\Models;

use App\Enums\PostStatus;
use App\Models\Scopes\OwnerScope;
use App\Models\Scopes\PublishedScope;
use App\Observers\PostObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

#[ScopedBy([OwnerScope::class, PublishedScope::class])]
#[ObservedBy(PostObserver::class)]
class Post extends Model
{
    use SoftDeletes;
    protected $table = 'posts';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;

    protected $fillable = [
        'category_id',
        'title',
        'content',
        'excerpt',
        'cover_image',
        'status',
        'views',
    ];

    protected static function booted()
    {
    }

    public function scopePublished(Builder $builder)
    {
        return $builder->where('status', PostStatus::published)
            ->where(function ($query) {
                $query->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            });
    }

    public function scopeSlug(Builder $builder, string $slug)
    {
        return $builder->where('slug', $slug);
    }

    // Override the delete method to set the status to 'deleted' for easier filtering, while still executing the actual delete

    public function delete()
    {
        $this->status = PostStatus::deleted;
        $this->save();
        return parent::delete();
    }

    // Override the restore method to set the status back to 'published' when restoring a post, while still executing the actual restore
    public function restore()
    {
        $this->status = PostStatus::published;
        $this->save();
        return parent::restore();
    }

    protected function casts()
    {
        return [
            'published_at' => 'datetime',
            'meta' => 'json',
            'status' => PostStatus::class
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }

    public function content(): Attribute
    {
        return new Attribute(
            set: fn($value) => strip_tags($value, '<h2><p><a><br><strong><em><ul><ol><li>')
        );
    }

    public function excerpt(): Attribute
    {
        return new Attribute(
            get: fn($value) => $value ?: substr(strip_tags($this->content), 0, 150) . '...'
        );
    }

    public function title(): Attribute
    {
        return new Attribute(
            set: fn($value) => strip_tags($value),
            get: fn($value) => ucwords($value)
        );
    }

    public function thumbnailUrl(): Attribute
    {
        return new Attribute(
            get: fn() => $this->cover_image ? (str_starts_with($this->cover_image, 'http') ? $this->cover_image : Storage::disk('public')->url($this->cover_image)) : asset('images/default-thumbnail.svg')
        );
    }

    public function readTime(): Attribute
    {
        return (new Attribute(
            get: fn() => ceil(str_word_count(strip_tags($this->content)) / 200)
        ))->shouldCache();
    }

    public function publishTime(): Attribute
    {
        return new Attribute(
            get: fn() => $this->published_at ?? $this->created_at
        );
    }

    public function activeReaders(): Attribute
    {
        return new Attribute(
            get: fn() => random_int(0, 200)
        );
    }
}
