<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::create([
            'id'    => '1',
            'name' => 'Root',
            'slug' => 'root',
            'parent_id'     =>  null,
            'menu'          =>  0,
        ]);

        $categories = [
            [
                'id'    => '2',
                'name' => 'Mac',
                'slug' => 'mac',
                'parent_id'     =>  1,
                'created_at' => Carbon::now(),
            ],
            [
                'id'    => '3',
                'name' => 'Iphone',
                'slug' => 'iphone',
                'parent_id'     =>  1,
                'created_at' => Carbon::now(),
            ],
            [
                'id'    => '4',
                'name' => 'Ipad',
                'slug' => 'ipad',
                'parent_id'     =>  1,
                'created_at' => Carbon::now(),
            ],
            [
                'id'    => '5',
                'name' => 'Airpods',
                'slug' => 'airpods',
                'parent_id'     =>  1,
                'created_at' => Carbon::now(),
            ],
            [
                'id'    => '6',
                'name' => 'Watch',
                'slug' => 'watch',
                'parent_id'     =>  1,
                'created_at' => Carbon::now(),
            ],
            [
                'id'    => '7',
                'name' => 'Accessories',
                'slug' => 'accessories',
                'parent_id'     =>  1,
                'created_at' => Carbon::now(),
            ],
        ];

        Category::insert($categories);
    }
}
