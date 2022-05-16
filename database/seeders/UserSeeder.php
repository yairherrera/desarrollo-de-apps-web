<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 50; $i++){
            User::create(
                [
                    'nombre' => "usuario$1",
                    'email' => "email$i@test.com",
                    'password' => bcrypt("pass$i"),

                ]
            );
        }
    }
}
