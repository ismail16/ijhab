<?php

namespace App\Http\Controllers;

use App\reviewerModel;
use Illuminate\Http\Request;
use Image;
use File;
class reviewerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = reviewerModel::orderBy("reviewer_id", "desc")->paginate("20");
        return view("admin.reviewer.reviewer", compact("result"));
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

            $destinationPath = public_path('/slider_image/reviewer');
            $profile_image = Image::make($image->getRealPath());
            $profile_image->resize(150, 150, function ($constraint) {
                // $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);
            reviewerModel::create([
                "name" => $request->name,
                "image" => $image_name,
                "details" => $request->details,
                "status" => $request->status,

            ]);
        } else {
            reviewerModel::create([
                "name" => $request->name,
                "details" => $request->details,
                "status" => $request->status,

            ]);
        }
        return redirect()->back()->with("success", "Reviewer saved!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\reviewerModel  $reviewerModel
     * @return \Illuminate\Http\Response
     */
    public function show(reviewerModel $reviewerModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\reviewerModel  $reviewerModel
     * @return \Illuminate\Http\Response
     */
    public function edit(reviewerModel $reviewerModel,$id)
    {
        $result = reviewerModel::where("reviewer_id", $id)->first();
        return view("admin.reviewer.reviewerEdit", compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\reviewerModel  $reviewerModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reviewerModel $reviewerModel,$id)
    {
        if ($request->hasfile('image')) {
            $info = reviewerModel::where("reviewer_id", $id)->first();

            if ($info) {
                $image_path = "public/slider_image/reviewer/" . $info->image;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $image = $request->file('image');
            $image_name = uniqid() . '.' . $image->extension();

            $destinationPath = public_path('/slider_image/reviewer');
            $profile_image = Image::make($image->getRealPath());
            $profile_image->resize(210, 250, function ($constraint) {
                // $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);
            reviewerModel::where("reviewer_id", $id)->update([
                "name" => $request->name,
                "image" => $image_name,
                "details" => $request->details,
                "status" => $request->status,

            ]);
        } else {
            reviewerModel::where("reviewer_id", $id)->update([
                "name" => $request->name,
                "details" => $request->details,
                "status" => $request->status,

            ]);
        }
        return redirect()->back()->with("success", "Reviewer updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\reviewerModel  $reviewerModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(reviewerModel $reviewerModel,$id)
    {
        $info = reviewerModel::where("reviewer_id", $id)->first();

        if ($info) {
            $image_path = "public/slider_image/reviewer/" . $info->image;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        reviewerModel::where("reviewer_id",$id)->delete();
        return redirect()->back()->with("success", "Reviewer delete!");

    }
}
