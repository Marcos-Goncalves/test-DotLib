<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StorePedidoRequest extends FormRequest
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
            'quantidade' => 'required|numeric',
            'status' => 'required|numeric|between:1,3',
            'cliente_id' => 'required|exists:clientes,id',
            'produto_id' => 'required|exists:produtos,id'
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
            'quantidade.required' => 'Quantidade obrigatório',
            'status.required' => 'Status obrigatório',
            'cliente_id.required' => 'Cliente válido necessário',
            'produto_id.required' => 'Produto válido necessário'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'data'      => $validator->errors()
        ],422));
    }
}
