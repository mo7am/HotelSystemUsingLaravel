<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userroom extends Model
{
    use HasFactory;

    protected $table = "userrooms";

    protected $fillable = [
        'room_id',
        'user_id',
        'phone',
        'checkindate',
        'checkoutdate',
    ];
}
