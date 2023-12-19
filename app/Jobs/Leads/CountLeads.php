<?php

namespace App\Jobs\Leads;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\CRM\Project\Project;

class CountLeads implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function handle()
    {
        $projects = Project::with(['user:id,name'])
            ->select(['id', 'name', 'user_id'])
            ->simplePaginate(20);

        foreach($projects as $project){
            $leads_today = $project->leads()
                ->whereDate('created_at', today())
                ->count();

            $leads_total = $project->leads()->count();

            $project->update([
                'leads_today' => $leads_today,
                'leads_total' => $leads_total,
            ]);
        }
    }
}
