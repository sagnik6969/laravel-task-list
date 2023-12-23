<?php
// seeders is the actual place where you load something into 
// the database
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
        \App\Models\User::factory(10)->create();
        // creates 10 fake records.
        // creates new data on the top of existing data
        \App\Models\User::factory(10)->unverified()->create();
        // to create unverified users.   


        \App\Models\Task::factory(40)->create();

        // php artisan db:seed => to store the fake records in the database. 
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
