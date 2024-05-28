<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StudentRequest extends DefaultRequest
{
    
    public function rules(): array
    {
        $rules = [
            'name' => 'required | string |max:20|min:4',
            'age' => 'required | integer',
            'phoneNumber' => 'required | string| max:10 |min:9',
        ];
        return $rules;
    }
}
