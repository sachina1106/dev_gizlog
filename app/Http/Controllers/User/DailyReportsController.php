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
    public function index()
    {
        $reports = $this->dataBase->getUserId(Auth::id());

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
        // $input = $request->validate([
        //             'title' => 'required|string|max:30',
        //             'content' => 'required|string|max:1000',
        //         ]);
        $input = $request->all();

        $input['user_id'] = Auth::id();
        // dd($input);
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
        // dd($report);

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
    }
}