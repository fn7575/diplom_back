<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !is_null($this->user());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'game_id' => 'required|exists:games,id',
            'amount' => 'required|numeric|gt:0|lte:' . $this->user()->balance,
            'result' => 'required|digits_between:-1,1',
        ];
    }
}
