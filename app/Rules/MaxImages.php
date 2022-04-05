<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MaxImages implements Rule
{

    protected $product;
    protected $files;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($product,$files)
    {
        $this->product = $product;
        $this->files = $files;
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
        if($this->product->maximumImages() || ($this->product->imageCount() + count($this->files)) > 5 ) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Sorry, You cannot add more than 5 images - You have already saved '.$this->product->imageCount().' images.';
    }
}
