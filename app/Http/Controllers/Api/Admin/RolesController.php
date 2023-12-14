<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Roles\StoreRequests;
use App\Http\Requests\Roles\UpdateRequests;
use App\Models\CRM\Role;

class RolesController extends Controller
{
    public function index(){

        $roles = \App\Jobs\Roles\Index::dispatchSync();
        
        return response()->json(['roles' => $roles], 200);
    }

    public function show($rolesId){

        $roles = \App\Jobs\Roles\Show::dispatchSync($rolesId);

        return response()->json(['roles' => $roles], 200);
    }

    public function store(Request $request){

        $roles = \App\Jobs\Roles\Create::dispatchSync(
            user_id: $request->user_id,
            create_projects: $request->create_projects,
            manage_users: $request->manage_users,
            manage_permissions: $request->manage_permissions,
            edit_projects: $request->edit_projects,
            global_settings: $request->global_settings,
        );

        return response()->json(['success' => 'Роль успешно добавлена'], 200);
    }

    public function update(Request $request, $rolesId){

        $roles = \App\Jobs\Roles\Update::dispatchSync(
            rolesId: $rolesId,
            user_id: $request->user_id,
            create_projects: $request->create_projects,
            manage_users: $request->manage_users,
            manage_permissions: $request->manage_permissions,
            edit_projects: $request->edit_projects,
            global_settings: $request->global_settings,
        );

        return response()->json(['success' => 'Роль успешно обновлена'], 200);
    }

    public function destroy(Request $request, $rolesId){

        $roles = \App\Jobs\Roles\Delete::dispatchSync($rolesId);

        return response()->json(['success' => 'Роль успешно удалена'], 200);
    }
}
