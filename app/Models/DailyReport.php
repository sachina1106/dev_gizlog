<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyReport extends Model
{
    use SoftDeletes;
    protected $dates = [
        'reporting_time',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'reporting_time',
    ];

    public function fetchDailyReportByUserId($id, $searchMonth)
    {
        if (empty($searchMonth)) {
            return  $reports = $this->where('user_id', $id)->paginate(10);
        } else {
            return  $reports = $this->where('user_id', $id)->where('reporting_time', 'like', $searchMonth.'%')->paginate(10);
        }
    }
}