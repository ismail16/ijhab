<?php

namespace App\Http\Controllers;

use App\ArchiveModel;
use App\consultansModel;
use App\directorModel;
use App\editorModel;
use App\reviewerModel;
use App\TrainerModel;
use App\workshopModel;
use App\seminarModel;
use App\confarenceModel;
use App\traningModel;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function front()
    {
        $result = ArchiveModel::groupBy("year")->where("status", "publish")->get();
        return view("Front.Inc.main_content", compact("result"));
    }

    public function trainer()
    {
        $result = TrainerModel::orderBy("trainer_id", "asc")->where("status", "publish")->get();
        return view("Front.traier", compact('result'));
    }
    public function boardOfDirectors()
    {
        $result = directorModel::orderBy("director_id", "asc")->where("status", "publish")->get();

        return view("Front.director", compact('result'));
    }
    public function boardOfEditors()
    {
        $result = editorModel::orderBy("editor_id", "asc")->where("status", "publish")->get();

        return view("Front.editor", compact('result'));
    }
    public function reviewers()
    {
        $result = reviewerModel::orderBy("reviewer_id", "asc")->where("status", "publish")->get();

        return view("Front.reviewers", compact('result'));
    }

    public function consltants()
    {
        $result = consultansModel::orderBy("id", "asc")->where("status", "publish")->get();

        return view("Front.consltants", compact('result'));
    }

    public function publication_place()
    {
        return view("Front.publication_place");
    }


    public function workshops()
    {
        $result = workshopModel::orderBy("workshop_id", "asc")->where("status", "publish")->get();
        return view("Front.workshops", compact('result'));
    }
    public function workshopDetails($id)
    {
        $result = workshopModel::where("workshop_id", $id)->first();
        return view("Front.workshop-on", compact('result'));
    }
    public function seminars()
    {
        $result = seminarModel::orderBy("seminar_id", "asc")->where("status", "publish")->get();
        return view("Front.seminars", compact('result'));
    }
    public function seminarsDetails($id)
    {
        $result = seminarModel::where("seminar_id", $id)->first();
        return view("Front.seminars-on", compact('result'));
    }
    public function confarences()
    {
        $result = confarenceModel::orderBy("confarence_id", "asc")->where("status", "publish")->get();
        return view("Front.confarences", compact('result'));
    }
    public function confarencesDetails($id)
    {
        $result = confarenceModel::where("confarence_id", $id)->first();
        return view("Front.confarences-on", compact('result'));
    }
    public function trainings()
    {
        $result = traningModel::orderBy("traning_id", "asc")->where("status", "publish")->get();
        return view("Front.trainings", compact('result'));
    }
    public function trainingsDetails($id)
    {
        $result = traningModel::where("traning_id", $id)->first();
        return view("Front.trainings-on", compact('result'));
    }
    public function contacts()
    {
        return view("Front.contacts");
    }
    public function aboutus()
    {
        return view("Front.aboutus");
    }
    public function callforpapers()
    {
        return view("Front.callforpapers");
    }
    public function submissionglines()
    {
        return view("Front.submissionglines");
    }
    public function submissionsteps()
    {
        return view("Front.submissionsteps");
    }
    public function template()
    {
        return view("Front.template");
    }
    public function payment()
    {
        return view("Front.payment");
    }


    public function year_by_show($id)
    {
        $result = ArchiveModel::where("year", $id)->get();

        return view("Front.year_by_show", compact('result'));
    }
    public function year_by_show_details($id)
    {
        $result = ArchiveModel::where("id", $id)->first();

        return view("Front.year_by_show_details", compact('result'));
    }
}
