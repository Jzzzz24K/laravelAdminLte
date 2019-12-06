<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserUpdateRequest extends AdminUserCreateRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'role' => 'required'
        ];
    }
}
