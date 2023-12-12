<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Roles\StoreRequests;
use App\Http\Requests\Roles\UpdateRequests;
use App\Models\Role;

class RolesController extends Controller
{
    public function index(){

        $roles = Role::with(['user:id,name'])
            ->select(['id', 'user_id'])
            ->simplePaginate(20);

        return response()->json(['roles' => $roles], 200);
    }

    public function show($id){

        $roles = Role::find($id);

        if(!$roles){
            return response()->json(['error' => 'Роль не найдена'], 404);
        }

        return response()->json(['roles' => $roles], 200);
    }

    public function store(StoreRequests $requests, $id){

        $roles = Role::create([
            'create_projects' => $requests->create_project,
            'manage_users' => $requests->manage_users,
            'manage_permissions' => $requests->manage_permissions,
            'edit_projects' => $requests->edit_projects,
            'global_settings' => $requests->global_settings,
        ]);

        if(!$roles){
            return response()->json(['error' => 'Ошибка в добавлении роли'], 404);
        }

        return response()->json(['success' => 'Роль успешно добавлена'], 200);
    }

    public function update(UpdateRequests $requests, $id){

        $roles = Role::find($id);

        if(!$roles){
            return response()->json(['error' => 'Роль не найдена'], 404);
        }

        $roles->update([
            'create_projects' => $requests->create_project,
            'manage_users' => $requests->manage_users,
            'manage_permissions' => $requests->manage_permissions,
            'edit_projects' => $requests->edit_projects,
            'global_settings' => $requests->global_settings,
        ]);

        return response()->json(['success' => 'Роль успешно обновлена'], 200);
    }

    public function destroy($id){

        $roles = Role::find($id);

        if(!$roles){
            return response()->json(['error' => 'Роль не найдена'], 404);
        }

        $roles->delete();

        return response()->json(['success' => 'Роль успешно удалена'], 200);
    }
}
