<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class AwardRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function rules()
    {
        return [
            'content'=>'required',
            'priod_id'=>'required|integer',
            'student_id'=>'required|integer'
        ];
    }
}
