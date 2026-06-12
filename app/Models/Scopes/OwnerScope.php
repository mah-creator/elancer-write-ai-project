<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Route;

class OwnerScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (auth()->check()) {
            $user = auth()->user();
            if ($user->is_admin) {
                return; // Admin can see all posts, so we don't apply any constraints
            }
            if (Route::is('dashboard.*')) {
                $builder->where('user_id', auth()->id());
            }
        }
    }
}
