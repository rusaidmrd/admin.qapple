<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Role::create([
            'slug' => 'admin',
            'name' => 'Admin'
        ]);

        Role::create([
            'slug' => 'manager',
            'name' => 'Manager'
        ]);

        Role::create([
            'slug' => 'staff',
            'name' => 'Staff'
        ]);
    }
}
