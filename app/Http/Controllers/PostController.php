<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $posts = [];

    public function __construct()
    {
        $this->posts = include resource_path('data/posts.php');
    }

    public function index()
    {
        return view('blog.index', [
            'posts' => $this->posts,
        ]);
    }

    public function show(string $slug)
    {
        $post = Post::
            withCount('comments as comment_count')
            ->slug($slug)
            ->firstOrFail();

        event('post.viewed', $post);
        return view('blog.single-post', ['post' => $post]);

    }

    public function create()
    {
        return view('blog.create');
    }
}
