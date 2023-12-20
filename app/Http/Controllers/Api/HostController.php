<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Host;

class HostController extends Controller
{
    public function index(){

        $hosts = \App\Jobs\Hosts\Index::dispatchSync();

        return response()->json(['hosts' => $hosts], 200);
    }

    public function store(Request $request){

        $hosts = \App\Jobs\Hosts\Create::dispatchSync(
            project_id: $request->project_id,
            url: $request->url,
        );

        return response()->json(['success' => 'Хост успешно добавлен'], 200);
    }

    public function update(Request $request, $hostsId){

        $hosts = \App\Jobs\Hosts\Update::dispatchSync(
            hostsId: $hostsId,
            project_id: $request->project_id,
            url: $request->url,
        );

        return response()->json(['success' => 'Хост успешно обновлен'], 200);
    }

    public function destroy(Request $request, $hostsId){

        $hosts = \App\Jobs\Hosts\Delete::dispatchSync($hostsId);

        return response()->json(['success' => 'Хост успешно удален'], 200);
    }
}
