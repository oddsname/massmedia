<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ModelTypeRule implements Rule
{
    private $model_id = 0;

    public function __construct($model_id)
    {
        $this->model_id = $model_id;
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
         if(class_exists($value) && method_exists(new $value, 'comments')){
             return (new $value)->find($this->model_id) !== null;
         }

         return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid Model Type';
    }
}
