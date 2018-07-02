<?php

namespace App\Http\Requests\Election;

use Illuminate\Foundation\Http\FormRequest;

class AddAspirantRequest extends FormRequest
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
            'firstname' => 'required|string',
            'middlename' => 'required|string',
            'surname' => 'required|string',
            'election_id' => 'required|integer',
            'party' => 'required|string'
        ];
    }
}
