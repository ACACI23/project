<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(BarangSeeder::class);
        $this->call(SupplierSeeder::class);
        // Create a user
        User::factory(3)->create();

        User::create([
            'name' => 'Aurelia Christy',
            'username' => 'acaci',
            'email' => 'christyaurelia9@gmail.com',
            'password' => bcrypt('12345')
        ]);

        // Create categories
        Category::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);

        Category::create([
            'name' => 'Design',
            'slug' => 'design'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        // Create posts
        Post::factory(20)->create();
        Post::create([
            'title' => 'Judul Pertama',
            'category_id' => 1,
            'user_id' => 4,
            'slug' => 'judul-pertama',
            'excerpt' => 'Lorem ipsum pertama',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>',
        ]);

        Post::create([
            'title' => 'Judul Kedua',
            'category_id' => 2,
            'user_id' => 4, // Assuming this post belongs to the user created above
            'slug' => 'judul-kedua',
            'excerpt' => 'Lorem ipsum kedua',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>',
        ]);

        Post::create([
            'title' => 'Judul Ketiga',
            'category_id' => 1,
            'user_id' => 4, // Assuming this post belongs to the user created above
            'slug' => 'judul-ketiga',
            'excerpt' => 'Lorem ipsum ketiga',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>',
        ]);

        // Post::create([
        //     'title' => 'Judul Keempat',
        //     'category_id' => 3,
        //     'user_id' => 2, // Assuming this post belongs to the user created above
        //     'slug' => 'judul-keempat',
        //     'excerpt' => 'Lorem ipsum ketiga',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>',
        // ]);
    }
}
