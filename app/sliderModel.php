<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sliderModel extends Model
{
    protected $table = "tbl_slider";
    protected $fillable = ["name", "image", "title", "subtitle", "status"];
    protected $primaryKey = "slider_id";

    public static function getSliders(Type $var = null)
    {
       return sliderModel::orderBy("slider_id","desc")->where("status","publish")->get();
    }
}
