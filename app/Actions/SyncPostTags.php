<?php

namespace App\Actions;

use App\Models\Post;
use App\Models\Tag;
use Str;

class SyncPostTags
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function handle(Post $post, string|array $tags)
    {
        $tags = is_string($tags) ? explode(',', $tags) : $tags;
        $tag_ids = [];
        foreach ($tags as $tag_name) {
            $tag_name = trim($tag_name);
            if (empty($tag_name)) {
                continue;
            }

            if ($tag_name) {
                $tag_ids[] = Tag::firstOrCreate([
                    'name' => $tag_name,
                    'slug' => Str::slug($tag_name)
                ])->id;
            }
        }
        $post->tags()->sync($tag_ids);
    }
}
