<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{    
    use HasFactory;

    protected $fillable = [
        'name', 
        'summary', 
        'status', 
        'comic_web'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
}
