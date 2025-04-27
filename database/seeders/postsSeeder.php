<?php

namespace Database\Seeders;

use App\Models\posts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class postsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Generate 50 random posts
        posts::factory()->count(50)->create();
    }
}
