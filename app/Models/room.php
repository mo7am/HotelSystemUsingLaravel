<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class room extends Model
{
    use HasFactory , Translatable;

    protected $with = ['translations'];

    protected $hidden = [
        'pivot',
    ];

    public $table = "rooms";


    protected $fillable = ['roomtype_id' , 'state_id' , 'state_clean_id' , 'price' , 'MaximumPerson' , 'RoomSize' , 'BedNumber','is_active' , 'image'];





    public $translatedAttributes = ['price_per' , 'RoomView'];

    protected $casts = [
        'is_active' =>'boolean',
    ];



    public function getactive(){

        if(app()->getLocale() == 'ar'){
            return $this -> is_active == 1 ? 'مفعل' : 'غير مفعل';
        }
        else if(app()->getLocale() == 'en'){
            return $this -> is_active == 1 ? 'active' : 'Not Active';
        }

    }

    public function getStatus(){

        if(app()->getLocale() == 'ar'){
            return $this -> state_id == 1 ? 'فارغة' : 'ممتلئة';
        }
        else if(app()->getLocale() == 'en'){
            return $this -> state_id == 1 ? 'Empty' : 'Full';
        }

    }

    public function getStatusClean(){

        if(app()->getLocale() == 'ar'){
            return $this -> state_clean_id == 5 ? 'نظيفة' : 'غير نظيفة';
        }
        else if(app()->getLocale() == 'en'){
            return $this -> state_clean_id == 5 ? 'Clean' : 'Dirty';
        }

    }

    public function getRoomType(){

        if(app()->getLocale() == 'ar'){

            $type_ar = "";
            if( $this -> roomtype_id == 1 ){
                $type_ar = "غرفة كلاسيكية";
            }elseif ($this -> roomtype_id == 2){
                $type_ar = "غرفة فاخرة";
            }elseif ($this -> roomtype_id == 3){
                $type_ar = "غرفه ديلوكس";
            }elseif ($this -> roomtype_id == 4){
                $type_ar = "غرفه متميوة";
            }elseif ($this -> roomtype_id == 5){
                $type_ar = "جناح";
            }elseif ($this -> roomtype_id == 6){
                $type_ar = "غرفة عائليه";
            }
            return  $type_ar;
        }
        else if(app()->getLocale() == 'en'){
            $type_en = "";
            if( $this -> roomtype_id == 1 ){
                $type_en = "Classic Room";
            }elseif ($this -> roomtype_id == 2){
                $type_en = "Luxury Room ";
            }elseif ($this -> roomtype_id == 3){
                $type_en = "Deluxe Room ";
            }elseif ($this -> roomtype_id == 4){
                $type_en = " Superior Room";
            }elseif ($this -> roomtype_id == 5){
                $type_en = "Suite";
            }elseif ($this -> roomtype_id == 6){
                $type_en = " Family Room";
            }
            return  $type_en;
        }



    }

    public function users(){
        return $this->belongsToMany('App\Models\User' , 'userrooms' , 'room_id' , 'user_id' , 'id' ,'id');
    }


}
