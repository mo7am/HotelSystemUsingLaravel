<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomTypeRequest;
use App\Models\roomtype;
use App\Models\roomTypeTranslation;
use App\Models\roomTranslation;

use App\Providers\RouteServiceProvider;
use App\Traits\userTraits;
use Illuminate\Http\Request;
use App\Models\room;
use DB;
use App\Models\staff;
use App\Models\Specialist;
use App\Models\Mobile;
use App\Models\User;
use Hash;
use function PHPUnit\Framework\returnArgument;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class ManagerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function CrudForManager ()
    {
        //$rooms = room::where('state_id' , '=' , 1 );
        $allusers  = DB::table('hotelsystembylaravel.users')
            ->join('hotelsystembylaravel.staff' , 'users.id' ,'=' ,'staff.user_id')
            ->where([
                ['users.type_id' ,'!=' ,1],
            ])
            ->select('*')
            ->paginate(16)
        ;

        return view('AnyUsersAdvancedPages.Pages.crudStaff' , compact('allusers'))->with('i',(request()->input('page',1) -1) *16);

    }

    protected function saveImage($photo , $folder)
    {
        $file_extension = $photo->getClientMimeType();
        $file_name = time().'.'.$file_extension;
        $path = $folder;
        $photo->move( $path,$file_name);

        return $file_name;
    }




    public function insertNewUserByManager(Request $request)
    {


        //  $file_name =   $this->saveImage(request('ImageUpload') , 'images/users');


        /*$userData = User::create([
           'fname' => request('fname') ,
           'mname' => request('mname') ,
           'lname' => request('lname') ,
           'email' => request('email') ,
           'password' => bcrypt(request('password')) ,
           'type_id' => request('status') ,
           'balance' => 0,
           'stateBlock' => 8,
           'image' => 'img-1.jpg',

         ]);*/


        $testuser = new User;
        $testuser->fname =request('fname');
        $testuser->mname = request('mname');
        $testuser->lname = request('lname');
        $testuser->email = request('email');
        //$testuser->image = $file_name;
        $testuser->password =  bcrypt(request('password'));
        $testuser->balance = 0;
        $testuser->stateBlock = 8;
        $testuser->type_id = request('status');
        $testuser->image = 'img-1.jpg';
        $testuser->save();

        /* $userData = DB::table('hotelsystembylaravel.users') ->insertGetId([

         'fname' => request('fname') ,
          'mname' => request('mname') ,
          'lname' => request('lname') ,
          'email' => request('email') ,
          'password' => bcrypt(request('password')) ,
          'type_id' => request('status') ,
          'balance' => 0,
          'stateBlock' => 8,
          'image' => 'img-1.jpg',
     ]);*/


        /*$user =  User::create([
          'fname' => request('fname') ,
          'mname' => request('mname') ,
          'lname' => request('lname') ,
          'email' => request('email') ,
          'password' => bcrypt(request('password')) ,
          'type_id' => 2 ,
          'balance' => 0,
          'stateBlock' => 8,
          'image' => 'img-1.jpg',

        ]);*/



        $staff =  staff::create([
            'age' => request('age') ,
            'birthdate' => request('birthdate') ,

            'workhours' => request('workhours') ,
            'phone' => request('phone') ,
            'Address' => request('Address') ,
            'salary' => request('salary') ,
            'user_id' => $testuser->id,

        ]);


        $thisuser  = DB::table('hotelsystembylaravel.users')
            ->join('hotelsystembylaravel.staff' , 'users.id' ,'=' ,'staff.user_id')
            ->where('users.id' ,'=' ,$testuser->id )
            ->select('*');

        if($testuser &&  $staff ){

            return response()->json(['result'=> true,'msg'=>'Insertion New User Successfully','data1'=>$testuser , 'data2' => $staff]);
        }else{
            return response()->json(['result'=> false,'msg'=>'Insertion New User Faild']);
        }


    }


    public function editUserByManager(Request $request)
    {

        $testuser = new User();
        $thisuser  = DB::table('hotelsystembylaravel.users')
            ->join('hotelsystembylaravel.staff' , 'users.id' ,'=' ,'staff.user_id')
            ->where('users.id' ,'=' ,$request->editid )
            ->select('*');

        if(! $thisuser)
        {
            return response()->json(['result'=> false,'msg'=>'Edit User Faild']);
        }else{
            $thisuser->update([
                'fname' => $request->editfname,
                'mname' => $request->editmname,
                'lname' => $request->editlname,
                'email' => $request->editemail,
                'salary' => $request->editsalary,
                'age' => $request->editage,
                'birthdate' => $request->editbirthdate,
                'workhours' => $request->editworkhours,
                'phone' => $request->editphone,
                'Address' => $request->editAddress,
                'type_id' => $request->editstatus,

            ]);

            // $testuser->fname =  $thisuser->fname;



            $testuser->id = $request->editid;
            $testuser->fname = $request->editfname;
            $testuser->mname = $request->editmname;
            $testuser->lname = $request->editlname;
            $testuser->email = $request->editemail;
            $testuser->salary = $request->editsalary;
            $testuser->age = $request->editage;
            $testuser->birthdate = $request->editbirthdate;
            $testuser->workhours = $request->editworkhours;
            $testuser->phone = $request->editphone;
            $testuser->Address = $request->editAddress;
            $testuser->type_id = $request->editstatus;
            //$thisuser->save();
            return response()->json(['result'=> true,'msg'=>'Edit User Successfully','data'=>$testuser]);
        }

    }


    public function deleteUserByManager(Request $request)
    {

        $thisuser =DB::table('hotelsystembylaravel.users')
            ->leftJoin('hotelsystembylaravel.staff','users.id', '=','staff.user_id')
            ->where('users.id', $request->id);


        if(! $thisuser)
        {
            return response()->json(['result'=> false,'msg'=>'Insertion New User Faild']);
        }else{

            DB::table('hotelsystembylaravel.staff')->where('user_id', $request->id)->delete();
            $thisuser->delete();

            return response()->json(['result'=> true,'msg'=>'Delete User Successfully']);
        }

    }


    public function SearchUsers($id = 0)
    {
        if($id==0){

            $thisusers  = DB::table('hotelsystembylaravel.users')
                ->join('hotelsystembylaravel.staff' , 'users.id' ,'=' ,'staff.user_id')
                ->where('users.type_id' ,'!=' ,1 )
                ->select('*')
                ->get();
        }else{

            $thisusers  = DB::table('hotelsystembylaravel.users')
                ->join('hotelsystembylaravel.staff' , 'users.id' ,'=' ,'staff.user_id')
                ->where([
                    ['users.id' ,'=' ,$id ],
                    ['users.type_id' ,'!=' ,1],
                ])
                ->select('*')
                ->get();
        }
        // Fetch all records
        $userData['data'] = $thisusers;

        echo json_encode($userData);
        exit;
    }


    /**
     * @param string $stringValue
     */
    public function SearchUsersByLikeStatement($stringValue)
    {
        if(strlen($stringValue) == 0){

            $thisusers  = DB::table('hotelsystembylaravel.users')
                ->join('hotelsystembylaravel.staff' , 'users.id' ,'=' ,'staff.user_id')
                ->where('users.type_id' ,'!=' ,1 )
                ->select('*')
                ->get();
        }else{

            $thisusers  = DB::table('hotelsystembylaravel.users')
                ->join('hotelsystembylaravel.staff' , 'users.id' ,'=' ,'staff.user_id')
                ->where([
                    ['users.fname' ,'LIKE' ,'%'.$stringValue."%"],
                    ['users.mname' ,'LIKE' ,'%'.$stringValue."%"],
                    ['users.lname' ,'LIKE' ,'%'.$stringValue."%"],
                    ['users.email' ,'LIKE' ,'%'.$stringValue."%"],
                ])
                ->select('*')
                ->get();
        }
        // Fetch all records
        $userData['data'] = $thisusers;

        echo json_encode($userData);
        exit;
    }

public function blankPage()
{
    return view('AnyUsersAdvancedPages.Pages.blankpage');
}



//////////////////////////////////////Room Types//////////////////////////////////////



    public function index()
    {
        $alltyperooms = roomtype::orderBy('id' , 'ASC')->paginate(5);

        $valueactive = "active";
        $valueactive2 = "";
            return view('AnyUsersAdvancedPages.Pages.crudRoomType', compact('alltyperooms','valueactive2' , 'valueactive'));

    }


    public function store(Request $request){

        try{


            DB::beginTransaction();

            if(!$request->has('is_active'))
                $request->request->add(['is_active'=>'0']);
            else
                $request->request->add(['is_active'=>'1']);


            $rules = $this->getRules();
            $message = $this->getMessages();
            $validator =  Validator::make($request->all(), $rules ,$message );

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }




           if(app()->getLocale() == 'ar'){
              if($request->type == "غرفة كلاسيكية")
              {
                  $roomtype = roomtype::create($request->except('_token'));
                  $roomtype->type = $request->type;
                  $roomtype->save();
                  $id = $roomtype->id;
                     roomTypeTranslation::create([
                      'roomtype_id' => $id ,
                      'locale' => 'en' ,
                      'type' =>'Classic Room' ,
                  ]);
              }elseif ($request->type == "غرفة فاخرة")
              {
                  $roomtype = roomtype::create($request->except('_token'));
                  $roomtype->type = $request->type;
                  $roomtype->save();
                  $id = $roomtype->id;
                  roomTypeTranslation::create([
                      'roomtype_id' => $id ,
                      'locale' => 'en' ,
                      'type' =>'Luxury Room' ,
                  ]);
              }elseif ($request->type == "غرفه ديلوكس")
              {
                  $roomtype = roomtype::create($request->except('_token'));
                  $roomtype->type = $request->type;
                  $roomtype->save();
                  $id = $roomtype->id;
                  roomTypeTranslation::create([
                      'roomtype_id' => $id ,
                      'locale' => 'en' ,
                      'type' =>'Deluxe Room' ,
                  ]);
              }elseif ($request->type == "غرفه متميوة")
              {
                  $roomtype = roomtype::create($request->except('_token'));
                  $roomtype->type = $request->type;
                  $roomtype->save();
                  $id = $roomtype->id;
                  roomTypeTranslation::create([
                      'roomtype_id' => $id ,
                      'locale' => 'en' ,
                      'type' =>'Superior Room' ,
                  ]);
              }elseif ($request->type == "جناح")
              {
                  $roomtype = roomtype::create($request->except('_token'));
                  $roomtype->type = $request->type;
                  $roomtype->save();
                  $id = $roomtype->id;
                  roomTypeTranslation::create([
                      'roomtype_id' => $id ,
                      'locale' => 'en' ,
                      'type' =>'Suite' ,
                  ]);
              }elseif ($request->type == "غرفة عائليه")
              {
                  $roomtype = roomtype::create($request->except('_token'));
                  $roomtype->type = $request->type;
                  $roomtype->save();
                  $id = $roomtype->id;
                  roomTypeTranslation::create([
                      'roomtype_id' => $id ,
                      'locale' => 'en' ,
                      'type' =>'Family Room' ,
                  ]);
              }
           }elseif (app()->getLocale() == 'en')
           {
               if($request->type == "Classic Room")
               {
                   $roomtype = roomtype::create($request->except('_token'));
                   $roomtype->type = $request->type;
                   $roomtype->save();
                   $id = $roomtype->id;
                   roomTypeTranslation::create([
                       'roomtype_id' => $id ,
                       'locale' => 'ar' ,
                       'type' =>'غرفة كلاسيكية' ,
                   ]);
               }elseif ($request->type == "Luxury Room")
               {
                   $roomtype = roomtype::create($request->except('_token'));
                   $roomtype->type = $request->type;
                   $roomtype->save();
                   $id = $roomtype->id;
                   roomTypeTranslation::create([
                       'roomtype_id' => $id ,
                       'locale' => 'ar' ,
                       'type' =>'غرفة فاخرة' ,
                   ]);
               }elseif ($request->type == "Deluxe Room")
               {
                   $roomtype = roomtype::create($request->except('_token'));
                   $roomtype->type = $request->type;
                   $roomtype->save();
                   $id = $roomtype->id;
                   roomTypeTranslation::create([
                       'roomtype_id' => $id ,
                       'locale' => 'ar' ,
                       'type' =>'غرفه ديلوكس' ,
                   ]);
               }elseif ($request->type == "Superior Room")
               {
                   $roomtype = roomtype::create($request->except('_token'));
                   $roomtype->type = $request->type;
                   $roomtype->save();
                   $id = $roomtype->id;
                   roomTypeTranslation::create([
                       'roomtype_id' => $id ,
                       'locale' => 'ar' ,
                       'type' =>'غرفه متميوة' ,
                   ]);
               }elseif ($request->type == "Suite")
               {
                   $roomtype = roomtype::create($request->except('_token'));
                   $roomtype->type = $request->type;
                   $roomtype->save();
                   $id = $roomtype->id;
                   roomTypeTranslation::create([
                       'roomtype_id' => $id ,
                       'locale' => 'ar' ,
                       'type' =>'جناح' ,
                   ]);
               }elseif ($request->type == "Family Room")
               {
                   $roomtype = roomtype::create($request->except('_token'));
                   $roomtype->type = $request->type;
                   $roomtype->save();
                   $id = $roomtype->id;
                   roomTypeTranslation::create([
                       'roomtype_id' => $id ,
                       'locale' => 'ar' ,
                       'type' =>'غرفة عائليه' ,
                   ]);
               }
           }

            return redirect()->route('RoomType')->with(['success' => 'Added Successfully']);

            DB:commit();
        }catch(Exception $ex){
          DB::rollback();
            return redirect()->route('RoomType')->with(['success' => 'Error Occurs']);
        }


    }



    public function edit($id){


        $roomtype = roomtype::find($id);
        if(!$roomtype) {
            $valueactive2 = "active";
            $valueactive = "";
            return view('AnyUsersAdvancedPages.Pages.crudRoomType', compact('valueactive2', 'valueactive'))->with(['success' => 'Not Found']);
        }else{
            $valueactive2 = "active";
            $valueactive = "";
            return view('AnyUsersAdvancedPages.Pages.crudRoomType', compact('roomtype','valueactive2', 'valueactive'))->with(['success' => ' Found']);

        }
    }



    public function update(Request $request ){


        try{

            DB::beginTransaction();

            $roomtype = roomtype::find($request->id);
            if(!$roomtype) {
                return redirect()->route('RoomType')->with(['success' => 'Not Found']);
            }else {
                if (!$request->has('is_active'))
                    $request->request->add(['is_active' => '0']);
                else
                    $request->request->add(['is_active' => '1']);


                $rules = $this->getRules();
                $message = $this->getMessages();
                $validator = Validator::make($request->all(), $rules, $message);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput($request->all());
                }


                if (app()->getLocale() == 'ar') {
                    if ($request->type == "غرفة كلاسيكية") {

                        $roomtype->update($request->except('_token','id'));
                        $roomtype->type = $request->type;
                        $roomtype->save();
                        $roomTypeTranslation = roomTypeTranslation::where('roomtype_id',$request->id)->get();
                        foreach ($roomTypeTranslation as $typeroomval)
                        {
                            if($typeroomval->locale=='en')
                            {
                                $typeroomval->update([
                                    'type' => 'Classic Room',
                                ]);
                            }
                        }
                    } elseif ($request->type == "غرفة فاخرة") {
                        $roomtype->update($request->except('_token','id'));
                        $roomtype->type = $request->type;
                        $roomtype->save();
                        $roomTypeTranslation = roomTypeTranslation::where('roomtype_id',$request->id)->get();
                        foreach ($roomTypeTranslation as $typeroomval)
                        {
                            if($typeroomval->locale=='en')
                            {
                                $typeroomval->update([
                                    'type' => 'Luxury Room',
                                ]);
                            }
                        }

                    } elseif ($request->type == "غرفه ديلوكس") {
                        $roomtype->update($request->except('_token','id'));
                        $roomtype->type = $request->type;
                        $roomtype->save();
                        $roomTypeTranslation = roomTypeTranslation::where('roomtype_id',$request->id)->get();
                        foreach ($roomTypeTranslation as $typeroomval)
                        {
                            if($typeroomval->locale=='en')
                            {
                                $typeroomval->update([
                                    'type' => 'Deluxe Room',
                                ]);
                            }
                        }

                    } elseif ($request->type == "غرفه متميوة") {
                        $roomtype->update($request->except('_token','id'));
                        $roomtype->type = $request->type;
                        $roomtype->save();
                        $roomTypeTranslation = roomTypeTranslation::where('roomtype_id',$request->id)->get();
                        foreach ($roomTypeTranslation as $typeroomval)
                        {
                            if($typeroomval->locale=='en')
                            {
                                $typeroomval->update([
                                    'type' => 'Superior Room',
                                ]);
                            }
                        }

                    } elseif ($request->type == "جناح") {
                        $roomtype->update($request->except('_token','id'));
                        $roomtype->type = $request->type;
                        $roomtype->save();
                        $roomTypeTranslation = roomTypeTranslation::where('roomtype_id',$request->id)->get();
                        foreach ($roomTypeTranslation as $typeroomval)
                        {
                            if($typeroomval->locale=='en')
                            {
                                $typeroomval->update([
                                    'type' => 'Suite',
                                ]);
                            }
                        }

                    } elseif ($request->type == "غرفة عائليه") {
                        $roomtype->update($request->except('_token','id'));
                        $roomtype->type = $request->type;
                        $roomtype->save();
                        $roomTypeTranslation = roomTypeTranslation::where('roomtype_id',$request->id)->get();
                        foreach ($roomTypeTranslation as $typeroomval)
                        {
                            if($typeroomval->locale=='en')
                            {
                                $typeroomval->update([
                                    'type' => 'Family Room',
                                ]);
                            }
                        }

                    }
                } elseif (app()->getLocale() == 'en') {
                    if ($request->type == "Classic Room") {
                        $roomtype->update($request->except('_token','id'));
                        $roomtype->type = $request->type;
                        $roomtype->save();
                        $roomTypeTranslation = roomTypeTranslation::where('roomtype_id',$request->id)->get();
                        foreach ($roomTypeTranslation as $typeroomval)
                        {
                            if($typeroomval->locale=='ar')
                            {
                                $typeroomval->update([
                                    'type' => 'غرفة كلاسيكية',
                                ]);
                            }
                        }

                    } elseif ($request->type == "Luxury Room") {
                        $roomtype->update($request->except('_token','id'));
                        $roomtype->type = $request->type;
                        $roomtype->save();
                        $roomTypeTranslation = roomTypeTranslation::where('roomtype_id',$request->id)->get();
                        foreach ($roomTypeTranslation as $typeroomval)
                        {
                            if($typeroomval->locale=='ar')
                            {
                                $typeroomval->update([
                                    'type' => 'غرفة فاخرة',
                                ]);
                            }
                        }

                    } elseif ($request->type == "Deluxe Room") {
                        $roomtype->update($request->except('_token','id'));
                        $roomtype->type = $request->type;
                        $roomtype->save();
                        $roomTypeTranslation = roomTypeTranslation::where('roomtype_id',$request->id)->get();
                        foreach ($roomTypeTranslation as $typeroomval)
                        {
                            if($typeroomval->locale=='ar')
                            {
                                $typeroomval->update([
                                    'type' => 'غرفه ديلوكس',
                                ]);
                            }
                        }

                    } elseif ($request->type == "Superior Room") {
                        $roomtype->update($request->except('_token','id'));
                        $roomtype->type = $request->type;
                        $roomtype->save();
                        $roomTypeTranslation = roomTypeTranslation::where('roomtype_id',$request->id)->get();
                        foreach ($roomTypeTranslation as $typeroomval)
                        {
                            if($typeroomval->locale=='ar')
                            {
                                $typeroomval->update([
                                    'type' => 'غرفه متميوة',
                                ]);
                            }
                        }

                    } elseif ($request->type == "Suite") {
                        $roomtype->update($request->except('_token','id'));
                        $roomtype->type = $request->type;
                        $roomtype->save();
                        $roomTypeTranslation = roomTypeTranslation::where('roomtype_id',$request->id)->get();
                        foreach ($roomTypeTranslation as $typeroomval)
                        {
                            if($typeroomval->locale=='ar')
                            {
                                $typeroomval->update([
                                    'type' => 'جناح',
                                ]);
                            }
                        }


                    } elseif ($request->type == "Family Room") {
                        $roomtype->update($request->except('_token','id'));
                        $roomtype->type = $request->type;
                        $roomtype->save();
                        $roomTypeTranslation = roomTypeTranslation::where('roomtype_id',$request->id)->get();
                        foreach ($roomTypeTranslation as $typeroomval)
                        {
                            if($typeroomval->locale=='ar')
                            {
                                $typeroomval->update([
                                    'type' => 'غرفة عائليه',
                                ]);
                            }
                        }

                    }
                }

                return redirect()->route('RoomType')->with(['success' => 'Added Successfully']);
            }
            DB:commit();
        }catch(Exception $ex){
            DB::rollback();
            return redirect()->route('RoomType')->with(['success' => 'Error Occurs']);
        }


    }


    public function delete($id){
        try {

            DB::beginTransaction();
            $roomtype = roomtype::find($id);
            if (!$roomtype) {
                return redirect()->route('RoomType')->with(['success' => 'Not Found']);
            } else {
                $roomtype->delete();

                $roomTypeTranslation = roomTypeTranslation::where('roomtype_id',$id)->get();
                foreach ($roomTypeTranslation as $typeroomval)
                {
                    $typeroomval->delete();
                }
                return redirect()->route('RoomType')->with(['success' => 'Deleted Successfully']);
            }
            DB:commit();
        }catch(Exception $ex){
            DB::rollback();
            return redirect()->route('RoomType')->with(['success' => 'Error Occurs']);
        }

    }

    public function getRules(){
        return $rules = [
            'type'=>'required|string|max:191',
            'is_active'=>'required|in:0,1',
        ];
    }

    public function getMessages(){
        return $messages = [
            'type.required'=>'this field is required',
            'type.string'=>'this field must be string',
            'type.max'=>'this field max is 191',
            'is_active.required'=>'this field is required',
            'is_active.required'=>'this field must be 0 | 1',
        ];
    }
////////////////////////////////////End Room Types ////////////////////////////////////


//////////////////////////////////// Room  ////////////////////////////////////



    public function indexRoom()
    {
        $allrooms = room::orderBy('id' , 'ASC')->paginate(5);

        $allroomType = roomtype::orderBy('id' , 'ASC')->get();
        return view('AnyUsersAdvancedPages.Pages.crudRoom', compact('allrooms','allroomType'));

    }

    public function getLanguage($id = 0)
    {

        try{


            DB::beginTransaction();

            $allroomLanguage = roomTranslation::where('room_id' , $id)->get();
            if(!$allroomLanguage) {
                // return 0;
                return redirect()->route('Manager.Room.Room')->with(['error' => 'Not Found']);
            }else {

                // Fetch all records
                $roomLanguage['data'] = $allroomLanguage;

                echo json_encode($roomLanguage);
                exit;
        }
            DB:commit();
        }catch(Exception $ex){
DB::rollback();
return redirect()->route('Manager.Room.Room')->with(['error' => 'Error Occurs']);
}

    }


    public function storeLanguage(Request $request)
    {


        try{


            DB::beginTransaction();

             $locale = "";
            $room = room::where('id' , $request->id)->get();
            if(!$room) {
                // return 0;
                return redirect()->route('Manager.Room.Room')->with(['error' => 'Not Found']);
            }else {

                $roomTranslation = roomTranslation::where('room_id',$request->id)->get();
                foreach ($roomTranslation as $roomval)
                {
                  $locale = $roomval->locale;
                }

                if($locale == "en"){
                        roomTranslation::create([
                        'room_id' => $request->id ,
                        'locale' => "ar" ,
                        'price_per' => $request->price_per ,
                        'RoomView' => $request->RoomView ,
                    ]);
                }elseif ($locale == "ar"){
                    roomTranslation::create([
                        'room_id' => $request->id ,
                        'locale' => "en" ,
                        'price_per' => $request->price_per ,
                        'RoomView' => $request->RoomView ,
                    ]);
                }
                return Response()->json(["result" => true, "data" => $room, "success" => "Room Language Added Successfully "]);
                // Fetch all records

            }
            DB:commit();
        }catch(Exception $ex){
            DB::rollback();
            return redirect()->route('Manager.Room.Room')->with(['error' => 'Error Occurs']);
        }

    }


    public function storeRoom(Request $request){

        try{


            DB::beginTransaction();

            if(!$request->has('is_active'))
                $request->request->add(['is_active'=>'0']);
            else
                $request->request->add(['is_active'=>'1']);


            $rules = $this->getRulesRoom();
            $validator =  Validator::make($request->all(), $rules  );

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }else{
                $imageName = "";
                $roomtype_id = 0;
                if($request->has('image')){
                    $imageName = time() . '.' . request()->image->getClientOriginalExtension();
                    $input['image'] = $imageName;
                    request()->image->move(public_path('images/rooms'), $imageName);
                }

                if (app()->getLocale() == 'en') {
                    if($request->type == 'Classic Room'){
                        $roomtype_id = 1;
                    }elseif ($request->type == 'Luxury Room'){
                        $roomtype_id = 2;
                    }elseif ($request->type == 'Deluxe Room'){
                        $roomtype_id = 3;
                    }elseif ($request->type == 'Superior Room'){
                        $roomtype_id = 4;
                    }elseif ($request->type == 'Suite'){
                        $roomtype_id = 5;
                    }elseif ($request->type == 'Family Room'){
                        $roomtype_id = 6;
                    }

                }elseif (app()->getLocale() == 'ar'){
                    if($request->type == 'غرفة كلاسيكية'){
                        $roomtype_id = 1;
                    }elseif ($request->type == 'غرفة فاخرة'){
                        $roomtype_id = 2;
                    }elseif ($request->type == 'غرفه ديلوكس'){
                        $roomtype_id = 3;
                    }elseif ($request->type == 'غرفه متميوة'){
                        $roomtype_id = 4;
                    }elseif ($request->type == 'جناح'){
                        $roomtype_id = 5;
                    }elseif ($request->type == 'غرفة عائليه'){
                        $roomtype_id = 6;
                    }
                }

                $room =  room::create([
                    'roomtype_id' => $roomtype_id ,
                    'state_id' => 1 ,

                    'state_clean_id' => 5 ,
                    'price' => $request->price ,
                    'MaximumPerson' => $request->MaximumPerson ,
                    'RoomSize' =>  $request->RoomSize,
                    'BedNumber' => $request->BedNumber,
                    'image' => $imageName,
                    'is_active' =>  $request->is_active,
                ]);

                $room->price_per = $request->price_per;
                $room->RoomView = $request->RoomView;


                $room->save();

                return Response()->json(["result" => true, "data" => $room, "success" => "Room Added Successfully "]);
               /* $allrooms = room::orderBy('id' , 'ASC')->paginate(PAGINATION_COUNT);
                $allroomType = roomtype::orderBy('id' , 'ASC')->get();
                return view('AnyUsersAdvancedPages.Pages.crudRoom', compact('allrooms','allroomType'));*/

            }

            DB:commit();
        }catch(Exception $ex){
            DB::rollback();
            return redirect()->route('Manager.Room.Room')->with(['error' => 'Error Occurs']);
        }




        }



    public function updateRoom(Request $request){


        try{


            DB::beginTransaction();

            $room = room::find($request->id);
            if(!$room) {
               // return 0;
                return redirect()->route('Manager.Room.Room')->with(['error' => 'Not Found']);
            }else {

                    if($request->price_per==null && $request->RoomView==null &&$request->image==null){
                        $room->update([
                            'price' => $request->price,
                            'MaximumPerson' => $request->MaximumPerson,
                            'RoomSize' => $request->RoomSize,
                            'BedNumber' => $request->BedNumber,
                            'image' => $request->img,
                        ]);
                    }else{
                        if($request->has('image')) {
                            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
                            $input['image'] = $imageName;
                            request()->image->move(public_path('images/rooms'), $imageName);

                            $room->update([
                                'price' => $request->price,
                                'MaximumPerson' => $request->MaximumPerson,
                                'RoomSize' => $request->RoomSize,
                                'BedNumber' => $request->BedNumber,
                                'image' => $imageName,
                            ]);
                            $room->price_per = $request->price_per;
                            $room->RoomView = $request->RoomView;
                            $room->save();
                        }else{
                            $room->update([
                                'price' => $request->price,
                                'MaximumPerson' => $request->MaximumPerson,
                                'RoomSize' => $request->RoomSize,
                                'BedNumber' => $request->BedNumber,
                            ]);
                            $room->price_per = $request->price_per;
                            $room->RoomView = $request->RoomView;
                            $room->save();
                        }
                    }
                   // return 2;
                    //return redirect()->route('Manager.Room.Room')->with(['success' => 'Updated Successfully']);
                return Response()->json(["result" => true, "data" => $room, "success" => "Room Updated Successfully "]);

            }
            DB:commit();
        }catch(Exception $ex){
            DB::rollback();
           // return 3;
            return redirect()->route('Manager.Room.Room')->with(['error' => 'Error Occurs']);
        }




    }


    public function deleteRoom(Request $request){
        try {

            DB::beginTransaction();
            $room = room::find($request->id);
            if (!$room) {
                return Response()->json(["result" => true, "error" => "Room Not Found"]);

            } else {
                $room->delete();

                $roomTranslation = roomTranslation::where('room_id',$request->id)->get();
                foreach ($roomTranslation as $roomval)
                {
                    $roomval->delete();
                }
                return Response()->json(["result" => true, "success" => "Room Deleted Successfully"]);

            }
            DB:commit();
        }catch(Exception $ex){
            DB::rollback();
            return Response()->json(["result" => true, "error" => "Error Occurs"]);
        }

    }


    public function activationRoom(Request $request){

        try {

            DB::beginTransaction();
            $room = room::find($request->id);
            if (!$room) {
                return Response()->json(["result" => true, "error" => "Room Not Found"]);

            } else {
                if($room->is_active ==0) {
                    $room->update([
                        'is_active' => 1,
                    ]);
                }else{
                    $room->update([
                        'is_active' => 0,
                    ]);
                }

                return Response()->json(["result" => true, "data"=> $room,"success" => "Activated Successfully"]);

            }
            DB:commit();
        }catch(Exception $ex){
            DB::rollback();
            return Response()->json(["result" => true, "error" => "Error Occurs"]);
        }

    }



    public function getRulesRoom(){
        return $rules = [
            'RoomView'=>'required_without:id|string|max:191',
            'is_active'=>'required|in:0,1',
            'price'=>'required',
            'MaximumPerson'=>'required',
            'RoomSize'=>'required',
            'BedNumber'=>'required',
            'image'=>'required_without:id|mimes:jpg,jpeg,png',
            'price_per'=>'required_without:id|string|max:191',

        ];
    }

   /* public function getMessagesRoom(){
        return $messages = [
            'required'=>'this field is required',
            'type.string'=>'this field must be string',
            'type.max'=>'this field max is 191',
            'is_active.required'=>'this field is required',
            'is_active.required'=>'this field must be 0 | 1',
        ];
    }*/
////////////////////////////////////End Room  ////////////////////////////////////




























































    ////////////////////////////Begin Relations///////////////////////////////

    /////////////////////////// One To One///////////////////////////////////
    public function hasOneRelation()
    {

        // another way
       // $staff = staff::with('mobile')->where('StaffId','1')->first();

        $staff = staff::with(['mobile' => function($query){
            $query->select('code' , 'mobile','IdStaff' );
         }])->where('StaffId','5')->first();

      // return $staff -> StaffId;
      //  return $staff->mobile->code;
        return response()->json($staff);
    }


    public function hasOneReverseRelation()
    {

        $mobile = Mobile::with(['staff' => function($query){
            $query->select('salary' , 'age' ,'StaffId');
        }])->where('id','1')->first();

        //Make Some Attribute Visible
        $mobile->makeVisible(['IdStaff']);
        //$mobile->makeHidden(['IdStaff']);
         $mobile->staff;
        // return $mobile;
        return response()->json($mobile);
    }


    public function hasOne_WhereHas_Relation()
    {

       $users = staff::whereHas('mobile')->get();
        return response()->json($users);
    }

    public function hasOne_WhereDoesNotHave_Relation()
    {

        $users = staff::whereDoesntHave('mobile')->get();
        return response()->json($users);
    }



    public function hasOne_WhereHas_WithCondition_Relation()
    {

        $users = staff::whereHas('mobile' , function ($query){
            $query->where('code' , '002');
        })->get();
        return response()->json($users);
    }


/////////////////////////////// One To Many ////////////////////
    public function hasMany()
    {

       /* $specialist = Specialist::find(1);
        $specialist->staff;    //Get All Staff Of One Specialist*/

        /*$specialist = Specialist::with(['staff',function($query){
            $query->select('salary' , 'specialist_Id');
        } ])->where('Id','2')->first();

        foreach ($specialist as $staf)
            echo $staf->salary;
*/
        $specialist = Specialist::with(['staff' ])->find(2);



        return response()->json($specialist);


    }

    public function hasManyReverseRelation()
    {
        $staff = staff::where('StaffId','2')->first();
        $staff->specialist;
        return response()->json($staff);
    }
    ////////////////////////////End Relations//////////////////////////////////


}
