<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ModelIdRule implements Rule
{
    private $model_class;

    public function __construct($model_class)
    {
        $this->model_class = new $model_class;
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
        return $this->model_class->find($value) !== null;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid Model Id';
    }
}
