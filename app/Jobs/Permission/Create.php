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
        private ?int $fields,
        private ?int $manage_leads,
        private ?int $export_data,
        private ?int $manage_permissions,
        private ?int $manage_settings,
        private ?int $manage_project,

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

        return $permissions;
    }
}
