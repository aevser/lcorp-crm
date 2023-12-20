<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\Project\Store;
use App\Models\CRM\Project\Project;
use App\Models\User;

class ProjectController extends Controller
{
    public function index(){

        $project = Project::with(['user:id,name'])
            ->select(['id', 'name', 'user_id'])
            ->simplePaginate(20);

        return response()->json(['project' => $project], 200);
    }

    public function store(Request $request){

        $this->authorize('create', Project::class);
        
        $user = auth()->user();

        if($user->can('create', Project::class)){
            $projects = Project::create([
                'user_id'=> $user->id,
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

    public function update(Requests\Update $request, Project $project){

        $this->authorize('update', $project);

        $user = auth()->user();

        if ($user->can('update', $project)){
            $project->update([
                'user_id' => $user->id,
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

