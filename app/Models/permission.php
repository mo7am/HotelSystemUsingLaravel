<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class permission extends Model
{
    use HasFactory , HasRoles;

    protected $table = "permissions";

    protected $fillable = [
        'name',
        'guard_name',


    ];
}
