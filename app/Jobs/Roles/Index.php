<?php

namespace App\Jobs\Roles;

use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\CRM\Role;

class Index 
{
    use Dispatchable; 

    public function __construct()
    {
        //
    }

    public function handle()
    {
        $roles = Role::with(['user:id,name'])
            ->select(['id', 'user_id'])
            ->simplePaginate(20);

        return $roles;
    }
}
