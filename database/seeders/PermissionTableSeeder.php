<?php

namespace Database\Seeders;

use App\Models\Permission;
use Carbon\Carbon;
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
            [
                'id'    => '1',
                'name' => 'permission_create',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id'    => '2',
                'name' => 'permission_edit',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id'    => '3',
                'name' => 'permission_show',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id'    => '4',
                'name' => 'permission_delete',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id'    => '5',
                'name' => 'role_create',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id'    => '6',
                'name' => 'role_edit',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id'    => '7',
                'name' => 'role_show',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id'    => '8',
                'name' => 'role_delete',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id'    => '9',
                'name' => 'user_create',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id'    => '10',
                'name' => 'user_edit',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id'    => '11',
                'name' => 'user_show',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id'    => '12',
                'name' => 'user_delete',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id'    => '13',
                'name' => 'product_category_create',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id'    => '14',
                'name' => 'product_category_edit',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id'    => '15',
                'name' => 'product_category_show',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id'    => '16',
                'name' => 'product_category_delete',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id'    => '17',
                'name' => 'product_attribute_create',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id'    => '18',
                'name' => 'product_attribute_edit',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id'    => '19',
                'name' => 'product_attribute_show',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id'    => '20',
                'name' => 'product_attribute_delete',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id'    => '21',
                'name' => 'product_create',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id'    => '22',
                'name' => 'product_edit',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id'    => '23',
                'name' => 'product_show',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id'    => '24',
                'name' => 'product_delete',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        Permission::insert($permissions);
    }
}
