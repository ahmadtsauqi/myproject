<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peringatandini extends Model
{
    Protected $table = 'peringatandini';

    protected $fillable  = ['status', 'pesan'];
}
