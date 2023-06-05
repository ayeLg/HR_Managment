<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|string",
            "email" => "required|string|email",
            "password" => "required|string|",
            "phone" => "required|string|",
            "photo" => "string",
            "postion" => "required|string|",
            "salary" => "required|integer|",
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => "need to fill fullname",
            'email.required' => "need to fill email",
            'password.required' => "need to fill password",
            'phone.required' => "need to fill phone",
            //  'photo.required' => "need to fill photo",
            'position.required' => "need to fill position",
            'salary.required' => "need to fill fullname",
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                "error" => true,
                "message" => "validation error",
                "data" => $validator->errors(),
            ])
        );
    }
}
