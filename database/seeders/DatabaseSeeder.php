<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Idea;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        User::factory(7)->create();
        Category::factory(4)->create();

        Category::factory()->create(['name' => 'Category 2']);
        Category::factory()->create(['name' => 'Category 3']);
        Category::factory()->create(['name' => 'Category 4']);

        for ($i = 0; $i < 30; $i++) {
            Idea::factory(30)->create([
                'user_id' => User::all()->random(),
                'category_id' => Category::all()->random(),
            ]);
        }
    }
}
