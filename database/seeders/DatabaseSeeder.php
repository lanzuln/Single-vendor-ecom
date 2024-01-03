<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
       User::factory(5)->create();
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            TestimonialSeeder::class,
            ProductSeeder::class
        ]);

    }
}
