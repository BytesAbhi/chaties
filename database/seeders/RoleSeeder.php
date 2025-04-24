<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $role = Role::firstOrCreate(['name' => 'super_admin']);

        $user = User::where('email', 'admin@chaties.in')->first();
        if ($user) {
            $user->assignRole($role);
        }
    }
}
