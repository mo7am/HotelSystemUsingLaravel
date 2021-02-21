<?php

namespace App\Http\Controllers;
use App\Http\Requests\RoomTypeRequest;
use App\Models\model_has_permission;
use App\Models\model_has_role;
use App\Models\roomtype;
use App\Models\roomTypeTranslation;
use App\Models\roomTranslation;

use App\Models\userroom;
use App\Providers\RouteServiceProvider;
use App\Traits\userTraits;
use Illuminate\Http\Request;
use App\Models\room;
use DB;
use App\Models\staff;
use App\Models\Specialist;
use App\Models\Mobile;
use App\Models\User;
use function PHPUnit\Framework\returnArgument;
use Validator;
use Response;

use Illuminate\Support\Facades\Hash;

class GuistController extends Controller
{

    public function book(Request $request)
    {

        try{


            DB::beginTransaction();

            $remember = request()->has('remember')?true:false;
        $user =  User::create([
            'fname' =>$request->fname,
            'email' => $request->email,
            'password' =>Hash::make($request->password),
            'type_id' => $request->type ,
            'image' => 'img-1.jpg',
            'remember_token' => $remember,
        ]);

        if ($request->type == 6){
            model_has_role::create([
                'role_id' => 6,
                'model_type' => "App\Models\User",
                'model_id' => $user->id,
            ]);

            model_has_permission::create([
                'permission_id' => 6,
                'model_type' => "App\Models\User",
                'model_id' => $user->id,
            ]);
        }
        elseif ($request->type == 7){
            model_has_role::create([
                'role_id' => 7,
                'model_type' => "App\Models\User",
                'model_id' => $user->id,
            ]);

            model_has_permission::create([
                'permission_id' => 7,
                'model_type' => "App\Models\User",
                'model_id' => $user->id,
            ]);
        }

            $checkindate = date('Y-m-d',strtotime($request->checkindate));
            $checkoutdate = date('Y-m-d',strtotime($request->checkoutdate));
        userroom::create([
            'room_id' => $request->room_id,
            'user_id' => $user->id,
            'phone' => $request->phone,
            'checkindate' => $checkindate,
            'checkoutdate' =>$checkoutdate,
        ]);

            return redirect()->route('Signup')->with(['success' => 'Successfully']);

            DB:commit();
        }catch(Exception $ex){
            DB::rollback();
            return redirect()->route('indexhome')->with(['error' => 'Error Occurs']);
        }

    }
}
