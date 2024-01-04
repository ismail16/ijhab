<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class editorModel extends Model
{
    protected $table = "tbl_editor";
    protected $fillable = ["name", "image", "details", "status"];
    protected $priartyKey = "editor_id ";
}
