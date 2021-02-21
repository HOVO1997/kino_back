<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;


    protected $fillable = [
        'image',
        'video',
        'description',
        'release',
        'running',
        'country_id',
        'format',
        'limit',
        'rating'
    ];


    public function genre(){
        return $this->belongsToMany(Genre::class);
    }


    public function country()
    {
        return $this->belongsTo(Country::class);
    }

}
