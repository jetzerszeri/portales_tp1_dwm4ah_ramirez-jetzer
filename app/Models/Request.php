<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

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
}
