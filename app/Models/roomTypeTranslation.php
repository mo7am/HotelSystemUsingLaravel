<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roomTypeTranslation extends Model
{


    protected $fillable = ['roomtype_id','locale','type'];

    public $table = "roomtype_translations";
}
