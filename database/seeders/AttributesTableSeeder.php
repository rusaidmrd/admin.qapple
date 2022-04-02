<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a size attribute
        Attribute::create([
            'id' => 1,
            'code'          =>  'size',
            'name'          =>  'Size',
            'frontend_type' =>  'radio',
            'is_filterable' =>  1,
            'is_required'   =>  1,
        ]);

        // Create a color attribute
        Attribute::create([
            'id' => 2,
            'code'          =>  'color',
            'name'          =>  'Color',
            'frontend_type' =>  'radio',
            'is_filterable' =>  1,
            'is_required'   =>  1,
        ]);
    }
}
