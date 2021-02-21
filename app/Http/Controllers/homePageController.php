<?php

namespace App\Http\Controllers;

use App\Models\room;
use App\Models\userroom;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\roomtype;
use DB;
class homePageController extends Controller
{


    
    //
    public function index ()
    {
        $alltyperooms = roomtype::orderBy('id' , 'ASC')->get();
        return view('homePageHotel.PagesHomePageHotel.index', compact('alltyperooms'));
    }
     public function about ()
    {
    	 return view ('homePageHotel.PagesHomePageHotel.about');
    }
     public function blog_single ()
    {
    	 return view ('homePageHotel.PagesHomePageHotel.blog_single');
    }
     public function blog ()
    {
    	 return view ('homePageHotel.PagesHomePageHotel.blog');
    }
     public function contact ()
    {
    	 return view ('homePageHotel.PagesHomePageHotel.contact');
    }
     public function restaurant ()
    {
    	 return view ('homePageHotel.PagesHomePageHotel.restaurant');
    }
     public function rooms_single ()
    {
    	 return view ('homePageHotel.PagesHomePageHotel.rooms_single');
    }
     public function rooms ()
    {
        $offset = 6;
        $allrooms = room::orderBy('id' , 'ASC')->get();

        $allrows = room::all();
        $countAllRows = $allrows->count();
        $alltyperooms = roomtype::orderBy('id' , 'ASC')->get();
        return view ('homePageHotel.PagesHomePageHotel.rooms', compact('allrooms','countAllRows','alltyperooms'));
    }
     public function signup ()
    {
    	 return view ('homePageHotel.PagesHomePageHotel.signup');
    }

    public function showmore ( $skip = 0)
    {

        $all_rooms =  room::orderBy('id' , 'ASC')->skip($skip)->take(6)->get();
        $roomData['data'] = $all_rooms;
        echo json_encode($roomData);
        exit;


    }



    public function SearchAvailableRooms(Request $request)
    {

        try {
            DB::beginTransaction();

        if ($request->roomtype == 0 && $request->adult == 0 ) {

            $allrooms = room::all();
        } else if ($request->roomtype != 0 && $request->adult != 0 ) {

            $allrooms = room::where([
                ['roomtype_id', '=', $request->roomtype],
                ['MaximumPerson', '=', $request->adult],
                ['state_id', '=', 1],
                ['state_clean_id', '=', 5],
            ])->get();


        } else if ($request->roomtype != 0 && $request->adult == 0) {
            $allrooms = room::where([
                ['roomtype_id', '=', $request->roomtype],
                ['state_id', '=', 1],
                ['state_clean_id', '=', 5],
            ])->get();
        } else if ($request->roomtype == 0 && $request->adult != 0) {
            $allrooms = room::where([
                ['MaximumPerson', '=', $request->adult],
                ['state_id', '=', 1],
                ['state_clean_id', '=', 5],
            ])->get();
        }

            $allrows = room::all();
            $countAllRows = $allrows->count();
            $alltyperooms = roomtype::orderBy('id' , 'ASC')->get();

            return view ('homePageHotel.PagesHomePageHotel.rooms', compact('allrooms','countAllRows','alltyperooms'));

            DB::commit();

        } catch (Exception $ex) {
            DB::rollback();
             return Response()->json(["result" => false, "error" => 'Error Occurs']);
}
    }



    public function check_availability_room($room_id = 0)
    {
        try {
            DB::beginTransaction();

            $check = userroom::where('room_id', $room_id)->orderBy('id', 'DESC')->first();


            if($check == null)
            {
                return Response()->json(["Available3" => true, "successAvailable3_en" => ' Available', "successAvailable3_ar" => ' هذه الغرفه متاحة']);
            }else{



                    $val = \Carbon\Carbon::now();
                    $today = $val->format('Y-m-d');
                    $checkinDate = \Carbon\Carbon::createFromFormat('Y-m-d', $check->checkindate);
                    $checkoutDate = \Carbon\Carbon::createFromFormat('Y-m-d', $check->checkoutdate);

                    $difference = $checkoutDate->diff($today) ;
                    $difference_day = $difference->days;

                    if($checkinDate<$today && $checkoutDate>$today){
                        if($difference_day==0){
                            return Response()->json(["Available1" => true, "successAvailable1_en" => ' Available', "successAvailable1_ar" => ' هذه الغرفه متاحة']);
                        }else {
                            return Response()->json(["data" => $difference_day, "notAvailable1" => true, "successNotAvailable1" => 'Not Available Today And Available After ']);
                        }
                    }elseif($checkinDate<$today && $checkoutDate=$today){
                        return Response()->json(["Available1" => true, "successAvailable1_en" => ' Available', "successAvailable1_ar" => ' هذه الغرفه متاحة']);
                    } if($checkinDate>$today && $checkoutDate>$today){
                        return Response()->json(["data"=>$difference_day,"notAvailable2" => true, "successNotAvailable2" => 'Not Available Today And Available After']);
                    }elseif($checkinDate<$today && $checkoutDate<$today){
                        return Response()->json(["Available2" => true, "successAvailable2_en" => ' Available', "successAvailable2_ar" => ' هذه الغرفه متاحة']);
                    }

                }


            DB::commit();

        } catch (Exception $ex) {
            DB::rollback();
            return Response()->json(["result" => false, "error" => 'Error Occurs']);
        }

    }


}
