<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuCreateRequest extends FormRequest
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
            'pid'=>'required',
            'name' => 'required',
            'role' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '菜单名称不能为空',
            'pid.required' => '请选择父级菜单',
            'role.required' => '请选择所属角色'
        ];
    }
}
