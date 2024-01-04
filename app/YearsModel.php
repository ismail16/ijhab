<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YearsModel extends Model
{
    protected $table="tbl_years";
    protected $fillable=["years_name","status"];
}
