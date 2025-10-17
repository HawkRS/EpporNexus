<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Don't forget to import your User model
use Illuminate\Support\Facades\Hash; // Don't forget to import Hash

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      User::create([
        'name' => 'Carlos',
        'last' => 'Gonzalez',
        'phone' => '3339689393',
        'type'  => 0,
        'email' => 'ing.carlosglezhdez@hotmail.com',
        'password' => Hash::make('*Vettel5'),
      ]);
      User::create([
        'name' => 'Carlos',
        'last' => 'Gonzalez',
        'phone' => '3339524545',
        'type'  => 0,
        'email' => 'eppor@hotmail.com',
        'password' => Hash::make('arles1963'),
      ]);

      User::create([
        'name' => 'Susana',
        'last' => 'Hernandez',
        'phone' => '3339689393',
        'type'  => 0,
        'email' => 'susana.hdez.65@gmail.com',
        'password' => Hash::make('chana6519'),
      ]);
      User::create([
        'name' => 'Diego',
        'last' => 'Gonzalez',
        'phone' => '3338332816',
        'type'  => 0,
        'email' => 'dagh0022@gmail.com',
        'password' => Hash::make('sleik98'),
      ]);
    }
}
