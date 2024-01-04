<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class seminarModel extends Model
{
    protected $table = "tbl_seminar";
    protected $fillable = ["title", "image", "status", "details", "seminar_date"];
    protected $primaryKey = "seminar_id";
    public $timestamps = false;
}
