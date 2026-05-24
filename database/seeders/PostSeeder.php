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
                'cover_image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
                'views' => 150,
            ],
            [
                'user_id' => 1,
                'category_id' => null,
                'title' => 'Second Post',
                'content' => 'This is the content of the second post.',
                'slug' => 'second-post',
                'excerpt' => 'This is the excerpt of the second post.',
                'cover_image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
                'views' => 100,
            ],
        ]);
    }
}
