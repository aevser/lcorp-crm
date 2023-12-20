<?php

namespace App\Http\Requests\Permissions;

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
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
            'fields' => 'array',
            [
                'surname' => 'nullable|string',
                'patronymic' => 'nullable|string',
                'full_name' => 'nullable|string',
                'phone' => 'nullable|string',
                'entries' => 'nullable|string',
                'email' => 'nullable|email',
                'cost' => 'nullable|string',
                'comment' => 'nullable|string',
                'city' => 'nullable|string',
                'region' => 'nullable|string',
                'manual_region' => 'nullable|string',
                'manual_city' => 'nullable|string',
                'ip' => 'nullable|ip',
                'referrer' => 'nullable|string',
                'source' => 'nullable|string',
                'utm' => 'nullable|string',
                'utm_medium' => 'nullable|string',
                'utm_source' => 'nullable|string',
                'utm_campaign' => 'nullable|string',
                'utm_content' => 'nullable|string',
                'utm_term' => 'nullable|string',
                'host' => 'nullable|string',
            ],
            'manage_leads' => 'boolean',
            'export_data' => 'boolean',
            'manage_permissions' => 'boolean',
            'manage_settings' => 'boolean',
            'manage_project' => 'boolean'
        ];
    }
}
