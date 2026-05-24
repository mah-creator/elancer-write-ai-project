<?php

namespace App\Http\Controllers\Dashboard;

use App\Actions\FileUpload;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Process\FakeProcessResult;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\String\Slugger\SluggerInterface;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = $request->query('status', 'published');
        $posts = Post::where('status', '=', $status)
            ->where('user_id', '=', 1)
            ->latest()
            ->get();

        $status_options = array_map(function ($value) {
            return [
                'name' => ucfirst($value),
                'value' => $value,
                'count' => Post::where('status', $value)->count()
            ];
        }, [    //TODO: move this to a config file or a database table
            'published',
            'draft',
            'archived'
        ]);

        return view('dashboard.posts.index', [
            'posts' => $posts,
            'status_options' => $status_options,
            'current_status' => $status
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'post' => new Post()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request, FileUpload $fileUpload)
    {

        $clean =  $request->validated();

        $cover_image_path = $fileUpload->handle(key: 'cover', path: 'covers', disk: 'public');

        $request->merge([
            'user_id' => 1,
            'status' => 'published',
            'excerpt' => fake()->sentence(4),
            'slug' => fake()->slug(),
            'category_id' => 1,
            'cover_image' => $cover_image_path
        ]);

        $post = Post::create($request->all());
        return redirect()->route('dashboard.posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('dashboard.posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FileUpload $fileUpload, string $id)
    {
        $post = Post::findOrFail($id);

        if ($request->hasFile('cover')) {
            $request->merge([
                'cover_image' => $fileUpload->handle('cover', 'covers', 'public')

            ]);
        }

        $data = $request->all();

        $post->update($data);

        // Delete old cover image if an old one exists and a new one was uploaded
        $prev_cover_image = $post->getPrevious()['cover_image'] ?? null;
        if ($prev_cover_image && ($prev_cover_image !== $post->cover_image)) {
            Storage::disk('public')->delete($prev_cover_image);
        }

        return redirect()->route('dashboard.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        if ($post->cover_image) {
            Storage::disk('public')->delete($post->cover_image);
        }
        return redirect()->route('dashboard.posts.index');
    }
}
