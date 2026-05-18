<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => 'Technology',
            'slug' => 'technology',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $category = DB::table('categories')
            ->where('slug', 'technology')
            ->orderBy('id', 'desc')
            ->limit(1)
            ->first();

        DB::table('posts')->insert([
            [
                'user_id' => 1,
                'category_id' => $category->id,
                'title' => 'First Post',
                'content' => 'This is the content of the first post.',
                'slug' => 'first-post',
                'excerpt' => 'This is the excerpt of the first post.',
                'cover_image' => null,
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => null,
                'title' => 'Second Post',
                'content' => 'This is the content of the second post.',
                'slug' => 'second-post',
                'excerpt' => 'This is the excerpt of the second post.',
                'cover_image' => null,
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
