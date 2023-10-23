<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResgisterRequest extends FormRequest
{
    // php artisan make:request StoreRegisterRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name"=> ["required", "string", "max:255"],
            "email"=> ["required", "string", "email", "unique:users"],
            "password"=> ["required", "string","min:4", "confirmed"],
        ];
    }
}
