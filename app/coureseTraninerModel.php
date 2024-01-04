<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coureseTraninerModel extends Model
{
    protected $table= "tbl_course_trainer";
    protected $fillable=["course_id", "traniner_id"];
    protected $primaryKey= "c_t_id";

    public function getTraninerName()
    {
        return $this->belongsTo(TrainerModel::class, "traniner_id", "trainer_id");
    }
}
