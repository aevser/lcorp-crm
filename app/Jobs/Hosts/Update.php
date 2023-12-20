<?php

namespace App\Jobs\Hosts;

use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Host;

class Update 
{
    use Dispatchable;

    public function __construct(
        private $hostsId,
        private int $project_id,
        private string $url
    )

    {
        //
    }

    public function handle()
    {
        $hosts = Host::findOrFail($this->hostsId);

        $hosts->update([
            'project_id' => $this->project_id,
            'url' => $this->url,
        ]);

        return $hosts;
    }
}
