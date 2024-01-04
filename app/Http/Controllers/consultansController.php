<?php

namespace App\Http\Controllers;

use App\consultansModel;
use Illuminate\Http\Request;
use Image;
use File;

class consultansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = consultansModel::orderBy("id","desc")->paginate("15");
        return view("admin.consultans.consultans",compact('result'));
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
        if ($request->hasfile('image')) {

            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->extension();

            $destinationPath = public_path('/slider_image/consultans');
            $profile_image = Image::make($image->getRealPath());
            $profile_image->resize(150, 150, function ($constraint) {
                // $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);
            consultansModel::create([
                "name" => $request->name,
                "image" => $image_name,
                "info" => $request->info,
                "status" => $request->status,

            ]);
        } else {
            consultansModel::create([
                "name" => $request->name,
                "info" => $request->info,
                "status" => $request->status,

            ]);
        }
        return redirect()->back()->with("success", "Consaltans saved!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\consultansModel  $consultansModel
     * @return \Illuminate\Http\Response
     */
    public function show(consultansModel $consultansModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\consultansModel  $consultansModel
     * @return \Illuminate\Http\Response
     */
    public function edit(consultansModel $consultansModel,$id)
    {
       $result=consultansModel::where("id",$id)->first();
       return view("admin.consultans.consultans_edit", compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\consultansModel  $consultansModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, consultansModel $consultansModel,$id)
    {
        if ($request->hasfile('image')) {
            $info = consultansModel::where("id", $id)->first();

            if ($info) {
                $image_path = "public/slider_image/comsultans/" . $info->image;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->extension();

            $destinationPath = public_path('/slider_image/consultans');
            $profile_image = Image::make($image->getRealPath());
            $profile_image->resize(150, 150, function ($constraint) {
                // $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);
            consultansModel::where("id", $id)->update([
                "name" => $request->name,
                "image" => $image_name,
                "info" => $request->info,
                "status" => $request->status,

            ]);
        } else {
            consultansModel::where("id", $id)->update([
                "name" => $request->name,
                "info" => $request->info,
                "status" => $request->status,

            ]);
        }
        return redirect()->back()->with("success", "Consaltans Updated!");
    }

    /**
     * Remove the specified resource from storage.P
     *
     * @param  \App\consultansModel  $consultansModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(consultansModel $consultansModel,$id)
    {
        $info = consultansModel::where("id", $id)->first();

        if ($info) {
            $image_path = "public/slider_image/consultans/" . $info->image;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        consultansModel::where("id", $id)->delete();
        return redirect()->back()->with("success", "Consaltans delete!");
    }
}
