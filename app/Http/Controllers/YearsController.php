<?php

namespace App\Http\Controllers;

use App\YearsModel;
use Illuminate\Http\Request;

class YearsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result=YearsModel::orderBy('id','desc')->get();
        return view('admin.years.years',compact('result'));
    }

    public function save_years(Request $request)
    {
        $request->validate([
            'year_name' => 'required',
        ]);
        YearsModel::create(['years_name'=>$request->year_name,'status'=>$request->status]);
        return redirect()->back()->with('success','data saved!');
    }

}
