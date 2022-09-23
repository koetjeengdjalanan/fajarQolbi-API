<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Status;
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
            'name' => 'The Watcher',
            'status' => 1,
            'email' => 'super@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('testing123'), // password
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory(10)->create();
        \App\Models\BlogPost::factory(500)->create();

        Category::insert([
            [
                'name' => 'General',
                'slug' => 'general',
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit, repudiandae!',
                'created_at' => now()->subDays(mt_rand(0, 300)),
                'updated_at' => now()->subDays(mt_rand(0, 300)),
            ],
            [
                'name' => 'News',
                'slug' => 'news',
                'description' => 'Eos repellendus ut dolores neque perferendis ducimus suscipit similique mollitia!',
                'created_at' => now()->subDays(mt_rand(0, 300)),
                'updated_at' => now()->subDays(mt_rand(0, 300)),
            ],
            [
                'name' => 'Studential',
                'slug' => 'studential',
                'description' => 'Nihil animi commodi unde suscipit doloremque officia tenetur rerum inventore!',
                'created_at' => now()->subDays(mt_rand(0, 300)),
                'updated_at' => now()->subDays(mt_rand(0, 300)),
            ],
        ]);

        Status::insert([
            [
                'name' => 'SuperAdmin',
                'tier' => '0',
                'created_at' => now()->subDays(mt_rand(0, 300)),
                'updated_at' => now()->subDays(mt_rand(0, 300)),
            ],
            [
                'name' => 'Admin',
                'tier' => '123456',
                'created_at' => now()->subDays(mt_rand(0, 300)),
                'updated_at' => now()->subDays(mt_rand(0, 300)),
            ],
            [
                'name' => 'Teacher',
                'tier' => '1234',
                'created_at' => now()->subDays(mt_rand(0, 300)),
                'updated_at' => now()->subDays(mt_rand(0, 300)),
            ],
            [
                'name' => 'Student',
                'tier' => '1234',
                'created_at' => now()->subDays(mt_rand(0, 300)),
                'updated_at' => now()->subDays(mt_rand(0, 300)),
            ],
        ]);
    }
}
