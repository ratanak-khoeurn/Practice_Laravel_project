<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductRequest extends DefaultRequest
{
    
    public function rules(): array
    {
        $rules = [
            'name' => 'required |string |min:4|max:20',
            'category_id' => 'required |integer|exists:categories,id',
            'description' => 'required |string|min:10|max:255',
        ];
        return $rules;
    }
}
