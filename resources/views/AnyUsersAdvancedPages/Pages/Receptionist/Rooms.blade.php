@extends('anyUsersAdvancedPages.layouts.content')

@section('contentAnyUsersAdvancedPages')

<section class="content-header " >

    @if(App::isLocale('ar'))
        <h1 class=" pull-right">
            {{__('pageContent.aside_dashboard')}}
            <small>{{__('pageContent.controlPanel')}}</small>
        </h1>
    @elseif(App::isLocale('en'))
        <h1 class=" pull-left">
            {{__('pageContent.aside_dashboard')}}
            <small>{{__('pageContent.controlPanel')}}</small>
        </h1>

    @endif


</section>
<br>
<br>
<!-- Main content -->
<section class="content">


    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">

                        @foreach($rooms as $room)
                    <div class="tableshowdata" id="any">
                        <div class="col-sm col-md-6 col-lg-4 ftco-animate" >
                            <div class="room">
                                <a href="rooms-single.html" class="img d-flex justify-content-center align-items-center" style="background-image: url({{URL::asset('images/rooms/'.$room->image)}});">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <span class="icon-search2"></span>
                                    </div>
                                </a>
                                <div class="text p-3 text-center">

                                        <h3 class="mb-3"><a href="">{{$room->getRoomType()}}</a></h3>

                                    <p><span class="price mr-2">{{$room->price}}</span> <span class="per">{{$room->price_per}}</span></p>
                                    <ul class="list">
                                        <li><span>{{__('pageContent.max')}}:</span> {{$room->MaximumPerson}} {{__('pageContent.person')}}</li>
                                        <li><span>{{__('pageContent.size')}}:</span> {{$room->RoomSize}} {{__('pageContent.m2')}}</li>
                                        <li><span>{{__('pageContent.view')}}:</span> {{$room->RoomView}}</li>
                                        <li><span>{{__('pageContent.bed')}}:</span> {{$room->BedNumber}}</li>
                                    </ul>
                                    <hr>
                                    @if(App::isLocale('ar'))
                                        <button  room_id="{{$room->id}}" style="background-color: white;border: none" class="book btn-custom"> <span class="icon-long-arrow-left"></span> {{__('pageContent.book_now')}}</button>
                                    @elseif(App::isLocale('en'))
                                        <button room_id="{{$room->id}}" style="background-color: white;border: none" class="book btn-custom">{{__('pageContent.book_now')}} <span class="icon-long-arrow-right"></span></button>
                                    @endif
                                </div>
                            </div>
                        </div>
                </div>
                            @endforeach



                    </div>
                </div>
                <div class="col-lg-4 sidebar">
                    <div class="sidebar-wrap bg-light ftco-animate">
                        <h3 class="heading mb-4">{{__('pageContent.aside_search')}}</h3>
                        <form >
                            <div class="fields">
                                <div class="form-group">
                                    <div class="select-wrap one-third">
                                        <div class="icon"> @if(App::isLocale('ar'))
                                                <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                            @elseif(App::isLocale('en'))
                                                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>

                                            @endif</div>
                                        <select  value="{{ old('typeroom') }}" id='typeroomval' name="typeroom"  class="form-control">
                                            <option value="0">{{__('pageContent.chooseroomtype')}}</option>
                                            @foreach($alltyperooms as $typeroom)
                                                <option value="{{$typeroom->id}}">{{$typeroom->type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="select-wrap one-third">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select  value="{{ old('adult') }}" id='adultVal' name="adult"  class="form-control">
                                            <option value="0">{{__('pageContent.choosenumadd')}}</option>
                                            <option value="1">1 {{__('pageContent.adult')}}</option>
                                            <option value="2">2 {{__('pageContent.adult')}}</option>
                                            <option value="3">3 {{__('pageContent.adult')}}</option>
                                            <option value="4">4 {{__('pageContent.adult')}}</option>
                                            <option value="5">5 {{__('pageContent.adult')}}</option>
                                            <option value="6">6 {{__('pageContent.adult')}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input id='but_search' type="button" value="{{__('pageContent.aside_search')}}" class="btn btn-primary py-3 px-5">
                                </div>
                            </div>
                        </form>
                    </div>


                    <div class="sidebar-wrap bg-light ftco-animate">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#new" data-toggle="tab">{{__('pageContent.newguest')}}</a></li>
                                <li><a href="#exist" data-toggle="tab">{{__('pageContent.existguest')}}</a></li>
                            </ul>

                            <div class="tab-content">
                                <div class="active tab-pane" id="new">
                                    <form id="book_new_guist" class="book_new" class="bg-white p-5 contact-form">
                                        {{ csrf_field() }}

                                        <div class="form-group row">
                                            <label  class="col-md-3 col-form-label">{{__('pageContent.name')}}</label>
                                            <div class="col-md-9">
                                                <input name="fname" type="text" class="form-control" id="inputname" required placeholder="{{__('pageContent.name')}}">
                                                @error('fname')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label  class="col-md-3 col-form-label">{{__('pageContent.email')}}</label>
                                            <div class="col-md-9">
                                                <input name="email" type="email" class="form-control" id="inputemail" required placeholder="{{__('pageContent.email')}}">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label  class="col-md-3 col-form-label">{{__('pageContent.password')}}</label>
                                            <div class="col-md-9">
                                                <input name="password" type="password" class="form-control" id="inputpassword" required placeholder="{{__('pageContent.password')}}">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label  class="col-md-3 col-form-label">{{__('pageContent.check-in_date')}}</label>
                                            <div class="col-md-9">
                                                <input name="checkindate" type="text" class="form-control checkin_date" id="checkin_date" required placeholder="{{__('pageContent.check-in_date')}}">
                                                @error('checkindate')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label  class="col-md-3 col-form-label">{{__('pageContent.check-out_date')}}</label>
                                            <div class="col-md-9">
                                                <input name="checkoutdate" type="text" class="form-control checkin_date" id="checkout_date" required placeholder="{{__('pageContent.check-out_date')}}">
                                                @error('checkoutdate')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label  class="col-md-3 col-form-label">{{__('pageContent.phone')}}</label>
                                            <div class="col-md-9">
                                                <input name="phone" type="text" class="form-control" id="inputphone" required placeholder="{{__('pageContent.phone')}}">
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label  class="col-md-3 col-form-label">{{__('pageContent.select')}}</label>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <div class="select-wrap one-third">
                                                        <select  value="{{ old('type') }}" id='typeVal' name="type"  class="form-control">
                                                            <option value="0">{{__('pageContent.chooseAnyType')}}</option>
                                                            <option value="6">{{__('pageContent.localguest')}}</option>
                                                            <option value="7">{{__('pageContent.foreignguist')}}</option>
                                                        </select>
                                                        @error('type')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row" style="display: none">
                                            <div class="col-md-12">
                                                <input name="" type="text" class="form-control" id="input" >

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input style="display: none" name="room_id" type="text" class="form-control" id="input_roomid" >

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input id="book_guist" type="submit" value="{{__('pageContent.book_now')}}" class="btn btn-primary py-3 px-5">
                                        </div>
                                    </form>
                                </div>

                                <div class=" tab-pane" id="exist">
                                    <h3 class="heading mb-4">{{__('pageContent.aside_search')}}</h3>

                                    <div class="form-group row">
                                        <label  class="col-md-3 col-form-label">{{__('pageContent.select')}}</label>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <div class="select-wrap one-third">
                                                    <select  value="{{ old('type') }}" id='key' name="type"  class="form-control">
                                                        <option value="3">{{__('pageContent.code')}}</option>
                                                        <option value="1">{{__('pageContent.phone')}}</option>
                                                        <option value="2">{{__('pageContent.email')}}</option>
                                                    </select>
                                                    @error('type')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label  class="col-md-3 col-form-label">{{__('pageContent.anything')}}</label>
                                        <div class="col-md-9">
                                            <input name="searchingValue" type="text" class="form-control" id="searchingValue" required placeholder="{{__('pageContent.anything')}}">
                                            @error('search')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input id="search_guest" type="submit" value="{{__('pageContent.aside_search')}}" class="search_guist btn btn-primary py-3 px-5">
                                    </div>

                                    <hr>

                                    <div>
                                        <h3 class="heading mb-4">{{__('pageContent.userinfo')}}</h3>

                                        <div class="table-responsive">
                                            <table  id="tableshowdata" class="table table-bordered table-striped" id="dataTable">
                                                <thead>
                                                <tr>
                                                    <th >{{__('pageContent.no')}}</th>
                                                    <th>{{__('pageContent.fname')}}</th>
                                                    <th>{{__('pageContent.mname')}}</th>
                                                    <th>{{__('pageContent.lname')}}</th>
                                                    <th>{{__('pageContent.email')}}</th>
                                                </tr>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>

                                        </div>

                                </div>


                                    <hr>

                                    <div>
                                        <h3 class="heading mb-4">{{__('pageContent.details')}}</h3>

                                        <div class="table-responsive">
                                            <table  id="tableshowdataroom" class="table table-bordered table-striped" id="dataTableroom">
                                                <thead>
                                                <tr>
                                                    <th >{{__('pageContent.no')}}</th>
                                                    <th >{{__('pageContent.roomnum')}}</th>
                                                    <th>{{__('pageContent.roomtype')}}</th>
                                                    <th>{{__('pageContent.status')}}</th>
                                                    <th>{{__('pageContent.statusclean')}}</th>
                                                    <th>{{__('pageContent.price_per')}}</th>
                                                    <th>{{__('pageContent.RoomView')}}</th>
                                                    <th>{{__('pageContent.price')}}</th>
                                                    <th>{{__('pageContent.MaximumPerson')}}</th>
                                                    <th>{{__('pageContent.RoomSize')}}</th>
                                                    <th>{{__('pageContent.BedNumber')}}</th>
                                                    <th>{{__('pageContent.statusactive')}}</th>
                                                    <th>{{__('pageContent.action')}}</th>

                                                </tr>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>

                                        </div>
                                        <br>




                                        <div class="form-group">
                                            <form  id="book_exist_guist" class="book_exist" class="bg-white p-5 contact-form">
                                                {{ csrf_field() }}
                                            <div class="form-group row">
                                                <label  class="col-md-3 col-form-label">{{__('pageContent.check-in_date')}}</label>
                                                <div class="col-md-9">
                                                    <input name="checkindate" type="text" class="form-control checkin_date" id="checkin_date_for_exist" required placeholder="{{__('pageContent.check-in_date')}}">
                                                    @error('checkindate')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label  class="col-md-3 col-form-label">{{__('pageContent.check-out_date')}}</label>
                                                <div class="col-md-9">
                                                    <input name="checkoutdate" type="text" class="form-control checkin_date" id="checkout_date_for_exist" required placeholder="{{__('pageContent.check-out_date')}}">
                                                    @error('checkoutdate')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label  class="col-md-3 col-form-label">{{__('pageContent.phone')}}</label>
                                                <div class="col-md-9">
                                                    <input name="phone" type="text" class="form-control" id="Phone_id_for_exist" required placeholder="{{__('pageContent.phone')}}">
                                                    @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="form-group row" >
                                                <div class="col-md-12">
                                                    <input style="display:none;" name="user_id_for_exist" type="text" class="form-control" id="User_id_for_exist" >

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <input style="display:none;" required  name="room_id_for_exist" type="text" class="form-control" id="Room_id_for_exist" >

                                                </div>
                                            </div>



                                                <div class="form-group">
                                                    <input  id="book_exist_guist" type="submit" value="{{__('pageContent.book_now')}}" class="btn btn-primary py-3 px-5">
                                                </div>
                                            </form>
                                        </div>




                                    </div>




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</section>
<!-- /.content -->

@endsection



@section('scripts')
    <script src="{{URL::asset('jquery-3.0.0.min.js')}}"></script>


    <script type="text/javascript">


        // Fetch all records

    // Fetch all records
    /* $('#search').keypress(function(){
     fetchRecords(0);
     });*/

    // Search by userid
    $('#but_search').click(function(){
        var roomtype = Number($('#typeroomval').val().trim());
        var adult = Number($('#adultVal').val().trim());
        // Search by userid
        /* $('#search').keypress(function(){
         var userid = Number($('#search').val().trim());*/

        if(roomtype > 0){
            fetchRoomRecords(roomtype , adult);
        }else if(adult > 0){
            fetchRoomRecords(roomtype ,adult);
        }else if(roomtype > 0 && adult > 0)
        {
            fetchRoomRecords(roomtype ,adult);
        }
        else {
            fetchRoomRecords(0);
        }

    });


    function fetchRoomRecords(roomtype , adult){
        var roomtype = Number($('#typeroomval').val().trim());
        var adult = Number($('#adultVal').val().trim());
        var getLocalValue = document.getElementById("getLocalValue").value;
        $.ajax({
            url: 'getRoomByType/'+roomtype +'/'+ adult,
            type: 'get',
            dataType: 'json',
            success: function(response){

                var len = 0;
                $('.tableshowdata').empty();
                if(response['data'] != null){
                    len = response['data'].length;
                }

                if(len > 0){
                    for(var i=0; i<len; i++){
                        var roomtype_id = response['data'][i].roomtype_id;
                        var state_id = response['data'][i].state_id;
                        var state_clean_id = response['data'][i].state_clean_id;
                        var price = response['data'][i].price;
                        var price_per = response['data'][i].price_per;
                        var MaximumPerson = response['data'][i].MaximumPerson;
                        var RoomSize = response['data'][i].RoomSize;
                        var BedNumber = response['data'][i].BedNumber;
                        var RoomView = response['data'][i].RoomView;
                        var image = response['data'][i].image;


                        var baseUrl = "{{ asset('images/rooms/') }}";
                        var imageForPost = baseUrl + "/" + image;

                        var type_ar_en = "";
                        if(getLocalValue == 'ar'){


                            if( roomtype_id == 1 ){
                                type_ar_en = "غرفة كلاسيكية";
                            }else if (roomtype_id == 6){
                                type_ar_en = "غرفة فاخرة";
                            }else if (roomtype_id == 5){
                                type_ar_en = "غرفه ديلوكس";
                            }else if (roomtype_id == 4){
                                type_ar_en = "غرفه متميوة";
                            }else if (roomtype_id == 2){
                                type_ar_en = "جناح";
                            }else if (roomtype_id == 3){
                                type_ar_en = "غرفة عائليه";
                            }

                        }
                        else if(getLocalValue == 'en') {
                            if (roomtype_id == 1) {
                                type_ar_en = "Classic Room";
                            } else if (roomtype_id == 6) {
                                type_ar_en = "Luxury Room ";
                            } else if (roomtype_id ==5) {
                                type_ar_en = "Deluxe Room ";
                            } else if (roomtype_id == 4) {
                                type_ar_en = " Superior Room";
                            } else if (roomtype_id == 2) {
                                type_ar_en = "Suite";
                            } else if (roomtype_id == 3) {
                                type_ar_en = " Family Room";
                            }

                        }


                        var max = "";
                        if(getLocalValue == 'ar'){
                            max = "عدد الاشخاص"
                        }
                        else if(getLocalValue == 'en'){
                           max = "Max";
                        }
                        var size = "";
                        if(getLocalValue == 'ar'){
                            size = "المساحة"
                        }
                        else if(getLocalValue == 'en'){
                            size = "Size";
                        }

                        var view = "";
                        if(getLocalValue == 'ar'){
                            view = "المنظر"
                        }
                        else if(getLocalValue == 'en'){
                            view = "View";
                        }

                        var bed = "";
                        if(getLocalValue == 'ar'){
                            bed = "عدد السراير"
                        }
                        else if(getLocalValue == 'en'){
                            bed = "Bed";
                        }

                        var person = "";
                        if(getLocalValue == 'ar'){
                            person = "شخص"
                        }
                        else if(getLocalValue == 'en'){
                            person = "Persons";
                        }

                        var m2 = "";
                        if(getLocalValue == 'ar'){
                            m2 = "م2"
                        }
                        else if(getLocalValue == 'en'){
                            m2 = "m2";
                        }

                        var book = "";
                        var b = "";
                        if(getLocalValue == 'ar'){
                            b = "إحجز الان"
                            book = " <span class='icon-long-arrow-left'></span>" + b;
                        }
                        else if(getLocalValue == 'en'){
                            book = "Book Now";
                            book+=" <span class='icon-long-arrow-right'></span>";
                        }

                        var result_str =  " <div class='col-sm col-md-6 col-lg-4 ftco-animate'>" +
                                           " <div class='room'>"+
                            " <a href='rooms-single.html' class='img d-flex justify-content-center align-items-center'  style='background-image: url("+imageForPost+");' >"+

                                " <div class='icon d-flex justify-content-center align-items-center'>"+
                                " <span class='icon-search2'></span>"+
                                " </div>"+
                                " </a>"+
                                " <div class='text p-3 text-center'>"+
                                " <h3 class='mb-3'><a href=''>"+type_ar_en+"</a></h3>"+
                                "  <p><span class='price mr-2'> "+price +"</span> <span class='per'>" +price_per+"</span></p>"+
                                "<ul class='list'>"+
                                "  <li><span>"+max+":</span> " + MaximumPerson +  " "+person+"</li>"+
                                " <li><span>"+size+":</span> "+RoomSize +" "+m2+"</li>"+
                                "<li><span>"+view+":</span>"+RoomView+" </li>"+
                                " <li><span>"+bed+":</span>"+BedNumber+ "</li>"+
                                "</ul>"+
                                "<hr>" +
                                " <p class='pt-1'><a href='' class='btn-custom'>"+book+" </a></p>" +
                                " </div>"+
                                          "</div>"+
                                          " </div>";

                        $("#any").append(result_str);
                        }
                }else{

                }

            }
        });
    }

        $(document).on('click' , '.book' ,function(){
            let room_id =  $(this).attr('room_id');
            document.getElementById("input_roomid").value = room_id;
            document.getElementById("Room_id_for_exist").value = room_id;
        });


        $('#book_new_guist').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                type: 'post',
                enctype : 'multipart/form-data',
                url : "{{ route('BookNow_forReceptionist')}}"  ,
                data: new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success : function(data){

                    if(data.resultforroom == true){
                        alert(data.success2);
                    }
                    else if(data.result == true)
                    {
                        alert(data.success);
                        $('#inputname').val('');
                        $('#inputemail').val('');
                        $('#inputpassword').val('');
                        $('#checkout_date').val('');
                        $('#checkin_date').val('');
                        $('#inputphone').val('');
                        $('#typeVal').val('');
                        $('#input').val('');
                        $('#input_roomid').val('');
                    }else {
                        alert(data.error)
                    }

                },
                error : function (reject){

                },
            });

        });


        $('#book_exist_guist').on('submit', function(event){
            event.preventDefault();
            let getLocalValue = document.getElementById("getLocalValue").value;
            $.ajax({
                type: 'post',
                enctype : 'multipart/form-data',
                url : "{{ route('BookNow_forExist')}}"  ,
                data: new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success : function(data){

                    if(data.resultforroom == true){

                        if(getLocalValue == 'ar'){
                            alert(data.success2_ar);
                        }else {
                            alert(data.success2_en);
                        }

                    }
                    else if(data.result == true)
                    {
                        if(getLocalValue == 'ar'){
                            alert(data.success_ar);
                        }else {
                            alert(data.success_en);
                        }

                        $('#checkin_date_for_exist').val('');
                        $('#checkout_date_for_exist').val('');
                        $('#Phone_id_for_exist').val('');
                        $('#User_id_for_exist').val('');
                        $('#Room_id_for_exist').val('');
                    }else {
                        alert(data.error)
                    }

                },
                error : function (reject){

                },
            });

        });



        $(document).on('click' , '.search_guist' ,function(){
            let key = document.getElementById("key").value;
            let searchingValue = document.getElementById("searchingValue").value;
            let getLocalValue = document.getElementById("getLocalValue").value;

            if(searchingValue.length > 0){
                fetchRecords(key,searchingValue);
            }
        });



        $(document).on('click' , '.room_availability' ,function(){
            let room_id = $(this).attr('room_id_active');
            let getLocalValue = document.getElementById("getLocalValue").value;
            $.ajax({
                url: '/checkavailability/'+room_id ,
                type: 'get',
                dataType: 'json',
                success: function(response){

                   if(response.notAvailable1 == true){
                       if(response.data==1) {
                           alert(response.successNotAvailable1 + " " + response.data + " day");
                       }else {
                           alert(response.successNotAvailable1 + " " + response.data + " days");
                       }
                   }else if(response.Available1 == true){
                       alert(response.successAvailable1);
                   }else if(response.notAvailable2 == true){
                       if(response.data==1) {
                           alert(response.successNotAvailable2 + " " + response.data + " day");
                       }else {
                           alert(response.successNotAvailable2 + " " + response.data + " days");
                       }
                   }else if(response.Available2 == true){
                       alert(response.successAvailable2);
                   }
                }
            });


        });



        $(document).on('click' , '.room_book' ,function(){
            let room_id = $(this).attr('room_id_book');
            let getLocalValue = document.getElementById("getLocalValue").value;


            $.ajax({
                url: '/checkavailability/'+room_id ,
                type: 'get',
                dataType: 'json',
                success: function(response){

                    if(response.notAvailable1 == true){
                        if(response.data==1) {
                            alert(response.successNotAvailable1 + " " + response.data + " day");
                        }else {
                            alert(response.successNotAvailable1 + " " + response.data + " days");
                        }
                    }else if(response.Available1 == true){
                        alert(response.successAvailable1);
                        if (getLocalValue == 'ar'){

                            alert("انت اخترت الغرفه رقم " + " " +room_id);
                            document.getElementById("Room_id_for_exist").value = room_id;

                        }else if(getLocalValue == 'en'){


                            alert("You Select Room Number " +room_id);
                            document.getElementById("Room_id_for_exist").value = room_id;

                        }

                    }else if(response.notAvailable2 == true){
                        if(response.data==1) {
                            alert(response.successNotAvailable2 + " " + response.data + " day");
                        }else {
                            alert(response.successNotAvailable2 + " " + response.data + " days");
                        }
                    }else if(response.Available2 == true){
                        alert(response.successAvailable2);
                        if (getLocalValue == 'ar'){

                            alert("انت اخترت الغرفه رقم " + " " +room_id);
                            document.getElementById("inputroomid").value = room_id;

                        }else if(getLocalValue == 'en'){


                            alert("You Select Room Number " +room_id);
                            document.getElementById("input_roomid").value = room_id;

                        }
                    }
                }
            });



        });




        function fetchRecords(key,searchingValue){
            let getLocalValue = document.getElementById("getLocalValue").value;
            $.ajax({
                url: '/searchguest/'+key +'/'+ searchingValue,
                type: 'get',
                dataType: 'json',
                success: function(response){

                    var len = 0;
                    let len2 = 0;
                    let len3 = 0;

                    $('#tableshowdata tbody').empty(); // Empty <tbody>
                    $('#tableshowdataroom tbody').empty(); // Empty <tbody>

                    if(response['data'] != null){
                        len = response['data'].length;
                    }

                    if(len > 0){
                        for(var i=0; i<len; i++){
                            var iduser = response['data'][i].id;
                            var fname = response['data'][i].fname;
                            var mname = response['data'][i].mname;
                            var lname = response['data'][i].lname;
                            var email = response['data'][i].email;


                            document.getElementById("User_id_for_exist").value = iduser;

                            var tr_str = "<tr>" +
                                "<td align='center'>" + (i+1) + "</td>" +
                                "<td align='center'>" + fname + "</td>" +
                                "<td align='center'>" + mname + "</td>" +
                                "<td align='center'>" + lname + "</td>" +
                                "<td align='center'>" + email + "</td>" +
                               "</tr>";

                            $("#tableshowdata tbody").append(tr_str);
                        }
                    }else{

                        var record = "";
                        if(getLocalValue == 'ar'){
                            record = "لا يوجد بيانات لهذا"
                        }
                        else if(getLocalValue == 'en'){
                            record = "No record found.";
                        }

                            var tr_str = "<tr>" +
                                "<td align='center' colspan='5'>"+ record +"</td>" +
                                "</tr>";

                        $("#tableshowdata tbody").append(tr_str);
                    }


                    if(response['user_phone'] != null){
                        len3 = response['user_phone'].length;

                    }
                    if(len3 > 0) {
                        for (let y = 0; y < len3; y++) {
                            let phone = response['user_phone'][y].phone;
                            document.getElementById("Phone_id_for_exist").value = phone;
                        }
                    }


                    if(response['data_room'] != null){
                        len2 = response['data_room'].length;
                    }


                    if(len2 > 0){
                        for(var x=0; x<len2; x++){
                            var id = response['data_room'][x].id;
                            var roomtype = response['data_room'][x].roomtype_id;
                            var status = response['data_room'][x].state_id;
                            var statusclean = response['data_room'][x].state_clean_id;
                            var price_per = response['data_room'][x].price_per;
                            var RoomView = response['data_room'][x].RoomView;
                            var price = response['data_room'][x].price;
                            var MaximumPerson = response['data_room'][x].MaximumPerson;
                            var RoomSize = response['data_room'][x].RoomSize;
                            var BedNumber = response['data_room'][x].BedNumber;
                            var statusactive = response['data_room'][x].is_active;
                            var image = response['data_room'][x].image;

                           // document.getElementById("Room_id_for_exist").value = id;

                            var type_ar_en = "";
                            if(getLocalValue == 'ar'){


                                if( roomtype == 1 ){
                                    type_ar_en = "غرفة كلاسيكية";
                                }else if (roomtype == 2){
                                    type_ar_en = "غرفة فاخرة";
                                }else if (roomtype == 3){
                                    type_ar_en = "غرفه ديلوكس";
                                }else if (roomtype == 4){
                                    type_ar_en = "غرفه متميوة";
                                }else if (roomtype == 5){
                                    type_ar_en = "جناح";
                                }else if (roomtype == 6){
                                    type_ar_en = "غرفة عائليه";
                                }

                            }
                            else if(getLocalValue == 'en') {
                                if (roomtype == 1) {
                                    type_ar_en = "Classic Room";
                                } else if (roomtype == 2) {
                                    type_ar_en = "Luxury Room ";
                                } else if (roomtype == 3) {
                                    type_ar_en = "Deluxe Room ";
                                } else if (roomtype == 4) {
                                    type_ar_en = " Superior Room";
                                } else if (roomtype == 5) {
                                    type_ar_en = "Suite";
                                } else if (roomtype == 6) {
                                    type_ar_en = " Family Room";
                                }

                            }

                            var state = "";
                            if(getLocalValue == 'ar'){
                                if( status== 1) {
                                    state =  'فارغة';

                                }else if(status== 2)
                                {
                                    state =  'ممتلئة';
                                }
                            } else if(getLocalValue == 'en'){
                                if( status== 1) {
                                    state =  'Empty';

                                }else if(status== 2)
                                {
                                    state =  'Full';
                                }
                            }


                            var state_clean = "";



                            if(getLocalValue == 'ar'){
                                if( statusclean== 6) {
                                    state_clean =  'غير نظيفة';

                                }else if(statusclean== 5)
                                {
                                    state_clean =  'نظيفة';
                                }
                            }
                            else if(getLocalValue == 'en'){
                                if( statusclean== 6) {
                                    state_clean =  'Dirty';

                                }else if(statusclean== 5)
                                {
                                    state_clean =  'Clean';
                                }
                            }


                            var active = "";

                            if(getLocalValue == 'ar'){
                                if( statusactive== 1) {
                                    active =  'مفعل';

                                }else if(statusactive== 0)
                                {
                                    active =  'غير مفعل';
                                }
                            }
                            else if(getLocalValue == 'en'){
                                if( statusactive== 1) {
                                    active =  'active';

                                }else if(statusactive== 0)
                                {
                                    active =  'Not Active';
                                }
                            }


                            var but_available = "";
                            var bun_available = "";
                            if(statusactive == 1) {
                                if (getLocalValue == 'ar') {

                                    but_available = 'الاتاحة';
                                    but_book_v = 'حجز';
                                    bun_available = "<button id ='sssss'  room_id_active='"+id+"' class='room_availability btn btn-primary btn-sm' > "+but_available+"  </button>"+
                                        "<button room_id_book='"+id+"' class='room_book btn btn-primary btn-sm' > "+but_book_v+"  </button>"

                                } else if (getLocalValue == 'en') {

                                    but_available = 'Check';
                                    but_book_v = 'Book';
                                    bun_available = "<button id ='sssss'  room_id_active='"+id+"' class='room_availability btn btn-primary btn-sm' > "+but_available+"  </button>"+
                                        "<button room_id_book='"+id+"' class='room_book btn btn-primary btn-sm' > "+but_book_v+"  </button>"
                                }
                            }else if(statusactive == 0){
                                if (getLocalValue == 'ar') {

                                    bun_available;

                                } else if (getLocalValue == 'en') {

                                    bun_available ;
                                }
                            }

                            var tr_str = "<tr>" +
                                "<td align='center'>" + (x+1) + "</td>" +
                                "<td align='center'>" + id + "</td>" +
                                "<td align='center'>" + type_ar_en + "</td>" +
                                "<td align='center'>" + state + "</td>" +
                                "<td align='center'>" + state_clean + "</td>" +
                                "<td align='center'>" + price_per + "</td>" +
                                "<td align='center'>" + RoomView + "</td>" +
                                "<td align='center'>" + price + "</td>" +
                                "<td align='center'>" + MaximumPerson + "</td>" +
                                "<td align='center'>" + RoomSize + "</td>" +
                                "<td align='center'>" + BedNumber + "</td>" +
                                "<td align='center'>" + active + "</td>" +
                                "<td> "+bun_available +"</td>"+
                                "</tr>";

                            $("#tableshowdataroom tbody").append(tr_str);
                        }
                    }else{

                        var record = "";
                        if(getLocalValue == 'ar'){
                            record = "لا يوجد بيانات لهذا"
                        }
                        else if(getLocalValue == 'en'){
                            record = "No record found.";
                        }

                        var tr_str = "<tr>" +
                            "<td align='center' colspan='13'>"+ record +"</td>" +
                            "</tr>";

                        $("#tableshowdataroom tbody").append(tr_str);
                    }


                }
            });
        }

    </script>
@endsection
