<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CRM\Project\Project;

class Host extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id', 'url',
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
