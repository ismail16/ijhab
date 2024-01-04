<?php

namespace App\Http\Controllers;

use App\sliderModel;
use Illuminate\Http\Request;
use Image;
use File;

class sliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $result = sliderModel::orderBy("slider_id", "desc")->get();

        return view("admin.slider.slider", compact('result'));
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

        // dd($_POST);

        if ($request->hasfile('image')) {

            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->extension();

            $destinationPath = public_path('/slider_image');
            $profile_image = Image::make($image->getRealPath());
            $profile_image->resize(1920, 820, function ($constraint) {
                // $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);

            sliderModel::create([

                "name" => $request->name,
                "image" => $image_name,
                "title" => $request->title,
                "subtitle" => $request->subtitle,
                "status" => $request->status,
            ]);
        }

        return redirect()->back()->with("success", "slider saved!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sliderModel  $sliderModel
     * @return \Illuminate\Http\Response
     */
    public function show(sliderModel $sliderModel)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sliderModel  $sliderModel
     * @return \Illuminate\Http\Response
     */
    public function edit(sliderModel $sliderModel, $id)
    {
        $info = sliderModel::where("slider_id", $id)->first();
        return view("admin.slider.slider_edit", compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sliderModel  $sliderModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sliderModel $sliderModel, $id)
    {




        if ($request->hasfile('image')) {
            $info = sliderModel::where("slider_id", $id)->first();

            if ($info) {
                $image_path = "public/slider_image/" . $info->image;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->extension();

            $destinationPath = public_path('/slider_image');
            $profile_image = Image::make($image->getRealPath());
            $profile_image->resize(1920, 820, function ($constraint) {
                // $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);

            sliderModel::where("slider_id", $id)->update([

                "name" => $request->name,
                "image" => $image_name,
                "title" => $request->title,
                "subtitle" => $request->subtitle,
                "status" => $request->status,
            ]);
        } else
            sliderModel::where("slider_id", $id)->update([
                "name" => $request->name,
                "title" => $request->title,
                "subtitle" => $request->subtitle,
                "status" => $request->status,
            ]);

        return redirect()->back()->with("success", "slider updated!");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sliderModel  $sliderModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(sliderModel $sliderModel, $id)
    {
        $info = sliderModel::where("slider_id", $id)->first();

        if ($info) {
            $image_path = "public/slider_image/" . $info->image;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        sliderModel::where("slider_id", $id)->delete();
        return redirect()->back()->with("delete", "slider deleted!");
    }
}
