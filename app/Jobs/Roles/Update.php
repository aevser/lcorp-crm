<?php

namespace App\Jobs\Roles;

use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\CRM\Role;

class Update 
{
    use Dispatchable;

    public function __construct(
        private int $rolesId,
        private int $user_id,
        private ?bool $create_projects,
        private ?bool $manage_users,
        private ?bool $manage_permissions,
        private ?bool $edit_projects,
        private ?bool $global_settings,
    )

    {
        //
    }

    public function handle()
    {
        $roles = Role::findOrFail($this->rolesId);

        $roles->update([
            'user_id' => $this->user_id,
            'create_projects' => $this->create_projects,
            'manage_users' => $this->manage_users,
            'manage_permissions' => $this->manage_permissions,
            'edit_projects' => $this->edit_projects,
            'global_settings' => $this->global_settings,
        ]);

        return $roles;
    }
}
