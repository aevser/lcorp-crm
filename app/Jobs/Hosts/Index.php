<?php

namespace App\Jobs\Hosts;

use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Host;

class Index 
{
    use Dispatchable;

    public function __construct()
    {
        //
    }

    public function handle()
    {
        $hosts = Host::with('project:id,name')
            ->select(['id', 'url', 'project_id'])
            ->simplePaginate(20);

        return $hosts;
    }
}
