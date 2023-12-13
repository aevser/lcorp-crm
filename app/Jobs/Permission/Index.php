<?php

namespace App\Jobs\Permission;

use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Permission;

class Index 
{
    use Dispatchable;

    public function __construct()
    {
        //
    }

    public function handle()
    {
        $permissions = Permission::with(['user:id,name', 'project:id,name'])
            ->select(['id', 'project_id', 'user_id'])
            ->simplePaginate(20);

        return $permissions;
    }
}
