<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use App\Enums\PostStatus;
use Illuminate\Support\Facades\Route;

class PublishedScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (!Route::is('dashboard.*'))
            $builder
                ->where('status', PostStatus::published)
                ->where(function ($query) {
                    $query
                        ->whereNull('published_at')
                        ->orWhere('published_at', '<=', now());
                });
    }
}
