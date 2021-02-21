<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roomTranslation extends Model
{
    protected $fillable = ['room_id','locale','price_per','RoomView'];

    public $table = "room_translations";
}
