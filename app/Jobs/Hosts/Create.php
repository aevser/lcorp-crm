<?php

namespace App\Jobs\Hosts;

use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Host;

class Create 
{
    use Dispatchable;

    public function __construct(
        private int $project_id,
        private string $url
    )
    
    {
        //
    }

    public function handle()
    {
        $hosts = Host::create([
            'project_id' => $this->project_id,
            'url' => $this->url,
        ]);

        if($hosts){
            return response()->json(['error' => 'Ошибка в добавление хоста'], 401);
        }

        return $hosts;
    }
}
