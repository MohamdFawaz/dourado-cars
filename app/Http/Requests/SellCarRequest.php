<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellCarRequest extends FormRequest
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
            'make' => 'required',
            'model' => 'required',
            'kilometers' => 'required',
            'year' => 'required',
            'price' => 'required',
            'warranty' => 'required',
            'color' => 'required',
            'number_of_doors' => 'required',
            'number_of_cylinders' => 'required',
            'horse_power' => 'required',
            'ownerInfo.*' => 'required',
        ];
    }
}
