<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'role' => 'super_admin',
                'name' => 'SuperAdmin',
                'email' => 'super@admin.com',
                'password' => 'super12345',
            ],
            [
                'role' => 'admin',
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => 'admin12345',
            ],
        ];

        foreach ($admins as $admin) {
            $exist = Admin::where('email', $admin['email'])->first();
            if(empty($exist)){
                $super_admin = Admin::firstOrCreate([
                    'name' => $admin['name'],
                    'email' => $admin['email'],
                    'password' => bcrypt($admin['password']),
                ]);
                $super_admin->assignRole($admin['role']);
            }
        }
    }
}
