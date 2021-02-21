<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomTypeRequest extends FormRequest
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
           'type'=>'required|string|max:191',
            'is_active'=>'required|in:0,1',
        ];
    }

    public function message(){
        return [
            'required'=>'this field is required',
            'type.string'=>'this field must be string',
            'type.max'=>'this field max is 191',
            'is_active.required'=>'this field is required',
            'is_active.required'=>'this field must be 0 | 1',
        ];
    }
}
