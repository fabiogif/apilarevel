<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest as BaseRequest;

class StoreProductRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'flag' => 'required',
            'category_id' => 'required',
            'tenant_id' => 'required',
        ];
    }


}
