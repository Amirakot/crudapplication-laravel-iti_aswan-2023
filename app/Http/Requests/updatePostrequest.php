<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updatePostrequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
         return [
            'title' => ['required','min:3'],
            'description' => ['required','min:5'],
        ];
    }
    public function mess(){
        return [
             'title.required'=>'must be required ',
           'title.min'=>'must be 3 character '
        ];
    }
}
