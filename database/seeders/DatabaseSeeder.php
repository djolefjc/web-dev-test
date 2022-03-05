<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(10),
        ]);

        User::factory(10)
            ->has(Post::factory()->count(10), 'posts')
            ->has(News::factory()->count(10), 'news')
            ->create();
    }
}
