<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthModel extends Model
{
    protected $table='tbl_month';
    protected $fillable=['month_name','status'];
}
