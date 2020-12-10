<?php

namespace App\Http\Requests\Employees;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required | unique:employees',
            'phone' => 'required | unique:employees',
            'address' => 'required',
            'designation_id' => 'required',
            'department_id' => 'required',
            'academic_qualification' => 'nullable',
            'bio' => 'nullable',
            'salary_type' => 'required',
            'salary' => 'required | numeric',
            'started_from' => 'required | before:today',
        ];
    }
}
