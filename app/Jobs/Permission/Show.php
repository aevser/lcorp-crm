<?php

namespace App\Jobs\Permission;

use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Permission;


class Show 
{
    use Dispatchable;

    public function __construct(
        private int $permissionsId
    )

    {
        //
    }

    public function handle()
    {
        $permissions = Permission::find($this->permissionsId);

        return $permissions;
    }
}
