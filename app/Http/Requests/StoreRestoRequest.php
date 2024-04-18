<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestoRequest extends FormRequest
{
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
     * @return array
     */
    public function rules()
    {
        return [
            'resto_name' => ['required', 'string','unique:restos,resto_name'],
            'resto_location' => ['required', 'string'],
            'resto_logo' => ['required', 'image','max:1024']
        ];
    }
}
