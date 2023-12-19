<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\CRM\Project\Project;

class CountLeadsListener
{

    public function __construct()
    {
        //
    }

    public function handle(LeadAdded $event)
    {
        $lead = $event->lead;

        $project = Project::find($lead->project_id);

        $leads_today = $project->leads()
            ->whereDate('created_at', today())
            ->count();

        $leads_total = $project->leads()->count();

        $project->update([
            'leads_today' => $leads_today,
            'lead_total' => $lead_total,
        ]);
    }
}
