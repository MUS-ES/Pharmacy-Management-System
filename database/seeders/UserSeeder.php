<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Safe;
use App\Models\Chest;

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
        Safe::create(["user_id" => $user->id, "total" => "0"]);
        Chest::create(["user_id" => $user->id, "total" => "0"]);
        $user->createToken('dev_access');
    }
}
