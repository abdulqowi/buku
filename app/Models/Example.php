<?php

namespace App\Models;

use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Example extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getImagePathAttribute()
    {
        return URL::to('/') . '/images/examples/'.$this->image;
    }
    
    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }
}
