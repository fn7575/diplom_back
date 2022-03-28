<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tournament_id' => 'required|numeric|gt:0',
            'left_team_id' => 'required|numeric|gt:0',
            'right_team_id' => 'required|numeric|gt:0|different:left_team_id',
            'margin' => 'required|numeric|gt:0',
            'left_coefficient' => 'required|numeric|gt:0',
            'right_coefficient' => 'required|numeric|gt:0',
            'is_draw_possible' => 'required|boolean',
            'draw_coefficient' => 'required_if:is_draw_possible,true',
            'starts_at' => 'required|date',
        ];
    }
}
