<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class confarenceModel extends Model
{
    protected $table = "tbl_confarence";
    protected $fillable = ["title", "image", "status", "details", "confarence_date"];
    protected $primaryKey = "confarence_id";
    public $timestamps = false;
}
