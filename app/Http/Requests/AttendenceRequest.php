<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AttendenceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */

    //
    public function rules(): array
    {
        return [
            'status' => 'required|integer',
            'employ_id' => 'required|integer|unique'
        ];
    }

    public function message()
    { // own validation message for each validation
        return [
            'status.required' => "Must be full name",
            'employ_id.required' => "Must be full name",
        ];
    }

    public function failedValidation(Validator $validator)
    { // to response validation errors message
        throw new HttpResponseException(response()->json([
            'error' => true,
            'message' => "Validations error",
            'data' => $validator->errors(),
        ]));
    }
}
