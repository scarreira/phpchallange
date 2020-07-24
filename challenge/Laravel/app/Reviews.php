<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    //
    protected $table = 'reviews';
    protected $fillable = ['idMovie', 'idUser','rating','review'];
}