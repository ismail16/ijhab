<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reviewerModel extends Model
{
    protected $table = "tbl_reviewer";
    protected $fillable = ["name", "image", "status", "details"];
    protected $primaryKey = "reviewer_id";
}
