<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BirdRequest extends FormRequest
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
            'species_id' => 'nullable|exists:App\Models\Species',
            'cage_id'    => 'nullable|exists:App\Models\Cage',
            'band'       => 'nullable|unique:App\Models\Bird',
            'identifier' => 'required',
            'father_id'  => 'nullable|exists:App\Models\Bird',
            'mother_id'  => 'nullable|exists:App\Models\Bird',
            'hatch_date' => 'nullable|date',
            'end_date'   => 'nullable|date',
        ];
    }
}
