<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    public function index(){

        $leads = \App\Jobs\Leads\Index::dispatchSync();

        return response()->json(['leads' => $leads], 200);
    }

    public function show($leadsId){

        $leads = \App\Jobs\Leads\Show::dispatchSync($leadsId);

        return response()->json(['leads' => $leads], 200);
    }

    public function store(Request $request){

        $leads = \App\Jobs\Leads\Create::dispatchSync(
            class_id: $request->class_id,
            project_id: $request->project_id,
            owner: $request->owner,
            company: $request->company,
            status: $request->status,
            name: $request->name,
            surname: $request->surname,
            patronymic: $request->patronymic,
            full_name: $request->full_name,
            phone: $request->phone,
            entries: $request->entries,
            email: $request->email,
            cost: $request->cost,
            comment: $request->comment,
            city: $request->city,
            region: $request->region,
            manual_region: $request->manual_region,
            manual_city: $request->manual_city,
            host: $request->host,
            ip: $request->ip,
            source: $request->source,
            url_query_string: $request->url_query_string,
            utm: $request->utm,
            utm_medium: $request->utm_medium,
            utm_source: $request->utm_source,
            utm_campaign: $request->utm_campaign,
            utm_content: $request->utm_content,
            utm_term: $request->utm_term,
            nextcall_date: $request->nextcall_date,
        );

        return response()->json(['success' => 'Лид успешно добавлен'], 200);
    }

    public function update(Request $request, $leadsId){

        $leads = \App\Jobs\Leads\Update::dispatchSync(
            leadsId: $leadsId,
            class_id: $request->class_id,
            project_id: $request->project_id,
            owner: $request->owner,
            company: $request->company,
            status: $request->status,
            name: $request->name,
            surname: $request->surname,
            patronymic: $request->patronymic,
            full_name: $request->full_name,
            phone: $request->phone,
            entries: $request->entries,
            email: $request->email,
            cost: $request->cost,
            comment: $request->comment,
            city: $request->city,
            region: $request->region,
            manual_region: $request->manual_region,
            manual_city: $request->manual_city,
            host: $request->host,
            ip: $request->ip,
            source: $request->source,
            url_query_string: $request->url_query_string,
            utm: $request->utm,
            utm_medium: $request->utm_medium,
            utm_source: $request->utm_source,
            utm_campaign: $request->utm_campaign,
            utm_content: $request->utm_content,
            utm_term: $request->utm_term,
            nextcall_date: $request->nextcall_date,
        );

        return response()->json(['success' => 'Лид успешно обновлен'], 200);
    }

    public function destroy(Request $request, $leadsId){
        
        $leads = \App\Jobs\Leads\Destroy::dispatchSync($leadsId);

        return response()->json(['success' => 'Лид успешно удален'], 200);
    }
}
