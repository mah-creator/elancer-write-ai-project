<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $slug = null)
    {
        $tab = $request->query('tab', null);

        $posts = Post::with('user')->published();

        if ($slug) {
            $posts = $posts->whereHas('tags', fn($query) => $query->where('slug', '=', $slug));
        }

        if ($tab) {
            match ($tab) {
                'popular' => $posts = $posts->orderBy('views'),
                'recent' => $posts = $posts->latest()
            };
        }
        return view('home', ['posts' => $posts->get(), 'featuredPost' => Post::first()]);
    }
}
