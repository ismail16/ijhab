<?php

namespace App\Http\Controllers;

use App\ArchiveModel;
use App\MonthModel;
use App\PhotoModel;
use App\YearsModel;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function archive_view()
    {
        $month = MonthModel::where('status','publish')->get();
        $year = YearsModel::where('status','publish')->get();
        return view('admin.month.archive',compact('month', 'year'));
    }

    public function save_archive(Request $request)
    {
        $request->validate([
            'upload_files' => 'required|mimes:pdf,xlx,csv|max:20000048',
            'photo' => 'required',
            'photo.*' => 'mimes:jpg,png,jpeg|max:20000048',
        ]);
        $archive = new ArchiveModel();

        $archive->title=$request->title;
        $archive->author=$request->author;
        $archive->abstract=$request->abstract;
        $archive->keyword=$request->keyword;
        $archive->research_area=$request->research_area;
        $archive->country=$request->country;
        $archive->status=$request->status;
        $archive->month=$request->month;
        $archive->year=$request->year;
        $archive->save();

        $archive_id = $archive->id;

        $fileName = uniqid().'.'.$request->upload_files->extension();
        $request->upload_files->move(public_path('uploads'), $fileName);

        ArchiveModel::where('id',$archive_id)->update(['upload_files'=>$fileName]);
        if($request->hasfile('photo'))
        {
            foreach($request->file('photo') as $file)
            {
                $name = uniqid().'.'.$file->extension();
                $file->move(public_path().'/files/', $name);
                PhotoModel::create(['photo'=>$name,'archive_id'=>$archive_id]);
            }
        }

        return redirect()->back()->with('success','data saved!!');

    }
    public function archive_list()
    {
        $month = MonthModel::where('status','publish')->get();
        $year = YearsModel::where('status','publish')->get();
        $result = ArchiveModel::with('getMonth','getYear','getPhoto')->paginate(15);
        return view('admin.month.archive_list',compact('month', 'year','result'));
    }


    public function download($id)
    {
        $file = ArchiveModel::where('id',$id)->first();
        $myFile = public_path("uploads/".$file->upload_files);
    	$headers = ['Content-Type: application/pdf'];
    	$newName = 'file-'.time().'.pdf';


    	return response()->download($myFile, $newName, $headers);
    }

    public function archive_edit($id)
    {
        $month = MonthModel::where('status','publish')->get();
        $year = YearsModel::where('status','publish')->get();
        $result = ArchiveModel::where('id',$id)->first();
        return view('admin.month.archive_edit',compact('month', 'year','result'));
    }

    public function update_archive(Request $request)
    {
        $id = $request->id;
        ArchiveModel::where('id',$id)->update([
'title' =>$request->title,
'author' =>$request->author,
'abstract' =>$request->abstract,
'keyword' =>$request->keyword,
'research_area' =>$request->research_area,
'country' =>$request->country,
'status' =>$request->status,
'month' =>$request->month,
'year' =>$request->year,
        ]);
if($request->hasfile('upload_files')){

    $fileName = uniqid().'.'.$request->upload_files->extension();
    $request->upload_files->move(public_path('uploads'), $fileName);

    ArchiveModel::where('id',$id)->update(['upload_files'=>$fileName]);
}
        if($request->hasfile('photo'))
        {
            foreach($request->file('photo') as $file)
            {
                $name = uniqid().'.'.$file->extension();
                $file->move(public_path().'/files/', $name);
                PhotoModel::create(['photo'=>$name,'archive_id'=>$id]);
            }
        }
return redirect('archive_list')->with('success','data updated!!');

    }
}
