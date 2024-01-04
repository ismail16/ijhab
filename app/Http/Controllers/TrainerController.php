<?php

namespace App\Http\Controllers;

use App\TrainerModel;
use Illuminate\Http\Request;
use Image;
use File;
class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = TrainerModel::orderBy("trainer_id", "desc")->paginate("5");

        return view('admin.trainer.trainer', compact('result'));
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


        if ($request->hasfile('image')) {

            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->extension();

            $destinationPath = public_path('/slider_image/trainer');
            $profile_image = Image::make($image->getRealPath());
            $profile_image->resize(210, 250, function ($constraint) {
                // $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);
        TrainerModel::create([
            "name" => $request->name,
            "image" => $image_name,
                "details" => $request->details,
            "status" => $request->status,

        ]);
        }else{
            TrainerModel::create([
                "name" => $request->name,
                "details" => $request->details,
                "status" => $request->status,

            ]);
        }
        return redirect()->back()->with("success","Trainer saved!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TrainerModel  $trainerModel
     * @return \Illuminate\Http\Response
     */
    public function show(TrainerModel $trainerModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TrainerModel  $trainerModel
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainerModel $trainerModel,$id)
    {
       $result = TrainerModel::where("trainer_id",$id)->first();
return view("admin.trainer.trainerEdit",compact('result'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TrainerModel  $trainerModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrainerModel $trainerModel,$id)
    {
        if ($request->hasfile('image')) {
            $info = TrainerModel::where("trainer_id", $id)->first();

            if ($info) {
                $image_path = "public/slider_image/trainer/" . $info->image;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->extension();

            $destinationPath = public_path('/slider_image/trainer');
            $profile_image = Image::make($image->getRealPath());
            $profile_image->resize(210, 250, function ($constraint) {
                // $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);
            TrainerModel::where("trainer_id",$id)->update([
                "name" => $request->name,
                "image" => $image_name,
                "details" => $request->details,
                "status" => $request->status,

            ]);
        } else {
            TrainerModel::where("trainer_id",$id)->update([
                "name" => $request->name,
                "details" => $request->details,
                "status" => $request->status,

            ]);
        }
        return redirect()->back()->with("success", "Trainer updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TrainerModel  $trainerModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrainerModel $trainerModel,$id)
    {
        $info = TrainerModel::where("trainer_id", $id)->first();

        if ($info) {
            $image_path = "public/slider_image/trainer/" . $info->image;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        TrainerModel::where("trainer_id", $id)->delete();
        return redirect()->back()->with("delete", "trainer deleted!");
    }

}
