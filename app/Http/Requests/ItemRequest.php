<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
    'goods' => 'required|string|max:191',
    'detail' => 'required|string|max:191',
    'price' => 'required|integer|min:0|max:2147483647',
    'stock' => 'required|integer|min:0|max:2147483647'        
];
    }
public function messages() {
return [
 'goods.required' => 'please product!!!',
 'price.required' => 'please price!!!'
   ];
 }
}
