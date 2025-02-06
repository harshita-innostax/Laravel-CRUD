<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\user;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        user::create([
            "name" => "Harshita",
            "email" => "harshitagupta12@gmail.com",
            "password" => "12345"
        ]);
    }
}
