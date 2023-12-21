<?php

namespace App\Jobs\Leads;

use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\CRM\Lead;

class Destroy 
{
    use Dispatchable;

    public function __construct(
        private $leadsId,
    )

    {
        //
    }

    public function handle()
    {
        $leads = Lead::destroy($this->leadsId);

        return $leads;
    }
}
