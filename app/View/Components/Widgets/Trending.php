<?php

namespace App\View\Components\Widgets;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Trending extends Component
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
        $posts = Post::with('category')->orderBy('views', 'desc')->limit(3)->get();
        return view('components.widgets.trending', ['posts' => $posts]);
    }
}
