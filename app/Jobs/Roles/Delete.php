<?php

namespace App\Jobs\Roles;

use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\CRM\Role;


class Delete
{
    use Dispatchable;

    public function __construct(
        private $rolesId
    )
    
    {
        //
    }

    public function handle()
    {
        $roles = Role::findOrFail($this->rolesId)->delete();

        return $roles;
    }
}
