<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataBMKG extends Model
{
    protected $table = 'databmkg';

    protected $fillable = ['humidity', 'temperature', 'weather', 'date_time'];

    
}
