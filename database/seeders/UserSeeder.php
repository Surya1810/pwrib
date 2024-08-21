<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Surya Dinarta Halim',
            'email' => 'surya@partnership.co.id',
            'password' => bcrypt('123'),
        ]);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'sekretariat@pwrib.org.id',
            'password' => bcrypt('123'),
        ]);
    }
}
