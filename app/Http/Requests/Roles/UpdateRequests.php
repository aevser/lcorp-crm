<?php

namespace App\Http\Requests\Roles;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequests extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
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
