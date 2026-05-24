<?php

namespace App\Http\Controllers;

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

    public function show(int $id, string $slug = '')
    {
        $post = collect($this->posts)->firstWhere('id', $id);

        if (!$post) {
            abort(404);
        }

        return view('blog.single-post', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('blog.create');
    }
}
