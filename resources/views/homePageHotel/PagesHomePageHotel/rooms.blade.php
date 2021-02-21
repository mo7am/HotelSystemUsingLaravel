
@extends('HomePageHotel.LayoutsHomePageHotel.appHomePageHotel')


@section('contentHomePageHotel')
    <div class="hero-wrap" style="background-image: url({{URL::asset('designHomePageHotel/images/bg_1.jpg')}});">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
          	<div class="text">
	            <h2 class="breadcrumbs mb-2"><span class="mr-2"><a href="{{route('indexhome')}}">{{__('pageContent.home')}}</a></span> <span>{{__('pageContent.rooms')}}</span></h2>
	            <h1 class="mb-4 bread">{{__('pageContent.rooms')}}</h1>
            </div>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">







                <div class="col-lg-8">
                    <div class="row">

                        @foreach($allrooms as $room)
                            <div class="tableshowdata" id="searching_room">
		    			<div class="col-sm col-md-12 col-lg-12 ftco-animate">
		    				<div class="room">
		    					<a href="rooms-single.html" class="img d-flex justify-content-center align-items-center" style="background-image: url({{URL::asset('images/rooms/'.$room->image)}});">
		    						<div class="icon d-flex justify-content-center align-items-center">
		    							<span class="icon-search2"></span>
		    						</div>
		    					</a>
		    					<div class="text p-3 text-center">
		    						<h3 class="mb-3"><a href="{{url('/rooms_single')}}">{{$room->getRoomType()}}</a></h3>
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
                    <form>

                        <input style="visibility: hidden" type="text" value="{{$countAllRows}}" id="countAllRows">
                        <div  class="form-group col-md-12" >
                            <input  id='but_more_room' type="button" value="More" class="btn btn-primary  btn-block py-3 px-5 col-md-12">
                        </div>
                    </form>
		    	</div>


                <div class="col-lg-4 sidebar">
	      		<div class="sidebar-wrap bg-light ftco-animate">
	      			<h3 class="heading mb-4">{{__('pageContent.aside_search')}}</h3>
	      			<form action="{{route('SearchAvailableRooms')}}" method="GET">
	      				<div class="fields">

		              <div class="form-group">
		                <div class="select-wrap one-third">
	                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                            <select  value="{{ old('typeroom') }}" id='type_room_val' name="roomtype"  class="form-control">
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
                            <select  value="{{ old('adult') }}" id='adult_Val' name="adult"  class="form-control">
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
                          <input type="submit" value="{{__('pageContent.aside_search')}}" class="btn btn-primary py-3 px-5">
                      </div>
		            </div>
	            </form>
	      		</div>


	      		<div class="sidebar-wrap bg-light ftco-animate" style="display: none" id="show">
                    <h3 class="heading mb-4">{{__('pageContent.book_now')}}</h3>
                    <div class="row block-9">
                        <div class="col-md-12 order-md-last d-flex">
                            <form action="{{route('BookNow')}}" method="post" class="bg-white p-5 contact-form">
                                {{ csrf_field() }}

                                <div class="form-group row">
                                    <label  class="col-md-3 col-form-label">{{__('pageContent.name')}}</label>
                                    <div class="col-md-9">
                                        <input name="fname" type="text" class="form-control" id="inputname" required placeholder="{{__('pageContent.name')}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-md-3 col-form-label">{{__('pageContent.email')}}</label>
                                    <div class="col-md-9">
                                        <input name="email" type="email" class="form-control" id="inputemail" required placeholder="{{__('pageContent.email')}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-md-3 col-form-label">{{__('pageContent.password')}}</label>
                                    <div class="col-md-9">
                                        <input name="password" type="password" class="form-control" id="inputpassword" required placeholder="{{__('pageContent.password')}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-md-3 col-form-label">{{__('pageContent.check-in_date')}}</label>
                                    <div class="col-md-9">
                                        <input name="checkindate" type="text" class="form-control checkin_date" id="checkin_date" required placeholder="{{__('pageContent.check-in_date')}}">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label  class="col-md-3 col-form-label">{{__('pageContent.check-out_date')}}</label>
                                    <div class="col-md-9">
                                        <input name="checkoutdate" type="text" class="form-control checkin_date" id="checkin_date" required placeholder="{{__('pageContent.check-out_date')}}">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-md-3 col-form-label">{{__('pageContent.phone')}}</label>
                                    <div class="col-md-9">
                                        <input name="phone" type="text" class="form-control" id="inputphone" required placeholder="{{__('pageContent.phone')}}">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label  class="col-md-3 col-form-label">{{__('pageContent.select')}}</label>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <div class="select-wrap one-third">
                                                <select  value="{{ old('type') }}" id='adultVal' name="type"  class="form-control">
                                                    <option value="0">{{__('pageContent.chooseAnyType')}}</option>
                                                    <option value="6">{{__('pageContent.localguest')}}</option>
                                                    <option value="7">{{__('pageContent.foreignguist')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input  name="room_id" type="text" class="form-control" id="inputroomid" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="{{__('pageContent.book_now')}}" class="btn btn-primary py-3 px-5">
                                </div>
                            </form>

                        </div>


                    </div>
	      		</div>
	        </div>
		    </div>
    	</div>
    </section>


    <section class="instagram pt-5">
      <div class="container-fluid">
        <div class="row no-gutters justify-content-center pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2><span>{{__('pageContent.instagram')}}</span></h2>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-sm-12 col-md ftco-animate">
            <a href="{{URL::asset('images/insta-1.jpg')}}" class="insta-img image-popup" style="background-image: url({{URL::asset('designHomePageHotel/images/insta-1.jpg')}});">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md ftco-animate">
            <a href="{{URL::asset('images/insta-2.jpg')}}" class="insta-img image-popup" style="background-image: url({{URL::asset('designHomePageHotel/images/insta-2.jpg')}});">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md ftco-animate">
            <a href="{{URL::asset('images/insta-3.jpg')}}" class="insta-img image-popup" style="background-image: url({{URL::asset('designHomePageHotel/images/insta-3.jpg')}});">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md ftco-animate">
            <a href="{{URL::asset('images/insta-4.jpg')}}" class="insta-img image-popup" style="background-image: url({{URL::asset('designHomePageHotel/images/insta-4.jpg')}});">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md ftco-animate">
            <a href="{{URL::asset('images/insta-5.jpg')}}" class="insta-img image-popup" style="background-image: url({{URL::asset('designHomePageHotel/images/insta-5.jpg')}});">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>

    @endsection


@section('scripts')
    <script src="{{URL::asset('jquery-3.0.0.min.js')}}"></script>

    <script type="text/javascript">

        let skip =0;
        $('#but_more_room').click(function(){

            skip+=6;
            fetchPosts(skip);

        });


        function fetchPosts(skip){

            let countAllRows = Number($('#countAllRows').val().trim());
            $.ajax({
                url: '/showmorerooms/'+skip ,
                type: 'get',
                dataType: 'json',
                success: function(response){

                    let len = 0;
                    if(response['data'] != null){
                        len = response['data'].length;
                    }
                    if(skip <= countAllRows) {

                        if(len > 0){




                            for (let i = 0; i < len; i++) {

                                let id = response['data'][i].id;
                                let roomtype_id = response['data'][i].roomtype_id;
                                let state_id = response['data'][i].state_id;
                                let state_clean_id = response['data'][i].state_clean_id;
                                let price = response['data'][i].price;
                                let price_per = response['data'][i].price_per;
                                let MaximumPerson = response['data'][i].MaximumPerson;
                                let RoomSize = response['data'][i].RoomSize;
                                let BedNumber = response['data'][i].BedNumber;
                                let RoomView = response['data'][i].RoomView;
                                let image = response['data'][i].image;


                                let baseUrl = "{{ asset('images/rooms/') }}";
                                let imageForPost = baseUrl + "/" + image;

                                let type_ar_en = "";
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


                                let max = "";
                                if(getLocalValue == 'ar'){
                                    max = "عدد الاشخاص"
                                }
                                else if(getLocalValue == 'en'){
                                    max = "Max";
                                }
                                let size = "";
                                if(getLocalValue == 'ar'){
                                    size = "المساحة"
                                }
                                else if(getLocalValue == 'en'){
                                    size = "Size";
                                }

                                let view = "";
                                if(getLocalValue == 'ar'){
                                    view = "المنظر"
                                }
                                else if(getLocalValue == 'en'){
                                    view = "View";
                                }

                                let bed = "";
                                if(getLocalValue == 'ar'){
                                    bed = "عدد السراير"
                                }
                                else if(getLocalValue == 'en'){
                                    bed = "Bed";
                                }

                                let person = "";
                                if(getLocalValue == 'ar'){
                                    person = "شخص"
                                }
                                else if(getLocalValue == 'en'){
                                    person = "Persons";
                                }

                                let m2 = "";
                                if(getLocalValue == 'ar'){
                                    m2 = "م2"
                                }
                                else if(getLocalValue == 'en'){
                                    m2 = "m2";
                                }

                                let book = "";
                                let b = "";
                                if(getLocalValue == 'ar'){
                                    b = "إحجز الان"
                                    book = " <span class='icon-long-arrow-left'></span>" + b;
                                }
                                else if(getLocalValue == 'en'){
                                    book = "Book Now";
                                    book+=" <span class='icon-long-arrow-right'></span>";
                                }



                                let result_str =  " <div class='col-sm col-md-12 col-lg-12 ftco-animate'>" +
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
                                    "<button  room_id='"+id+"' style='background-color: white;border: none' class='book btn-custom'>"+book+" </button>" +
                                    " </div>"+
                                    "</div>"+
                                    " </div>";

                                $("#searching_room").append(result_str);
                            }
                        }else{

                        }
                    }else{
                        document.getElementById('but_more_room').style.visibility = 'hidden';
                    }

                }
            });
        }


        $(document).on('click' , '.book' ,function(){
            let getLocalValue = document.getElementById("getLocal").value;

            let room_id =  $(this).attr('room_id');



            $.ajax({
                url: '/checkavailabilityroom/'+room_id ,
                type: 'get',
                dataType: 'json',
                success: function(response){

                    if(response.Available3 == true){

                        if (getLocalValue == 'ar'){
                            alert(response.successAvailable3_ar);
                            alert("انت اخترت الغرفه رقم " + " " +room_id);
                            document.getElementById("show").style.display = "block";
                            document.getElementById("inputroomid").value = room_id;


                        }else if(getLocalValue == 'en'){

                            alert(response.successAvailable3_en);
                            alert("You Select Room Number " +room_id);
                            document.getElementById("show").style.display = "block";
                            document.getElementById("inputroomid").value = room_id;

                        }

                    }else {
                        if (response.notAvailable1 == true) {
                            if (response.data == 1) {
                                alert(response.successNotAvailable1 + " " + response.data + " day");
                                $('#inputroomid').val('');
                                document.getElementById("show").style.display = "none";
                            } else {
                                alert(response.successNotAvailable1 + " " + response.data + " days");
                                $('#inputroomid').val('');
                                document.getElementById("show").style.display = "none";
                            }
                        } else if (response.Available1 == true) {

                            if (getLocalValue == 'ar') {

                                alert(response.successAvailable1_ar);
                                alert("انت اخترت الغرفه رقم " + " " + room_id);
                                document.getElementById("show").style.display = "block";
                                document.getElementById("inputroomid").value = room_id;

                            } else if (getLocalValue == 'en') {

                                alert(response.successAvailable1_en);
                                alert("You Select Room Number " + room_id);
                                document.getElementById("show").style.display = "block";
                                document.getElementById("inputroomid").value = room_id;

                            }

                        } else if (response.notAvailable2 == true) {
                            if (response.data == 1) {
                                alert(response.successNotAvailable2 + " " + response.data + " day");
                                $('#inputroomid').val('');
                                document.getElementById("show").style.display = "none";
                            } else {
                                alert(response.successNotAvailable2 + " " + response.data + " days");
                                $('#inputroomid').val('');
                                document.getElementById("show").style.display = "none";
                            }
                        } else if (response.Available2 == true) {

                            if (getLocalValue == 'ar') {

                                alert(response.successAvailable2_ar);
                                alert("انت اخترت الغرفه رقم " + " " + room_id);
                                document.getElementById("show").style.display = "block";
                                document.getElementById("inputroomid").value = room_id;

                            } else if (getLocalValue == 'en') {

                                alert(response.successAvailable2_en);
                                alert("You Select Room Number " + room_id);
                                document.getElementById("show").style.display = "block";
                                document.getElementById("inputroomid").value = room_id;

                            }
                        }
                    }
                }
            });

        });


        $('#but_search_Available_Room').click(function(){

            let roomtype = Number($('#type_room_val').val().trim());
            let adult = Number($('#adult_Val').val().trim());
            let checkin = $('#checkout_val').val().trim();
            let checkout = $('#checkout_val').val().trim();



            if(roomtype > 0){
                fetchRooms(roomtype , adult);
            }else if(adult > 0){
                fetchRooms(roomtype ,adult);
            }else if(roomtype > 0 && adult > 0)
            {
                fetchRooms(roomtype ,adult);
            }
            else {
                fetchRooms(0);
            }

        });


        function fetchRooms(roomtype , adult ){
            var roomtype = Number($('#type_room_val').val().trim());
            var adult = Number($('#adult_Val').val().trim());
            var checkin = $('#checkout_val').val().trim();
            var checkout = $('#checkout_val').val().trim();

            let getLocalValue = document.getElementById("getLocal").value;
            $.ajax({
                url: 'getAvailableRoom/'+roomtype +'/'+ adult,
                type: 'get',
                dataType: 'json',
                success: function(response){

                    let len = 0;
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

                            $("#searching_room").append(result_str);
                        }
                    }else{

                    }

                }
            });
        }

    </script>
@endsection
