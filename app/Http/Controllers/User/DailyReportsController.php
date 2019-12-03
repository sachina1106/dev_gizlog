<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\DailyReportRequest;
use App\Http\Requests\User\SearchMonthRequest;
use App\Models\DailyReport;
use Auth;

class DailyReportsController extends Controller
{
    private $dailyReport;

    public function __construct(DailyReport $dailyReport)
    {
        $this->middleware('auth');
        $this->dailyReport = $dailyReport;
    }

    /**
     * Display a listing of the resource.
     *一覧表示のメソッド.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchMonthRequest $request)
    {
        $searchMonth = $request->input('search-month');
        if (empty($searchMonth)) {
            $reports = $this->dailyReport->fetchDailyReportByUserId(Auth::id());
        } else {
            $reports = $this->dailyReport->getData($searchMonth);
        }

        return view('user.dailyReport.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *新規作成画面表示処理.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.dailyReport.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *DBに保存処理メソッド
     *
     * @return \Illuminate\Http\Response
     */
    public function store(DailyReportRequest $request)
    {
        $input = $request->all();

        $input['user_id'] = Auth::id();
        $this->dailyReport->fill($input)->save();

        return redirect()->route('reports.index');
    }

    /**
     * Display the specified resource.
     *詳細画面表示処理.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = $this->dailyReport->find($id);

        return view('user.dailyReport.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *編集処理
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = $this->dailyReport->find($id);

        return view('user.dailyReport.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *更新処理
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id, DailyReportRequest $request)
    {
        $report = $request->all();
        $this->dailyReport->find($id)->fill($report)->save();

        return redirect()->route('reports.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *削除処理
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->dailyReport->find($id)->delete();

        return redirect()->route('reports.index');
    }
}