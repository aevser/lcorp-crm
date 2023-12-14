<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\CRM\Project\Project;
use App\Models\User;

class ProjectController extends Controller
{
    public function index(){

        $projects = Project::with(['user:id,name'])
            ->select(['id', 'name'])
            ->simplePaginate(20);

        return response()->json(['projects' => $projects], 200);
    }

    public function store(Request $request){
        
        $user = auth()->user();

        if($user->can('create', Project::class)){
            $projects = Project::create([
                'user_id'=> $request->user_id,
                'name'=> $request->name,
                'settings'=> $request->settings,
                'api_token'=> $request->api_token,
                'timezone'=> $request->timezone,
                'color'=> $request->color,
                'enabled'=> $request->enabled,
                'lead_validation_days'=> $request->lead_validation_days,
                'detect_region'=> $request->detect_region,
                'calltracking'=> $request->calltracking,
            ]);
        }

        return response()->json(['success' => 'Проект успешно добавлен'], 200);
    }

    public function update(Request $request, Project $project){

    $this->authorize('update', $project);

    $user = auth()->user();

    if ($user->can('update', $project)) {
        $project->update([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'settings' => $request->settings,
            'api_token' => $request->api_token,
            'timezone' => $request->timezone,
            'color' => $request->color,
            'enabled' => $request->enabled,
            'lead_validation_days' => $request->lead_validation_days,
            'detect_region' => $request->detect_region,
            'calltracking' => $request->calltracking,
        ]);
    }

    return response()->json(['success' => 'Проект успешно обновлен'], 200);

    }

    public function destroy(Request $request, Project $project){

        $user = auth()->user();

        $this->authorize('delete', $project);

        $project->delete();

        return response()->json(['success' => 'Проект успешно удален'], 200);
    }
}

