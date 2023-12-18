<?php

namespace App\Jobs\Permission;

use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Permission;

class Delete 
{
    use Dispatchable;

    public function __construct(
        private $permissionsId,
    )

    {
        //
    }

    public function handle()
    {
        $permission = Permission::destroy($this->permissionsId);

        return $permission;
    }
}
