<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = [
            [
                'id' => 1,
                'name' => 'Rusaid MRD',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$4PDxIOLaBIn70UJi5WZpDuZ8oBg6LLCXGmNbHpUPr79HDrcWhd2t6',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        User::insert($adminUser);

        $adminUser = User::find(1);
        $adminRole = Role::where('name','Admin')->pluck('id');
        $adminUser->roles()->sync($adminRole);



        $developerUser = [
            [
                'id' => 2,
                'name' => 'Rusaid Ilyas',
                'email'          => 'rusaidmrd@gmail.com',
                'password'       => '$2y$10$4PDxIOLaBIn70UJi5WZpDuZ8oBg6LLCXGmNbHpUPr79HDrcWhd2t6',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        User::insert($developerUser);

        $developerUserDB = User::find(2);
        $developerRole = Role::where('name','Developer')->pluck('id');
        $developerUserDB->roles()->sync($developerRole);

    }
}
