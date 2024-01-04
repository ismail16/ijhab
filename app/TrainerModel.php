<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainerModel extends Model
{
    protected $table = "tbl_trainer";
    protected $fillable=["name","image", "details","status"];
    protected $priartyKey = "trainer_id";
}
