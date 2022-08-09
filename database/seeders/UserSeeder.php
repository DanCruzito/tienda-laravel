<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Dan Mamani',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('administrador')
        ]);

        User::create([
            'name' => 'Carlos Alberto Mamani Rondo',
            'email' => 'carlmamani_98@gmail.com',
            'password' => bcrypt('carl78$$$')
        ]);
    }
}
