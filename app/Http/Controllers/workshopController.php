<?php

namespace App\Http\Controllers;

use App\workshopModel;
use Illuminate\Http\Request;
use Image;
use File;
class workshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = workshopModel::orderBy("workshop_id", "desc")->paginate("20");
        return view("admin.workshop.workshop", compact("result"));
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
        $date = date("Y-m-d H:i:s",strtotime($request->event_date));
        if ($request->hasfile('image')) {

            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->extension();

            $destinationPath = public_path('/slider_image/workshop');
            $profile_image = Image::make($image->getRealPath());
            $profile_image->resize(730, 460, function ($constraint) {
                // $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);
            workshopModel::create([
                "title" => $request->title,
                "image" => $image_name,
                "details" => $request->details,
                "event_date" => $date ,
                "status" => $request->status,

            ]);
        } else {
            workshopModel::create([
                "title" => $request->title,
                "details" => $request->details,
                "event_date" => $date,
                "status" => $request->status,

            ]);
        }
        return redirect()->back()->with("success", "Workshop saved!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\workshopModel  $workshopModel
     * @return \Illuminate\Http\Response
     */
    public function show(workshopModel $workshopModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\workshopModel  $workshopModel
     * @return \Illuminate\Http\Response
     */
    public function edit(workshopModel $workshopModel,$id)
    {
        $result = workshopModel::where("workshop_id", $id)->first();
        return view("admin.workshop.workshopEdit", compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\workshopModel  $workshopModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, workshopModel $workshopModel,$id)
    {
        $date = date("Y-m-d H:i:s", strtotime($request->event_date));
        if ($request->hasfile('image')) {

            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->extension();

            $destinationPath = public_path('/slider_image/workshop');
            $profile_image = Image::make($image->getRealPath());
            $profile_image->resize(150, 150, function ($constraint) {
                // $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);
            workshopModel::where("workshop_id",$id)->update([
                "title" => $request->title,
                "image" => $image_name,
                "details" => $request->details,
                "event_date" => $date,
                "status" => $request->status,

            ]);
        } else {
            workshopModel::where("workshop_id", $id)->update([
                "title" => $request->title,
                "details" => $request->details,
                "event_date" => $date,
                "status" => $request->status,

            ]);
        }
        return redirect()->back()->with("success", "Workshop updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\workshopModel  $workshopModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(workshopModel $workshopModel,$id)
    {
        $info = workshopModel::where("workshop_id", $id)->first();

        if ($info) {
            $image_path = "public/slider_image/workshop/" . $info->image;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        workshopModel::where("workshop_id", $id)->delete();
        return redirect()->back()->with("delete", "workshop deleted!");
    }

}
