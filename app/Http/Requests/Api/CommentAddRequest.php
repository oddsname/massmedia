<?php

namespace App\Http\Requests\Api;

use App\Rules\ModelIdRule;
use App\Rules\ModelType;
use App\Rules\ModelTypeRule;
use Illuminate\Foundation\Http\FormRequest;

class CommentAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'author' => ['required', 'max:200', 'regex:/([A-Z]|[А-Я])[a-zа-я]+\s([A-Z]|[А-Я])[a-zа-я]+/'],
            'model_type' => ['required', new ModelTypeRule($this->get('model_id'))],
            'parent' => ['required', 'integer'],
            'content' => ['required', 'max:512'],
        ];
    }
}
