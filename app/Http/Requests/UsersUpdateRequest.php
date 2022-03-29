<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersUpdateRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required',
//            'password' => 'min:5',     ////PASWORD NE MORA BITI REQUIRED JER GA VEC IMA U DB,
                                        // ALI ako se menje PSW potrebna je OSTALA VALIDACIJA(duzina psw isl)
            'role_id'=>'required',
            'is_active'=>'required'
        ];
    }
}
