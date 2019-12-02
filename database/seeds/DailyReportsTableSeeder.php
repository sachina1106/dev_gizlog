<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DailyReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('daily_reports')->insert([
            [
                'reporting_time' => Carbon::create(11, 6),
                'title' => 'test',
                'user_id' => '1',
                'content' => 'テスト',
            ],
            [
                'reporting_time' => Carbon::create(11, 7),
                'title' => 'test1',
                'user_id' => '1',
                'content' => 'テスト1',
                ],
        ]);
    }
}