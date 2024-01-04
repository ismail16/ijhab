<?php

namespace App\Http\Controllers;

use App\editorModel;
use Illuminate\Http\Request;
use Image;
use File;
class editorConatroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = editorModel::orderBy("editor_id","desc")->paginate("20");
       return view("admin.editors.editors",compact("result"));
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

            $destinationPath = public_path('/slider_image/editor');
            $profile_image = Image::make($image->getRealPath());
            $profile_image->resize(150, 150, function ($constraint) {
                // $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);
            editorModel::create([
                "name" => $request->name,
                "image" => $image_name,
                "details" => $request->details,
                "status" => $request->status,

            ]);
        } else {
            editorModel::create([
                "name" => $request->name,
                "details" => $request->details,
                "status" => $request->status,

            ]);
        }
        return redirect()->back()->with("success", "Editor saved!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\editorModel  $editorModel
     * @return \Illuminate\Http\Response
     */
    public function show(editorModel $editorModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\editorModel  $editorModel
     * @return \Illuminate\Http\Response
     */
    public function edit(editorModel $editorModel,$id)
    {
        $result = editorModel::where("editor_id", $id)->first();
        return view("admin.editors.editorsEdit", compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\editorModel  $editorModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, editorModel $editorModel,$id)
    {
        if ($request->hasfile('image')) {
            $info = editorModel::where("editor_id", $id)->first();

            if ($info) {
                $image_path = "public/slider_image/editor/" . $info->image;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->extension();

            $destinationPath = public_path('/slider_image/editor');
            $profile_image = Image::make($image->getRealPath());
            $profile_image->resize(150, 150, function ($constraint) {
                // $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);
            editorModel::where("editor_id", $id)->update([
                "name" => $request->name,
                "image" => $image_name,
                "details" => $request->details,
                "status" => $request->status,

            ]);
        } else {
            editorModel::where("editor_id", $id)->update([
                "name" => $request->name,
                "details" => $request->details,
                "status" => $request->status,

            ]);
        }
        return redirect()->back()->with("success", "director updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\editorModel  $editorModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(editorModel $editorModel,$id)
    {
        $info = editorModel::where("editor_id", $id)->first();

        if ($info) {
            $image_path = "public/slider_image/editor/" . $info->image;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        editorModel::where("editor_id", $id)->delete();
        return redirect()->back()->with("delete", "editor deleted!");
    }
    
}
