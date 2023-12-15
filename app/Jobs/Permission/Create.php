<?php

namespace App\Jobs\Permission;

use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Permission;

class Create 
{
    use Dispatchable;

    public function __construct(
        private int $project_id,
        private int $user_id,
        private ?array $fields,
        private ?bool $manage_leads,
        private ?bool $export_data,
        private ?bool $manage_permissions,
        private ?bool $manage_settings,
        private ?bool $manage_project,
    )

    {
       //
    }

    public function handle()
    {
        $permissions = Permission::create([
            'project_id' => $this->project_id,
            'user_id' => $this->user_id,
            'fields' => $this->fields,
            'manage_leads' => $this->manage_leads,
            'export_data' => $this->export_data,
            'manage_permissions' => $this->manage_permissions,
            'manage_settings' => $this->manage_settings,
            'manage_project' => $this->manage_project,
        ]);

        if(!$permissions){
            return response()->json(['error' => 'Ошибка в добавлении разрешения'], 401);
        }

        return $permissions;
    }
}
