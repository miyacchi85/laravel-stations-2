<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'image_url',
        'published_year',
        'description',
        'is_showing',
        'genre_id',
    ];

    public function genre() {
        return $this->belongsTo('App\Models\Genre');
    }

    public function schedules() {
        return $this->hasMany('App\Models\Schedule');
    }
}
