<?php

namespace App\Models\CRM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CRM\Project\Project;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'project_id',
        'owner',
        'company',
        'status',
        'name', 
        'surname',
        'patronymic',
        'full_name',
        'phone',
        'entries',
        'email',
        'cost',
        'comment',
        'city',
        'region',
        'manual_region',
        'manual_city',
        'host',
        'ip',
        'source',
        'url_query_string',
        'utm',
        'utm_medium',
        'utm_source',
        'utm_campaign',
        'utm_content',
        'utm_term',
        'nextcall_date',
    ];

    public function project(){
        return $this->belongTo(Project::class);
    }
}
