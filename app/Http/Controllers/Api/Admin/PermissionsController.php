<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Permissions\StoreRequests;
use App\Http\Requests\Permissions\UpdateRequests;
use App\Models\Permission;

class PermissionsController extends Controller
{
    public function index(){

        $permissions = Permission::with(['user:id,name', 'project:id,name'])
            ->select(['id', 'project_id', user_id])
            ->simplePaginate(20);

        return response()->json(['permissions' => $permissions]);
    }

    public function show($id){

        $permissions = Permissions::find($id);

        if(!$permissions){
            return response()->json(['error' => 'Разрешение не найдено'], 404);
        }

        return response()->json(['permissions' => $permissions], 200);
    }

    public function store(StoreRequests $requests, $id){

        $permissions = Permissions::create([
            'project_id' => $requests->project_id,
            'user_id' => $requests->user_id,
            'fields' => $requests->fields,
            'manage_leeds' => $requests->manage_leeds,
            'export_data' => $requests->export_data,
            'manage_permissions' => $requests->manage_permissions,
            'manage_settings' => $requests->manage_settings,
            'manage_project' => $requests->manage_project,
        ]);

        if(!$permissions){
            return response()->json(['error' => 'Ошибка в добавлении разрешения'], 401);
        }

        return response()->json(['success' => 'Разрешение успешно добавлено'], 200);
    }

    public function update(UpdateRequests $requests, $id){

        $permissions = Permission::find($id);

        if(!$permissions){
            return response()->json(['error' => 'Разрешение не найдено'], 404);
        }

        $permissions->update([
            'project_id' => $requests->project_id,
            'user_id' => $requests->user_id,
            'fields' => $requests->fields,
            'manage_leeds' => $requests->manage_leeds,
            'export_data' => $requests->export_data,
            'manage_permissions' => $requests->manage_permissions,
            'manage_settings' => $requests->manage_settings,
            'manage_project' => $requests->manage_project,
        ]);

        return response()->json(['success' => 'Разрешение успешно обновлено'], 200);
    }

    public function destroy(Requests $requests, $id){

        $permissions = Permission::find($id);

        if(!$permissions){
            return response()->json(['error' => 'Разрешение не найдено'], 404);
        }

        $permissions->delete();

        return response()->json(['success' => 'Разрешение успешно удалено'], 200);
    }
}
