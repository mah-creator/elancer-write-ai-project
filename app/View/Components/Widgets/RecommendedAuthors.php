<?php

namespace App\View\Components\Widgets;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class RecommendedAuthors extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $users = User::
            where('id', '<>', Auth::id() ?? 0)
            ->withCount([
                'posts as total_views' => function ($query) {
                    $query->select(\DB::raw('sum(views)'));
                }
            ])
            ->orderBy('total_views')
            ->limit(2)
            ->get();
        return view('components.widgets.recommended-authors', compact('users'));
    }
}
