<?php

namespace Database\Seeders;
use App\Models\Permission;

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['display_name' => 'View', 'name' => 'view_industry', 'type' => 'industry', 'guard_name' => 'admin'],
            ['display_name' => 'Create', 'name' => 'create_industry', 'type' => 'industry', 'guard_name' => 'admin'],
            ['display_name' => 'Edit', 'name' => 'edit_industry', 'type' => 'industry', 'guard_name' => 'admin'],
            ['display_name' => 'Delete', 'name' => 'delete_industry', 'type' => 'industry', 'guard_name' => 'admin'],

            ['display_name' => 'View', 'name' => 'view_notice_category', 'type' => 'notice_category', 'guard_name' => 'admin'],
            ['display_name' => 'Create', 'name' => 'create_notice_category', 'type' => 'notice_category', 'guard_name' => 'admin'],
            ['display_name' => 'Edit', 'name' => 'edit_notice_category', 'type' => 'notice_category', 'guard_name' => 'admin'],
            ['display_name' => 'Delete', 'name' => 'delete_notice_category', 'type' => 'notice_category', 'guard_name' => 'admin'],
        ];
        
        Permission::insert($permissions);
    }
}
