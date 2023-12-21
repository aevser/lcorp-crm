<?php

namespace App\Jobs\Leads;

use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\CRM\Lead;

class Index 
{
    use Dispatchable;

    public function __construct()
    {
        //
    }

    public function handle()
    {
        $leads = Lead::all();

        return $leads;
    }
}
