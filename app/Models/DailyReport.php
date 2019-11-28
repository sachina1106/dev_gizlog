<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyReport extends Model
{
    use SoftDeletes;
    // protected $table = 'my_flights';
    protected $dates = [
        'reporting_time',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'content',
        'reporting_time',
        'user_id',
    ];

    public function getUserId($id)
    {
        return $this->where('user_id', $id)->get();
    }

    // public  static function getDate($reporting_time){
    //     $date = Date::whereBetween("reporting_time", [$from])->get();

    // }
}