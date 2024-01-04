<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchiveModel extends Model
{
    protected $table='tbl_archive';
    protected $fillable=['title','author','abstract','keyword','research_area','country','upload_files','status','month','year'];

    public function getMonth()
    {
        return $this->belongsTo(MonthModel::class,'month');
    }
    public function getYear()
    {
        return $this->belongsTo(YearsModel::class,'year');
    }
    public function getPhoto()
    {
        return $this->hasMany(PhotoModel::class,'archive_id','id');

    }
    public function getMonths()
    {
        return $this->hasMany(MonthModel::class,'month');
    }
    public static function getYears($year)
    {
        return ArchiveModel::groupBy('month')->where('year',$year)->get();
    }
    public static function countYearData($year)
    {
        return ArchiveModel::where('year',$year)->count();
    }
    public static function countYearMonth($year,$month)
    {
        return ArchiveModel::where('year',$year)->where('month',$month)->count();
    }
}
