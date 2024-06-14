<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicle';

    protected $fillable = ['merek','model','jenis','year','harga','image'];
}
