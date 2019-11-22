<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Daily_report extends Model
{
    use SoftDeletes;
    protected $table = 'my_flights';
}