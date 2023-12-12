<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'manage_leeds', 'export_data', 'fields',
    ];

    protected $casts = [
        'fields' => 'array',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
