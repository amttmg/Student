<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudent extends FormRequest
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
        $request_data = $this->request->all();

        return [
            'name'    => 'required',
            'address' => 'required',
            'phone'   => 'required|unique:students,phone,'.$request_data['id'],
            'email'   => 'required|unique:students,email,'.$request_data['id'],
            'course'  => 'required',
        ];
    }
}
