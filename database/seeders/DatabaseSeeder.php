<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\V1\Question;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\Customer::factory(10)->create();

//         \App\Models\Customer::factory(100)->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//         ]);
        Question::factory(5)->create([
            'question' =>
        ])
    }
}
