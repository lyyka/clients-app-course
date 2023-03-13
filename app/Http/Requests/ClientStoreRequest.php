<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Date format koji se koristi u mysql-u:
        // GODINA-MESEC-DAN
        // OK - 2023-03-10
        // X 2023/03/10
        // X 2023.03.10
        // X 2023 03 10
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:clients,email'],
            'phone_number' => ['nullable', 'string', 'max:255'],
            'date_of_birth' => ['nullable', 'date', 'before:today'],

            // product_ids = null - prazan niz
            'product_ids' => ['nullable', 'array'],

            // [3, 2, 1] - jeste validan
            'product_ids.*' => ['required', 'integer',
                Rule::exists('products', 'id')],
            // za svaki element niza
        ];
    }
}
