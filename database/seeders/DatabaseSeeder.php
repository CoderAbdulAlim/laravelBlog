<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Abdul Alim',
            'email' => 'abdulalimpvt@gmail.com',
        ]);
        
        User::factory()->create([
            'name' => 'Al Razi',
            'email' => 'alrazipvt@gmail.com',
        ]);

        User::factory()->create([
            'name' => 'Miya Munshi',
            'email' => 'miyamunshi@gmail.com',
        ]);
        
        User::factory()->create([
            'name' => 'Juwel Munshi',
            'email' => 'juwelmunshi@gmail.com',
        ]);
        
        User::factory()->create([
            'name' => 'Sardar Al Razi',
            'email' => 'sardar@gmail.com',
        ]);

        Post::factory()->count(30)->create();
        Category::factory()->count(5)->create();
        Tag::factory()->count(100)->create();
        Comment::factory()->count(90)->create();
    }
}
