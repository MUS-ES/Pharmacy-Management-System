<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email' => "m@m",
            'password' => bcrypt("mmmmmmmm"),
            'fullname' => "majd soubh",
            'ph_name' => "health",
            'licence' => "123455",
            'active' => "1",

        ]);
        $user->createToken('dev_access');
    }
}
