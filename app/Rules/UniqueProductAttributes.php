<?php

namespace App\Rules;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\Rule;

class UniqueProductAttributes implements Rule
{

    protected $product;
    protected $productAttribute;
    protected $attribute_id;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($product,$productAttribute,$attribute_id)
    {
        $this->product = $product;
        $this->productAttribute = $productAttribute;
        $this->attribute_id = $attribute_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $data = DB::table('product_attributes')
                ->where([
                    ['product_id', '=', $this->product->id],
                    ['attribute_id', '=', $this->attribute_id],
                    ['value', '=', $this->productAttribute->value],
                ])->get();

        return $data->isEmpty() ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The value has already been taken.';
    }
}
