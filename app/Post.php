<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //para poder mostrar
    protected $date = ['published_at'];
}

