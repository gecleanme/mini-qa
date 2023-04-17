<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         $test_user = \App\Models\User::factory()->create([
             'name' => 'QA Test User',
             'email' => 'test@example.com',
             'role' => 'QA'
         ]);

        $test_user2 = \App\Models\User::factory()->create([
            'name' => 'Android Dev Test User',
            'email' => 'testdev@example.com',
            'department' => 'Android',
            'role' => 'dev'
        ]);


 //       \App\Models\Issue::factory(5)->create();
        \App\Models\Issue::factory(15)->create([
            'reporter_id' => $test_user->id
        ]);

        \App\Models\Issue::factory(15)->create([
            'department' => $test_user2->department
        ]);


    }
}
