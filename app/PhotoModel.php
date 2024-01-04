<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoModel extends Model
{
    protected $table='tbl_photo';
    protected $fillable=['photo','archive_id'];
}
