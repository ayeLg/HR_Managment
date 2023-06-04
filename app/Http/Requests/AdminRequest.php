<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class AdminRequest extends FormRequest
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
            'fullname' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string',
        ];
    }

    public function message() { // own validation message for each validation
        return [
            'fullname.required' => "Must be full name",
        ];
    }

    public function failedValidation(Validator $validator) { // to response validation errors message
        throw new HttpResponseException(response()->json([
                'error' => true,
                'message' => "Validations error",
                'data' => $validator->errors(),
        ]));
    }
}
