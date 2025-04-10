<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string' ,'min:2','max:60'],
            'email' => ['required', 'email', 'unique:users,email'],
            //'phone' => ['required', 'regex:/^\+380\d{9}$/'],
            'phone' => ['required', 'regex:/[0-9]*$/','min:2','max:20'],
            'position_id' => ['required', 'integer', 'exists:positions,id'],
            'photo' => ['required', 'image', 'mimes:jpeg', 'dimensions:min_width=70,min_height=70', 'max:5120'],
        ];
    }
}
