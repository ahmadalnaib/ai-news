<?php

namespace App\Models;

use App\Models\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Click extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
