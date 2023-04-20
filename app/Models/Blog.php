<?php

namespace App\Models;

use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function categories()
    {
        return $this->belongsToMany(Category::class );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImagePathAttribute()
    {
        return URL::to('/') . '/images/blogs/'.$this->image;
    }

    public function examples()
    {
        return $this->belongsToMany(Example::class);
    }

}
