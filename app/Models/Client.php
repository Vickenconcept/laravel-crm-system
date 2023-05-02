<?php

namespace App\Models;

use App\Events\ClientCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;

class client extends Model
{
    use HasFactory;

    protected $fillable = [
        'company' ,
        'vat',
        'address',

    ];

    protected $dispatchesEvents = [
        'created' => ClientCreated::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
