<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class consultansModel extends Model
{
   protected $table= "tbl_conslatans";
   protected $fillable=['name','info','image','status'];

}
