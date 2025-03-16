<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'username' => 'John Doe',
            'title' => 'My first post',
            'content' => 'This is my first post. I hope you like it.'
        ]);

        Post::create([
            'username' => 'Jane Doe',
            'title' => 'My second post',
            'content' => 'This is my second post. I hope you like it.'
        ]);

        Post::create([
            'username' => 'John Doe',
            'title' => 'My third post',
            'content' => 'This is my third post. I hope you like it.'
        ]);



    }
}
