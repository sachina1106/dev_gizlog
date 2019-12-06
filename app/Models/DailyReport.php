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

    public function fetchReportByUserId($id)
    {
        return $this->where('user_id', $id);
    }

    public function fetchDailyReportByUserId($id, $searchMonth)
    {
        if (!empty($searchMonth)) {
            return  $this->fetchReportByUserId($id)->where('reporting_time', 'like', $searchMonth.'%')->paginate(10);
        }

        return  $this->fetchReportByUserId($id)->paginate(10);
    }
}
