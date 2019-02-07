<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Exists;

class BillPayRequest extends FormRequest
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
            'name' => 'required|max:255',
            'date_due' => 'required|date',
            'value' => 'required|numeric',
            'category_id' => [
                'required',
                (new Exists('categories','id'))
                    ->where('user_id', \Tenant::getTenant()->id)
            ]
        ];
    }
    //category_id  ->>> outro usuário
}
