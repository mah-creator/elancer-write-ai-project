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

        $posts = Post::with('user');

        if ($slug) {
            $posts = $posts->whereHas('tags', fn($query) => $query->where('slug', '=', $slug));
        }

        if ($tab) {
            match ($tab) {
                'popular' => $posts = $posts->orderBy('views'),
                'recent' => $posts = $posts->latest()
            };
        }

        // Simple pagination is more suitable to implement "load more" pagination
        $posts = $posts->simplePaginate((3));

        // If AJAX request, return only the data partial view
        if ($request->wantsJson()) {
            return response()->json([
                'html' => view('posts.partials.list', compact('posts'))->render(),
                'hasMore' => $posts->hasMorePages(),
            ]);
        }

        return view('home', ['posts' => $posts, 'featuredPost' => Post::first()]);
    }
}
