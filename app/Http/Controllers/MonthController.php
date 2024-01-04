<?php

namespace App\Http\Controllers;

use App\MonthModel;
use Illuminate\Http\Request;

class MonthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = MonthModel::all();
        return view('admin.month.months',compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_month(Request $request)
    {
        MonthModel::create(['month_name'=>$request->month_name,'status'=>$request->status]);
        return redirect()->back()->with('success','month saved!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit_month($id)
    {
        $result = MonthModel::where('id',$id)->first();
        return view('admin.month.months_edit',compact('result'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MonthModel  $monthModel
     * @return \Illuminate\Http\Response
     */
    public function update_month(Request $request)
    {
        $id = $request->id;

    MonthModel::where('id',$id)->update(['month_name'=>$request->month_name,'status'=>$request->status]);
return redirect('month_view')->with('success','data updated!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MonthModel  $monthModel
     * @return \Illuminate\Http\Response
     */
    public function edit(MonthModel $monthModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MonthModel  $monthModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MonthModel $monthModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MonthModel  $monthModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonthModel $monthModel)
    {
        //
    }
}
