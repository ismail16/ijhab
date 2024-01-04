<?php

namespace App\Http\Controllers;

use App\coureseTraninerModel;
use App\courselistModel;
use App\TrainerModel;
use Illuminate\Http\Request;
use Image;
use File;
use Psy\TabCompletion\AutoCompleter;

class courselistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = courselistModel::orderBy("list_id", "desc")->paginate("15");
        $traniner=TrainerModel::all();
        return view("admin.courselist.courselist", compact("result", "traniner"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($_POST);
        $request->validate([
            "traniner_id" => 'required'
        ]);
        $date = date("Y-m-d", strtotime($request->course_date));
        if ($request->hasfile('image')) {

            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->extension();

            $destinationPath = public_path('/slider_image/course');
            $profile_image = Image::make($image->getRealPath());
            $profile_image->resize(150, 150, function ($constraint) {
                // $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);
            $course = new courselistModel();
            $course->name = $request->name;
            $course->course_date = $date;
            $course->image = $image_name;
            $course->details = $request->details;
            $course->status = $request->status;
            $course->save();
            foreach($request->traniner_id as $val){
                coureseTraninerModel::create([
                    'course_id'=>$course->list_id,
                    'traniner_id'=>$val,
                ]);
            }
        }else{

            $course = new courselistModel();
            $course->name=$request->name;
            $course->course_date= $date;
            $course->details=$request->details;
            $course->status=$request->status;
            $course->save();
            foreach ($request->traniner_id as $val) {
                coureseTraninerModel::create([
                    'course_id' => $course->list_id,
                    'traniner_id' => $val,
                ]);
            }

        }
return redirect()->back()->with("success","data saved");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\courselistModel  $courselistModel
     * @return \Illuminate\Http\Response
     */
    public function show(courselistModel $courselistModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\courselistModel  $courselistModel
     * @return \Illuminate\Http\Response
     */
    public function edit(courselistModel $courselistModel,$id)
    {
        $result = courselistModel::where("list_id",$id)->first();
        $traniner = TrainerModel::all();
        return view("admin.courselist.courselistEdit", compact("result", "traniner"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\courselistModel  $courselistModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, courselistModel $courselistModel,$id)
    {
        $date = date("Y-m-d", strtotime($request->course_date));
        if ($request->hasfile('image')) {

            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->extension();

            $destinationPath = public_path('/slider_image/course');
            $profile_image = Image::make($image->getRealPath());
            $profile_image->resize(150, 150, function ($constraint) {
                // $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);

            courselistModel::where("list_id",$id)->update([
                'name'=>$request->name,
                'course_date'=> $date,
                'image'=> $image_name,
                'details'=>$request->details,
                'status'=>$request->status
            ]);
            if ($request->traniner_id) {
            foreach ($request->traniner_id as $val) {
                coureseTraninerModel::where("course_id",$id)->update([
                    'course_id' => $id,
                    'traniner_id' => $val,
                ]);
            }
            }
        } else {

            courselistModel::where("list_id", $id)->update([
                'name' => $request->name,
                'course_date' => $date,
                'details' => $request->details,
                'status' => $request->status
            ]);
            if($request->traniner_id){
            foreach ($request->traniner_id as $val) {
                coureseTraninerModel::where("course_id", $id)->update([
                    'course_id' => $id,
                    'traniner_id' => $val,
                ]);
            }
        }
        }
        return redirect()->back()->with("success", "data udpated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\courselistModel  $courselistModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(courselistModel $courselistModel)
    {
        //
    }
}
