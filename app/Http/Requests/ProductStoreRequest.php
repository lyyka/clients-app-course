<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // Checkbox se ne submittuje kada nije cekiran
            // enabled = null
            // enabled = vrednost checkboxa

            // Dropdown koji ima 2 opcije: yes i no
            // enabled = 1 / 0

            'enabled' => ['required', 'boolean'],
            'name' => ['required', 'string', 'max:255'],

            // Dropdown za kategorija:
            // kat1
            // kat2
            // kat3
            // ...

//            'category' => ['required',
//                'string', 'max:255',
//                Rule::in(['kat1', 'kat2', 'kat3', '...'])],

//            'category_id' => [
//                'required',
//                'integer',
//                Rule::exists('categories', 'id')
//            ],
        ];
    }
}
