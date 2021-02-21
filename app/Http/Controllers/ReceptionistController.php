<?php

namespace App\Http\Controllers;
use App\Models\model_has_permission;
use App\Models\model_has_role;
use App\Models\room;
use App\Models\roomtype;
use App\Models\User;
use App\Models\userroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use DB;
use function PHPUnit\Framework\returnArgument;
use Validator;
use Response;

class ReceptionistController extends Controller
{
    public function availableRooms()
    {
        $rooms = room::all();
        $alltyperooms = roomtype::orderBy('id', 'ASC')->get();
        return view('AnyUsersAdvancedPages.Pages.Receptionist.Rooms', compact('rooms', 'alltyperooms'));
    }


    public function SearchRooms($roomtype = 0, $adult = 0)
    {
        if ($roomtype == 0 && $adult == 0) {

            $rooms = room::all();
        } else if ($roomtype != 0 && $adult != 0) {

            $rooms = room::where([
                ['roomtype_id', '=', $roomtype],
                ['MaximumPerson', '=', $adult],
                ['state_id', '=', 1],
                ['state_clean_id', '=', 5],
            ])->get();
        } else if ($roomtype != 0 && $adult == 0) {
            $rooms = room::where([
                ['roomtype_id', '=', $roomtype],
                ['state_id', '=', 1],
                ['state_clean_id', '=', 5],
            ])->get();
        } else if ($roomtype == 0 && $adult != 0) {
            $rooms = room::where([
                ['MaximumPerson', '=', $adult],
                ['state_id', '=', 1],
                ['state_clean_id', '=', 5],
            ])->get();
        }
        // Fetch all records
        $roomData['data'] = $rooms;

        echo json_encode($roomData);
        exit;
    }

    public function book_now_for_receptionist(Request $request)
    {
        try {

            if ($request->room_id == null) {
                return Response()->json(["resultforroom" => true, "success2" => "Select Room Please "]);
            } else {

                DB::beginTransaction();

                $remember = request()->has('remember') ? true : false;
                $user = User::create([
                    'fname' => $request->fname,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'type_id' => $request->type,
                    'image' => 'img-1.jpg',
                    'remember_token' => $remember,
                ]);

                if ($request->type == 6) {
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
                } elseif ($request->type == 7) {
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

                $checkindate = date('Y-m-d', strtotime($request->checkindate));
                $checkoutdate = date('Y-m-d', strtotime($request->checkoutdate));
                userroom::create([
                    'room_id' => $request->room_id,
                    'user_id' => $user->id,
                    'phone' => $request->phone,
                    'checkindate' => $checkindate,
                    'checkoutdate' => $checkoutdate,
                ]);

                return Response()->json(["result" => true, "success" => "Booked Successfully "]);
                DB::commit();
            }
        } catch (Exception $ex) {
            DB::rollback();
            return Response()->json(["result" => false, "error" => 'Error Occurs']);
        }

    }



    public function book_now_for_exist(Request $request)
    {
        try {

            if ($request->room_id_for_exist == null) {
                return Response()->json(["resultforroom" => true, "success2_en" => "Select Room Please ","success2_ar" => "من فضلك اختر الغرفة "]);
            } else {

                DB::beginTransaction();

                $checkindate = date('Y-m-d', strtotime($request->checkindate));
                $checkoutdate = date('Y-m-d', strtotime($request->checkoutdate));
                userroom::create([
                    'room_id' => $request->room_id_for_exist,
                    'user_id' => $request->user_id_for_exist,
                    'phone' => $request->phone,
                    'checkindate' => $checkindate,
                    'checkoutdate' => $checkoutdate,
                ]);

                return Response()->json(["result" => true, "success_en" => "Booked Successfully ","success_ar" => "الحجز تم بنجاح "]);
                DB::commit();
            }
        } catch (Exception $ex) {
            DB::rollback();
            return Response()->json(["result" => false, "error" => 'Error Occurs']);
        }

    }



    /* public function SearchGuest($key = 0 , $searchingValue = "")
     {
         try{
             DB::beginTransaction();



             if($key == 1)//Searching with phone
             {
                 $userPhone = userroom::where('phone',$searchingValue)->get();
                 //return $userPhone;
                 if($userPhone == null)
                 {

                     return Response()->json(["result_phone" => true,  "message_phone" => 'There is no phone here like this']);
                 }else{
                     foreach ($userPhone as $val) {
                         $allguest = User::where([['id', '=', $val->user_id]])->orderBy('id', 'ASC')->get();
                     }
                 }

             }elseif ($key == 2)//Searching with email
             {
                 $allguest = User::where([['email' ,'=' ,$searchingValue]])->orderBy('id' , 'ASC')->get();
                 if($allguest == null)
                 {
                     return Response()->json(["result_email" => true,  "message_email" => 'There is no email here like this']);
                 }
             }elseif ($key == 3)//Searching with id
             {
                 $allguest = User::where([['id' ,'=' ,$searchingValue]])->orderBy('id' , 'ASC')->get();
                 if($allguest == null)
                 {
                     return Response()->json(["result_id" => true,  "message_id" => 'There is no id here like this']);
                 }
             }

                 // Fetch all records
                 $guestData['data'] = $allguest;
             $guestData['data2'] = ['name'=>'ali'];
                 echo json_encode($guestData);
             exit;
             DB:commit();

         }catch(Exception $ex){
             DB::rollback();
             return Response()->json(["result" => false,  "error" => 'Error Occurs']);
         }
     }*/


    public function SearchGuest($key = 0, $searchingValue = "")
    {
        try {
            DB::beginTransaction();


            if ($key == 1)//Searching with phone
            {
                $userPhone = userroom::where('phone', $searchingValue)->get();
                //return $userPhone;
                if ($userPhone == null) {

                    return Response()->json(["result_phone" => true, "message_phone" => 'There is no phone here like this']);
                } else {
                    foreach ($userPhone as $val) {
                        $allguest = User::where([
                            ['id', '=', $val->user_id],
                            ['type_id', '!=', 1],
                            ['type_id', '!=', 2],
                            ['type_id', '!=', 3],
                            ['type_id', '!=', 4],
                            ['type_id', '!=', 5],


                        ])->orderBy('id', 'ASC')->get();

                        $allguest1 = User::where('id', $val->user_id)->first();
                        $room = $allguest1->rooms;
                        $phone = $userPhone;
                    }
                }

            } elseif ($key == 2)//Searching with email
            {
                $allguest = User::where([
                    ['email', '=', $searchingValue],
                    ['type_id', '!=', 1],
                    ['type_id', '!=', 2],
                    ['type_id', '!=', 3],
                    ['type_id', '!=', 4],
                    ['type_id', '!=', 5],

                ])->orderBy('id', 'ASC')->get();

                $allguest1 = User::where([['email', '=', $searchingValue]])->first();
                $room = $allguest1->rooms;
                $userPhone = userroom::where('user_id', $allguest1->id)->get();
                $phone = $userPhone;


                if ($allguest == null) {
                    return Response()->json(["result_email" => true, "message_email" => 'There is no email here like this']);
                }
            } elseif ($key == 3)//Searching with id
            {
                $allguest = User::where([
                    ['id', '=', $searchingValue],
                    ['type_id', '!=', 1],
                    ['type_id', '!=', 2],
                    ['type_id', '!=', 3],
                    ['type_id', '!=', 4],
                    ['type_id', '!=', 5],

                ])->orderBy('id', 'ASC')->get();
                //$allguest = User::with('rooms')->where('id' ,'=' ,$searchingValue)->get();
                $allguest1 = User::where('id', $searchingValue)->first();

                $room = $allguest1->rooms;

                $userPhone = userroom::where('user_id', $allguest1->id)->get();
                $phone = $userPhone;

                if ($allguest == null) {
                    return Response()->json(["result_id" => true, "message_id" => 'There is no id here like this']);
                }
            }

            // Fetch all records
            $guestData['data'] = $allguest;
            $guestData['data_room'] = $room;
            $guestData['user_phone'] = $phone;
            echo json_encode($guestData);
            exit;
            DB::commit();

        } catch (Exception $ex) {
            DB::rollback();
            return Response()->json(["result" => false, "error" => 'Error Occurs']);
        }
    }


    public function checkavailability($room_id = 0)
    {
        try {
            DB::beginTransaction();

            $check = userroom::where('room_id', $room_id)->orderBy('id', 'DESC')->get();


            if($check == null)
            {
                return Response()->json(["noroom" => true, "success" => 'No Room For This Id']);
            }else{
                foreach ($check as $c) {

                   // return $c->checkindate;

                    $val = \Carbon\Carbon::now();
                    $today = $val->format('Y-m-d');
                    $checkinDate = \Carbon\Carbon::createFromFormat('Y-m-d', $c->checkindate);
                    $checkoutDate = \Carbon\Carbon::createFromFormat('Y-m-d', $c->checkoutdate);

                    $difference = $checkoutDate->diff($today) ;
                    $difference_day = $difference->days;

                    if($checkinDate<$today && $checkoutDate>$today){
                       if($difference_day==0){
                           return Response()->json(["Available1" => true, "successAvailable1" => ' Available']);
                       }else {
                           return Response()->json(["data" => $difference_day, "notAvailable1" => true, "successNotAvailable1" => 'Not Available Today And Available After ']);
                       }
                    }elseif($checkinDate<$today && $checkoutDate=$today){
                        return Response()->json(["Available1" => true, "successAvailable1" => ' Available']);
                    } if($checkinDate>$today && $checkoutDate>$today){
                        return Response()->json(["data"=>$difference_day,"notAvailable2" => true, "successNotAvailable2" => 'Not Available Today And Available After']);
                    }elseif($checkinDate<$today && $checkoutDate<$today){
                        return Response()->json(["Available2" => true, "successAvailable2" => ' Available']);
                    }

                   /* $event =  userroom::orderBy('id', 'DESC')
                        ->where('room_id', $room_id)
                        ->whereDate('checkindate','<' ,$today)
                        ->whereDate('checkoutdate','<=' ,$today)
                        ->get();
                    foreach ($check as $cc) {
                        if($cc!=null) {
                            return 'Not Available';
                        }else{
                            return 'Available';
                        }
                    }*/

                   /* $checkindate = \Carbon\Carbon::createFromFormat('Y-m-d', $c->checkindate);
                    $checkoutdate = \Carbon\Carbon::createFromFormat('Y-m-d', $c->checkoutdate);

                    $difference_DB = $checkindate->diff($checkoutdate);

                    $date = \Carbon\Carbon::now()->toDateTimeString();
                    $carbon_date = \Carbon\Carbon::parse($date);

                    $difference_PC = $checkindate->diff($carbon_date) ;

                    $difference_PC_day = $difference_PC->days+1;
                    $difference_PC_month = $difference_PC->m;
                    $difference_PC_year = $difference_PC->y;
                    $difference_DB_day = $difference_DB->days+1;
                    $difference_DB_month = $difference_DB->m;
                    $difference_DB_year = $difference_DB->y;

                    $calc = $difference_DB_day-$difference_PC_day;

                    if($difference_DB_day == $difference_PC_day ) {
                        return "Available";
                    }elseif ($difference_DB_day < $difference_PC_day)
                    {
                        return "Available";
                    }elseif ($difference_DB_day > $difference_PC_day)
                    {
                        return "end after " .$calc." days";
                    }*/

                }
            }

            DB::commit();

        } catch (Exception $ex) {
            DB::rollback();
            return Response()->json(["result" => false, "error" => 'Error Occurs']);
        }

    }

}
