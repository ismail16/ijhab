<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class workshopModel extends Model
{
    protected $table = "tbl_workshop";
    protected $fillable = ["title", "image", "status", "details","event_date"];
    protected $primaryKey = "workshop_id";
    public $timestamps=false;
}
