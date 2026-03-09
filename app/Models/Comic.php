<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = [
        'name', 
        'summary', 
        'status', 
        'comic_web', 
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
