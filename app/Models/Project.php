<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title' ,
        'description',
        'assigned_user',
        'assigned_client',
        'status',
        'date',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
