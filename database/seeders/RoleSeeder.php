<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            //role admin
            ['role_name' => 'admin'], //role id: 1

            //anggota komunitas
            ['role_name' => 'jagawana'], //role id: 2

            //dafault role user
            ['role_name' => 'warga'], //role id: 3
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate($role);
        }
    }
}
