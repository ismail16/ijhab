<?php

namespace App\Http\Controllers;

use App\directorModel;
use Illuminate\Http\Request;
use Image;
use File;
class directorConatroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $result = directorModel::orderBy("director_id","desc")->paginate("20");
      return view("admin.director.director",compact("result"));
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

            $destinationPath = public_path('/slider_image/director');
            $profile_image = Image::make($image->getRealPath());
            $profile_image->resize(150, 150, function ($constraint) {
                // $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);
            directorModel::create([
                "name" => $request->name,
                "image" => $image_name,
                "degignation" => $request->degignation,
                "status" => $request->status,

            ]);
        } else {
            directorModel::create([
                "name" => $request->name,
                "degignation" => $request->degignation,
                "status" => $request->status,

            ]);
        }
        return redirect()->back()->with("success", "Director saved!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\directorModel  $directorModel
     * @return \Illuminate\Http\Response
     */
    public function show(directorModel $directorModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\directorModel  $directorModel
     * @return \Illuminate\Http\Response
     */
    public function edit(directorModel $directorModel,$id)
    {
        $result = directorModel::where("director_id", $id)->first();
        return view("admin.director.directorEdit", compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\directorModel  $directorModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, directorModel $directorModel,$id)
    {
        if ($request->hasfile('image')) {
            $info = directorModel::where("director_id", $id)->first();

            if ($info) {
                $image_path = "public/slider_image/director/" . $info->image;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->extension();

            $destinationPath = public_path('/slider_image/director');
            $profile_image = Image::make($image->getRealPath());
            $profile_image->resize(150, 150, function ($constraint) {
                // $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);
            directorModel::where("director_id", $id)->update([
                "name" => $request->name,
                "image" => $image_name,
                "degignation" => $request->degignation,
                "status" => $request->status,

            ]);
        } else {
            directorModel::where("director_id", $id)->update([
                "name" => $request->name,
                "degignation" => $request->degignation,
                "status" => $request->status,

            ]);
        }
        return redirect()->back()->with("success", "director updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\directorModel  $directorModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(directorModel $directorModel,$id)
    {
        $info = directorModel::where("director_id", $id)->first();

        if ($info) {
            $image_path = "public/slider_image/director/" . $info->image;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        directorModel::where("director_id", $id)->delete();
        return redirect()->back()->with("delete", "trainer deleted!");
    }
    
    
}
