<?php

namespace App\Http\Requests\Election;

use Illuminate\Foundation\Http\FormRequest;

class VotesAndStatsSubmitRequest extends FormRequest
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
            'aspirant_votes' => 'required|array',
            'number_who_voted' => 'required|integer',
            'number_accredited' => 'required|integer',
            'number_of_males' => 'required|integer',
            'number_of_females' => 'required|integer'
        ];
    }
}
