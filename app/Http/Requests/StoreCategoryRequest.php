<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'cat_name' => ['required', 'string', 'unique:categories,cat_name'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'cat_name.required' => 'Le nom de la catégorie est obligatoire',
            'cat_name.string' => 'Le nom de la catégorie ne doit contenir que du texte',
            'cat_name.unique' => 'Le nom de cette catégorie existe deja',
        ];
    }
}
