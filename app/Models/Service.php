<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

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
