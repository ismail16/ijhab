<?php

namespace App\Http\Controllers;

use App\traningModel;
use Illuminate\Http\Request;
use Image;
use File;

class traningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = traningModel::orderBy("traning_id", "desc")->paginate("20");
        return view("admin.traning.traning", compact("result"));
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
        $date = date("Y-m-d H:i:s", strtotime($request->traning_date));
        if ($request->hasfile('image')) {

            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->extension();

            $destinationPath = public_path('/slider_image/traning');
            $profile_image = Image::make($image->getRealPath());
            $profile_image->resize(700, 400, function ($constraint) {
                // $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);
            traningModel::create([
                "title" => $request->title,
                "image" => $image_name,
                "details" => $request->details,
                "traning_date" => $date,
                "status" => $request->status,

            ]);
        } else {
            traningModel::create([
                "title" => $request->title,
                "details" => $request->details,
                "traning_date" => $date,
                "status" => $request->status,

            ]);
        }
        return redirect()->back()->with("success", "traning saved!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\traningModel  $traningModel
     * @return \Illuminate\Http\Response
     */
    public function show(traningModel $traningModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\traningModel  $traningModel
     * @return \Illuminate\Http\Response
     */
    public function edit(traningModel $traningModel, $id)
    {
        $result = traningModel::where("traning_id", $id)->first();
        return view("admin.traning.traningEdit", compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\traningModel  $traningModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, traningModel $traningModel, $id)
    {
        $date = date("Y-m-d H:i:s", strtotime($request->traning_date));
        if ($request->hasfile('image')) {

            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->extension();

            $destinationPath = public_path('/slider_image/traning');
            $profile_image = Image::make($image->getRealPath());
            $profile_image->resize(700, 400, function ($constraint) {
                // $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);
            traningModel::where("traning_id", $id)->update([
                "title" => $request->title,
                "image" => $image_name,
                "details" => $request->details,
                "traning_date" => $date,
                "status" => $request->status,

            ]);
        } else {
            traningModel::where("traning_id", $id)->update([
                "title" => $request->title,
                "details" => $request->details,
                "traning_date" => $date,
                "status" => $request->status,

            ]);
        }
        return redirect()->back()->with("success", "traning updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\traningModel  $traningModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(traningModel $traningModel, $id)
    {
        $info = traningModel::where("traning_id", $id)->first();

        if ($info) {
            $image_path = "public/slider_image/traning/" . $info->image;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        traningModel::where("traning_id", $id)->delete();
        return redirect()->back()->with("delete", "traning deleted!");
    }
}
