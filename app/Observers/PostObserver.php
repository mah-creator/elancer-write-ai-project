<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Str;

class PostObserver
{
    public function creating(Post $post): void
    {
        $post->slug = Str::slug($post->title);
        $post->user_id = Auth::id();
    }

    public function forceDeleted(Post $post)
    {
        if ($post->cover_image) {
            Storage::disk('public')->delete($post->cover_image);
        }
    }
}
