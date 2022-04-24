<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OneToOneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 10; $i++) {
            $post =    Post::create([
                'title' => 'First Post - ' . $i,
            ]);

            Comment::create([
                'body' => 'This is the Post comment -  ' . $i,
                'commentable_id' => $post->id,
                'commentable_type' => 'App\Models\Post',
            ]);

            $staff = Staff::create([
                'name' => 'name' . $i,
            ]);

            Comment::create([
                'body' => 'This is the Staff comment - ' . $i,
                'commentable_id' => $staff->id,
                'commentable_type' => 'App\Models\Staff',
            ]);
        }
    }
}
