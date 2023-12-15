<?php

namespace App\Jobs\Roles;

use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\CRM\Role;

class Show 
{
    use Dispatchable;

    public function __construct(
        private int $rolesId
    )
    
    {
        //
    }

    public function handle()
    {
        $roles = Role::find($this->rolesId);

        return $roles;
    }
}
