<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
            'name' => 'Dayana Chavez',
            'email' => 'dayana14@gmail.com',
            'password' => Hash::make('12345678'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $user=User::create([
            'name' => 'Viviana Flores',
            'email' => 'vflores@gmail.com',
            'password' => Hash::make('12345678'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
