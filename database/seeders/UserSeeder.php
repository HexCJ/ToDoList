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
        $admin = User::updateOrCreate([
            'name'=>'Jonathan',
            'email'=>'jonathan@example.com',
            'password'=>bcrypt('1')
        ]);
        //buat role sesuai RolePermission
        $admin->assignRole('admin');
        $user = User::updateOrCreate([
            'name'=>'user',
            'email'=>'user@example.com',
            'password'=>bcrypt('2')
        ]);
        //buat role sesuai RolePermission
        $user->assignRole('user');
    }
}
