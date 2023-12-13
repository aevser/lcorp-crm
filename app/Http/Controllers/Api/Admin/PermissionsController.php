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
            ->select(['id', 'project_id', 'user_id'])
            ->simplePaginate(20);

        return response()->json(['permissions' => $permissions]);
    }

    public function show($id){

        $permissions = Permission::find($id);

        if(!$permissions){
            return response()->json(['error' => 'Разрешение не найдено'], 404);
        }

        return response()->json(['permissions' => $permissions], 200);
    }

    public function store(StoreRequests $request, $id){

        $permissions = Permission::create([
            'project_id' => $request->project_id,
            'user_id' => $request->user_id,
            'fields' => $request->fields,
            'manage_leeds' => $request->manage_leeds,
            'export_data' => $request->export_data,
            'manage_permissions' => $request->manage_permissions,
            'manage_settings' => $request->manage_settings,
            'manage_project' => $request->manage_project,
        ]);

        if(!$permissions){
            return response()->json(['error' => 'Ошибка в добавлении разрешения'], 401);
        }

        return response()->json(['success' => 'Разрешение успешно добавлено'], 200);
    }

    public function update(UpdateRequests $request, $id){

        $permissions = Permission::find($id);

        if(!$permissions){
            return response()->json(['error' => 'Разрешение не найдено'], 404);
        }

        $permissions->update([
            'project_id' => $request->project_id,
            'user_id' => $request->user_id,
            'fields' => $request->fields,
            'manage_leeds' => $request->manage_leeds,
            'export_data' => $request->export_data,
            'manage_permissions' => $request->manage_permissions,
            'manage_settings' => $request->manage_settings,
            'manage_project' => $request->manage_project,
        ]);

        return response()->json(['success' => 'Разрешение успешно обновлено'], 200);
    }

    public function destroy(Request $request, $id){

        $permissions = Permission::find($id);

        if(!$permissions){
            return response()->json(['error' => 'Разрешение не найдено'], 404);
        }

        $permissions->delete();

        return response()->json(['success' => 'Разрешение успешно удалено'], 200);
    }
}
