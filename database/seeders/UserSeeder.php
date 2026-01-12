<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // DB::table('users')->insert([
        //     [
        //         'name' => 'John Doe 1',
        //         'email' => 'john.doe@example.com',
        //         'password' => '123456',
        //         'created_at' => now(),
        //     ],
        //     [
        //         'name' => 'Jane Smith 1',
        //         'email' => 'jane.smith@example.com',
        //         'password' => '123456',
        //         'created_at' => now(),
        //     ],
        //     [
        //         'name' => 'Jane Smith 2',
        //         'email' => 'jane.smith2@example.com',
        //         'password' => '123456',
        //         'created_at' => now(),
        //     ]
        // ]);

        User::factory()->count(2)->create();
    }
}
