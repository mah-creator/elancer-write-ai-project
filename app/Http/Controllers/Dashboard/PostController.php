<?php

namespace App\Http\Controllers\Dashboard;

use App\Actions\SyncPostTags;
use App\Services\FileUploadService;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Process\FakeProcessResult;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;
use App\Enums\PostStatus;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = $request->query('status', 'published');
        if ($status == 'deleted') {
            $posts = Post::onlyTrashed()
                ->with('category')
                ->withCount('comments as comments_count')
                ->latest();
        } else {
            $posts = Post::with('category')
                ->withCount('comments as comments_count')
                ->where('status', '=', $status)
                ->latest();
        }

        $status_options = array_map(
            function ($value) {
                return [
                    'name' => ucfirst($value),
                    'value' => $value,
                    'count' => $value == PostStatus::deleted->value ? Post::onlyTrashed()->count() : Post::where('status', $value)->count()
                ];
            },
            array_column(PostStatus::cases(), 'value')
        );

        $posts = $posts->paginate(4);

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
    public function store(PostRequest $request, FileUploadService $fileUpload, SyncPostTags $syncPostTags)
    {

        $clean = $request->validated();

        $cover_image_path = $fileUpload->upload(key: 'cover', path: 'covers', disk: 'public');

        $clean = array_merge($clean, [
            'status' => 'published',
            'excerpt' => fake()->sentence(4),
            'cover_image' => $cover_image_path
        ]);

        try {
            DB::transaction(function () use ($clean, $syncPostTags) {
                $post = Post::create($clean);
                $syncPostTags->handle($post, $clean['tags'] ?? '');
            });

        } catch (Throwable $e) {
            // delete the uploaded cover image if post creation failed
            if ($cover_image_path) {
                $fileUpload->delete($cover_image_path, 'public');
            }

            // DB::rollBack() is automatically called when an exception is thrown within the transaction closure, so we don't need to call it explicitly here.

            // Redirect back with error message and old input
            return back()
                ->withInput()
                ->withErrors(['error' => 'Failed to create post']);
        }

        return redirect()->route('dashboard.posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $post = Post::
            with('category')
            ->withCount('comments as comments_count')
            ->slug($slug)
            ->first();

        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::with('category')->findOrFail($id);
        return view('dashboard.posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, FileUploadService $fileUpload, SyncPostTags $syncPostTags, string $id)
    {
        $clean = $request->validated();
        $image_path = $fileUpload->upload('cover', 'covers', 'public');

        $clean = array_merge($clean, [
            'cover_image' => $image_path
        ]);

        try {

            $post = Post::findOrFail($id);

            DB::transaction(function () use ($post, $clean, $syncPostTags) {
                $post->update($clean);
                $syncPostTags->handle($post, $clean['tags'] ?? '');
            });

            // Delete old cover image if an old one exists and a new one was uploaded
            $prev_cover_image = $post->getPrevious()['cover_image'] ?? null;
            if ($prev_cover_image && ($prev_cover_image !== $post->cover_image)) {
                Storage::disk('public')->delete($prev_cover_image);
            }

        } catch (Throwable $e) {

            // delete the uploaded cover image if post update failed
            if ($image_path) {
                $fileUpload->delete($image_path, 'public');
            }

            // DB::rollBack() is automatically called when an exception is thrown within the transaction closure, so we don't need to call it explicitly here.

            // Redirect back with error message and old input
            return back()
                ->withInput()
                ->withErrors(['error' => 'Failed to update post']);
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

        return redirect()->route('dashboard.posts.index');
    }

    public function restore(string $id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->route('dashboard.posts.index');
    }

    public function archive(string $id)
    {
        $post = Post::findOrFail($id);
        $post->update(['status' => 'archived']);
        return redirect()->route('dashboard.posts.index');
    }
    public function unarchive(string $id)
    {
        $post = Post::findOrFail($id);
        $post->update(['status' => 'published']);
        return redirect()->route('dashboard.posts.index');
    }
    public function publish(string $id)
    {
        $post = Post::findOrFail($id);
        $post->update(['status' => 'published']);
        return redirect()->route('dashboard.posts.index');
    }

    public function forceDelete(string $id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->forceDelete();

        return redirect()->route('dashboard.posts.index');
    }
}
