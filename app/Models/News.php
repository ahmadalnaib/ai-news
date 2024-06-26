<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Click;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function clicks()
    {
     return $this->hasMany(Click::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
