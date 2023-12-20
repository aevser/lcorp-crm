<?php

namespace App\Http\Requests\Roles;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'create_projects' => 'boolean',
            'manage_users' => 'boolean',
            'manage_permissions' => 'boolean',
            'edit_projects' => 'boolean',
            'global_settings' => 'boolean',
        ];
    }
}
