<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Request extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'lastname',
        'email',
        'address',
        'city',
        'state_id',
        'zip_code',
        'service_id',
        'service_date',
        'notes',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
}
