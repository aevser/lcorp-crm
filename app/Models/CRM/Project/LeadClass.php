<?php

namespace App\Models\CRM\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadClasses extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'type', 'color', 'project_id',
    ];
}
