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

        $permissions = \App\Jobs\Permission\Index::dispatchSync();

        return response()->json(['permissions' => $permissions], 200);
    }

    public function show($permissionsId){

        $permissions = \App\Jobs\Permission\Show::dispatchSync($permissionsId);

        return response()->json(['permissions' => $permissions], 200);
    }

    public function store(Request $request){

        $permissions = \App\Jobs\Permission\Create::dispatchSync(
            project_id: $request->project_id,
            user_id: $request->user_id,
            fields: $request->fields,
            manage_leads: $request->manage_leads,
            export_data: $request->export_data,
            manage_permissions: $request->manage_permissions,
            manage_settings: $request->manage_settings,
            manage_project: $request->manage_project,
        );

        return response()->json(['success' => 'Разрешение успешно добавлено'], 200);
    }

    public function update(Request $request, $permissionsId){

        $permissions = \App\Jobs\Permission\Update::dispatchSync(
            permissionsId: $permissionsId,
            project_id: $request->project_id,
            user_id: $request->user_id,
            fields: $request->fields,
            manage_leads: $request->manage_leads,
            export_data: $request->export_data,
            manage_permissions: $request->manage_permissions,
            manage_settings: $request->manage_settings,
            manage_project: $request->manage_project,
        );

        return response()->json(['success' => 'Разрешение успешно обновлено'], 200);
    }

    public function destroy(Request $request, $permissionsId){

        $permissions = \App\Jobs\Permission\Delete::dispatchSync($permissionsId);

        return response()->json(['success' => 'Разрешение успешно удалено'], 200);
    }
}
