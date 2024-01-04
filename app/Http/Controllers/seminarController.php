<?php

namespace App\Http\Controllers;

use App\seminarModel;
use Illuminate\Http\Request;
use Image;
use File;
class seminarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = seminarModel::orderBy("seminar_id", "desc")->paginate("20");
        return view("admin.seminar.seminar", compact("result"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = date("Y-m-d H:i:s", strtotime($request->event_date));
        if ($request->hasfile('image')) {

            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->extension();

            $destinationPath = public_path('/slider_image/seminar');
            $profile_image = Image::make($image->getRealPath());
            $profile_image->resize(700, 400, function ($constraint) {
                // $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);
            seminarModel::create([
                "title" => $request->title,
                "image" => $image_name,
                "details" => $request->details,
                "seminar_date" => $date,
                "status" => $request->status,

            ]);
        } else {
            seminarModel::create([
                "title" => $request->title,
                "details" => $request->details,
                "seminar_date" => $date,
                "status" => $request->status,

            ]);
        }
        return redirect()->back()->with("success", "seminar saved!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\seminarModel  $seminarModel
     * @return \Illuminate\Http\Response
     */
    public function show(seminarModel $seminarModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\seminarModel  $seminarModel
     * @return \Illuminate\Http\Response
     */
    public function edit(seminarModel $seminarModel,$id)
    {
        $result = seminarModel::where("seminar_id", $id)->first();
        return view("admin.seminar.seminarEdit", compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\seminarModel  $seminarModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, seminarModel $seminarModel,$id)
    {
        $date = date("Y-m-d H:i:s", strtotime($request->event_date));
        if ($request->hasfile('image')) {

            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->extension();

            $destinationPath = public_path('/slider_image/seminar');
            $profile_image = Image::make($image->getRealPath());
            $profile_image->resize(700, 400, function ($constraint) {
                // $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);
            seminarModel::where("seminar_id", $id)->update([
                "title" => $request->title,
                "image" => $image_name,
                "details" => $request->details,
                "seminar_date" => $date,
                "status" => $request->status,

            ]);
        } else {
            seminarModel::where("seminar_id", $id)->update([
                "title" => $request->title,
                "details" => $request->details,
                "seminar_date" => $date,
                "status" => $request->status,

            ]);
        }
        return redirect()->back()->with("success", "Seminar updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\seminarModel  $seminarModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(seminarModel $seminarModel,$id)
    {
        $info = seminarModel::where("seminar_id", $id)->first();

        if ($info) {
            $image_path = "public/slider_image/seminar/" . $info->image;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        seminarModel::where("seminar_id", $id)->delete();
        return redirect()->back()->with("delete", "seminar deleted!");
    }

}
