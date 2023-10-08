<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Service extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'category',
        'description',
        'img',
        // 'ip_address' => request()->ip(),
    ];

    public function categoryRelation()
    {
        return $this->belongsTo(Category::class, 'category', 'id');
    }
    
}
