<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateImbalances extends FormRequest
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
            'bug_name'=>'string',
            'Bug_tool'=>'string',
            'causes_name'=>'string',
            'bug_desc'=>'string',
            'user_id'=>'string',
            'city_id'=>'string',
            'fault_side_id'=>'string',
            'causes_glitch_id'=>'string',
            'file' =>  'required',
            'file.*' => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip'
        ];
    }
}
