<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class traningModel extends Model
{
    protected $table = "tbl_traning";
    protected $fillable = ["title", "image", "status", "details", "traning_date"];
    protected $primaryKey = "traning_id";
    public $timestamps = false;
}
