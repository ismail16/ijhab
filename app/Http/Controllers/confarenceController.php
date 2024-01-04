<?php

namespace App\Http\Controllers;

use App\confarenceModel;
use Illuminate\Http\Request;
use Image;
use File;
class confarenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = confarenceModel::orderBy("confarence_id", "desc")->paginate("20");
        return view("admin.confarence.confarence", compact("result"));
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
        $date = date("Y-m-d H:i:s", strtotime($request->confarence_date));
        if ($request->hasfile('image')) {

            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->extension();

            $destinationPath = public_path('/slider_image/confarence');
            $profile_image = Image::make($image->getRealPath());
            $profile_image->resize(700, 400, function ($constraint) {
                // $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);
            confarenceModel::create([
                "title" => $request->title,
                "image" => $image_name,
                "details" => $request->details,
                "confarence_date" => $date,
                "status" => $request->status,

            ]);
        } else {
            confarenceModel::create([
                "title" => $request->title,
                "details" => $request->details,
                "confarence_date" => $date,
                "status" => $request->status,

            ]);
        }
        return redirect()->back()->with("success", "conference saved!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\confarenceModel  $confarenceModel
     * @return \Illuminate\Http\Response
     */
    public function show(confarenceModel $confarenceModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\confarenceModel  $confarenceModel
     * @return \Illuminate\Http\Response
     */
    public function edit(confarenceModel $confarenceModel,$id)
    {
        $result = confarenceModel::where("confarence_id", $id)->first();
        return view("admin.confarence.confarenceEdit", compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\confarenceModel  $confarenceModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, confarenceModel $confarenceModel,$id)
    {
        $date = date("Y-m-d H:i:s", strtotime($request->confarence_date));
        if ($request->hasfile('image')) {

            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->extension();

            $destinationPath = public_path('/slider_image/confarence');
            $profile_image = Image::make($image->getRealPath());
            $profile_image->resize(700, 400, function ($constraint) {
                // $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);
            confarenceModel::where("confarence_id", $id)->update([
                "title" => $request->title,
                "image" => $image_name,
                "details" => $request->details,
                "confarence_date" => $date,
                "status" => $request->status,

            ]);
        } else {
            confarenceModel::where("confarence_id", $id)->update([
                "title" => $request->title,
                "details" => $request->details,
                "confarence_date" => $date,
                "status" => $request->status,

            ]);
        }
        return redirect()->back()->with("success", "conference updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\confarenceModel  $confarenceModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(confarenceModel $confarenceModel,$id)
    {
        $info = confarenceModel::where("confarence_id", $id)->first();

        if ($info) {
            $image_path = "public/slider_image/confarence/" . $info->image;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        confarenceModel::where("confarence_id", $id)->delete();
        return redirect()->back()->with("delete", "conference deleted!");
    }

}
