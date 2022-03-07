<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
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
        $users = [
            [
                'id' => 1,
                'name' => 'Rusaid MRD',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$yRfHIFyppaYVn10cTZ8GnOHdeY7AT.w7E5H6O4tY2xhLO8DDHII1e',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        User::insert($users);
    }
}
