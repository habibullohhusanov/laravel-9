<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePhotoRequest extends FormRequest
{
    // php artisan make:request StorePhotoRequest
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    public function messages()
    {
        return [
            'photo' => 'Rasm yo\'q',
        ];
    }

    public function rules()
    {
        return [
            'photo' => ['image', 'max:5120'],
        ];
    }
}
