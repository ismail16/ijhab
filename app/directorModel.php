<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class directorModel extends Model
{
    protected $table="tbl_director";
    protected $fillable=["name","image","status","degignation"];
    protected $primaryKey="director_id";
}
