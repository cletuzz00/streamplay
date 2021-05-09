<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [
            ['name' => 'super', 'email' => 'super@admin.com', 'password' => Hash::make('super123'), 'role_id' => 1, 'status'=>'active'],
            ['name' => 'admin', 'email' => 'admin@admin.com', 'password' => Hash::make('admin123'), 'role_id' => 1, 'status'=>'active'],
        ];
        foreach ($users as $user) {
            User::query()->create($user);
        }
        $roles = [
            ['name' => 'admin'],
            ['name' => 'user'],
        ];
        foreach ($roles as $role) {
            Role::query()->create($role);
        }
    }
}
