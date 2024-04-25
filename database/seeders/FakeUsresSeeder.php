<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\RoleController;

class FakeUsresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i < 20; $i++) {
            $user = User::create([
                'name' => 'hamza'.$i,
                'email' => 'hamza'.$i.'@gmail.com',
                'password' => Hash::make('hamza'.$i.'@gmail.com'),
                'image' => 'no image',
            ]);
            RoleController::giveRoleToUser_static($user->id, 'user');
        }
    }
}
