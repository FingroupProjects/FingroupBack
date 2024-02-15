<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Employee;
use App\Models\Partner;
use App\Models\Position;
use Database\Factories\EmployeeFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory()->create([
             'name' => 'Admin',
             'login' => 'admin',
             'email' => 'admin@gmail.com',
             'password' => Hash::make('password')
         ]);

        Position::factory()->count(5)->create();
        Employee::factory()->count(50)->create();
        Partner::factory()->count(5)->create();
    }
}
