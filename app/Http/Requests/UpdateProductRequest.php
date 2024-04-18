<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'category_id' => ['required', 'string'],
            'prod_name' => ['required', 'string'],
            'prod_desc' => ['nullable', 'string'],
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
            'category_id.required' => 'le champ categorie est obligatoire',
            'prod_name.required' => 'le champ nom du produit est obligatoire',
            'prod_desc.required' => 'le champ description du produit est obligatoire',
        ];
    }
}
