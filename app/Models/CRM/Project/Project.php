<?php

namespace App\Models\CRM\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'settings',
        'api_token',
        'timezone',
        'color',
        'enabled',
        'lead_validation_days',
        'detect_region',
        'calltracking',
        'leads_today',
        'leads_total',
    ];

    public function permissions(){
        return $this->hasMany(Permission::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

