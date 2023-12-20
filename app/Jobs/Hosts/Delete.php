<?php

namespace App\Jobs\Hosts;

use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Host;

class Delete 
{
    use Dispatchable;

    public function __construct(
        private $hostsId,
    )

    {
        //
    }

    public function handle()
    {
        $hosts = Host::destroy($this->hostsId);

        return $hosts;
    }
}
