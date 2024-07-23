<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\TodoList;
use App\Models\Task;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
		User::factory()->has(
			TodoList::factory(1)->has(
				Task::factory(10)
			)
		)->create([
			'name' => 'Farshad',
			'email' => 'farshad.hasanpour96@gmail.com',
			'email_verified_at' => now(),
			'password' => Hash::make('123456789'),
			'remember_token' => Str::random(10),
		]);

         User::factory(9)->has(
			 TodoList::factory(1)->has(
				 Task::factory(10)
			 )
		 )->create();
    }
}
