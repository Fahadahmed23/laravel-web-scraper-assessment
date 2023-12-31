<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{

    protected $table = 'movies';
    public $timestamp;
    use HasFactory,SoftDeletes;

    protected $fillable = ['title', 'year', 'rating', 'url'];


}
