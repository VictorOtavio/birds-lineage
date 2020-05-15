<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PairRequest extends FormRequest
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
            'male'   => 'required|integer|unique:App\Models\Bird',
            'female' => 'required|integer|unique:App\Models\Bird',
            'cage'   => 'required|integer|unique:App\Models\Cage',
        ];
    }
}
