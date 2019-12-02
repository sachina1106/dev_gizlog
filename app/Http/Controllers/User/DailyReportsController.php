<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\DailyReportRequest;
use App\Models\DailyReport;
use Auth;

class DailyReportsController extends Controller
{
    private $dataBase;

    public function __construct(DailyReport $dataBase)
    {
        $this->middleware('auth');
        $this->dataBase = $dataBase;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_month = $request->input('search-month');
        if (empty($search_month)) {
            $reports = $this->dataBase->getUserId(Auth::id());
        } else {
            $reports = $this->dataBase->where('reporting_time', 'like', '%'.$search_month.'%')->paginate(10);
        }

        return view('user.dailyReport.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
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
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, DailyReportRequest $form)
    {
        $input = $request->all();

        $input['user_id'] = Auth::id();
        $this->dataBase->fill($input)->save();

        return redirect()->route('reports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = $this->dataBase->find($id);

        return view('user.dailyReport.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = $this->dataBase->find($id);

        return view('user.dailyReport.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, DailyReportRequest $form)
    {
        $report = $request->all();
        $this->dataBase->find($id)->fill($report)->save();

        return redirect()->route('reports.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->dataBase->find($id)->delete();

        return redirect()->route('reports.index');
    }
}