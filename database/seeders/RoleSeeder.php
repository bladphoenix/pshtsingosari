<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Super Admin',
            'guard_name' => 'admin',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('roles')->insert([
            'name' => 'Ranting',
            'guard_name' => 'admin',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('roles')->insert([
            'name' => 'Rayon',
            'guard_name' => 'user',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('roles')->insert([
            'name' => 'Pelatih',
            'guard_name' => 'user',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('roles')->insert([
            'name' => 'User',
            'guard_name' => 'user',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        $admin = Admin::first();
        // $admin_last = Admin::latest()->first();
        $user = User::first();

        $admin->assignRole('Super Admin');
        // $admin_last->assignRole('Ranting');
        // $user->assignRole('User');
    }
}
