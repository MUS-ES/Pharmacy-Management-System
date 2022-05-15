<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'email' => "admin@admin",
            'name' => 'admin',
            'password' => bcrypt("adminadmin"),
        ]);
    }
}
