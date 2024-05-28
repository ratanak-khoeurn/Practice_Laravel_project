<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CategoryRequest extends DefaultRequest
{
    public function rules(): array
    {
        $rules = [
            'name' => 'required | string |max:20|min:4',
            'description' => 'required | string | max:255|min:10',
        ];
        return $rules;
    }
}
