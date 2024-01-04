<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class courselistModel extends Model
{
   protected $table= "tbl_courselist";
   protected $fillable=['name','details','image','course_date','status'];
   protected $primaryKey="list_id";

   public function getTraniner()
   {
      return $this->hasMany(coureseTraninerModel::class, "course_id","list_id");
   }
}
