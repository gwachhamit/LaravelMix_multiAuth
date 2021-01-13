<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'super_admin','guard_name' => 'admin'],
            ['name' => 'admin','guard_name' => 'admin'],
            ['name' => 'user','guard_name' => 'admin'],
        ];

        Role::insert($roles);
    }
}
