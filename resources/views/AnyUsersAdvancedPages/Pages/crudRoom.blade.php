@extends('anyUsersAdvancedPages.layouts.content')

@section('contentAnyUsersAdvancedPages')

    <section id="pageContent" class="content" >
        <div class="row">
            <div  class="col-md-12 animate-box " data-animate-effect="fadeInLeft">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#Allrooms" data-toggle="tab">{{__('pageContent.allroom')}}</a></li>
                        <li><a href="#addnew" data-toggle="tab">{{__('pageContent.addnew')}}</a></li>
                        <li><a href="#edit" data-toggle="tab">{{__('pageContent.edit')}}</a></li>
                        <li><a href="#addlanguage" data-toggle="tab">{{__('pageContent.addlanguage')}}</a></li>
                    </ul>
                    <div class="tab-content">

                        <div class=" tab-pane" id="addlanguage">
                            <div class="col-md-12" style="margin-top: 10px;">
                                <div class="row">
                                    <div class="col-md-12  ftco-animate">
                                        <form id="posttranslate" class="postsTranslate"  >
                                        {{ csrf_field() }}
                                            <br><br>
                                            <div class="input-group col-md-12"  >
                                                <input style="display: none" id="roomtranslate_id" value="{{ old('id') }}" type="text" class="form-control form-control-user" name="id" >
                                                <br>
                                                <span class="input-group-addon"><i class="fa   fa-child"></i></span>

                                                <input value="{{ old('price_per') }}" type="text" class="form-control form-control-user" name="price_per" placeholder="{{__('pageContent.price_per_placeholder')}}">
                                                <input value="{{ old('price_per') }}" type="text" class="form-control form-control-user" id="price_per_language" readonly placeholder="{{__('pageContent.price_per_placeholder')}}">

                                                <br>
                                                <span class="input-group-addon"><i class="fa fa-simplybuilt"></i></span>

                                                <input value="{{ old('RoomView') }}" type="text" class="form-control form-control-user" name="RoomView" placeholder="{{__('pageContent.RoomView_placeholder')}}">
                                                <input value="{{ old('RoomView') }}" type="text" class="form-control form-control-user" id="room_view_language" readonly placeholder="{{__('pageContent.price_per_placeholder')}}">


                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <input type="submit" id="add_roomTranslate" class="btn btn-primary "  value="{{__('pageContent.add')}}" >

                                            </div>
                                        </form>
                                    </div>
                            </div>
                            </div>
                        </div>
                        <div class="active tab-pane" id="Allrooms">
                            <div class="col-md-12" style="margin-top: 10px;">
                                <div class="row">
                                    <div class="col-md-12  ftco-animate">
                                        <div class="box">
                                            <div class="box-header">

                                                <div class="col-md-12 ">
                                                    <input type='text' id='search' name='search' placeholder='Enter userid '><input type='button' value='SearchById' id='but_search'>
                                                    <input type='button' value='FetchAllRecordsById' id='but_fetchall'>
                                                    <input type='button' value='FetchByLike' id='but_fetchByLike'>
                                                </div>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="table-responsive">
                                                <table  id="tableshowdata" class="table table-bordered table-striped" id="dataTable">
                                                    <thead>
                                                    <tr>
                                                        <th >{{__('pageContent.no')}}</th>
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
                                                        <th>{{__('pageContent.image')}}</th>
                                                        <th>{{__('pageContent.action')}}</th>
                                                    </tr>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @isset($allrooms)
                                                    <?php  $i=1; ?>
                                                    @foreach ($allrooms as $rooms)
                                                        <tr class="room_record{{$rooms->id}}" id="record_{{$rooms->id}}">
                                                            <td  id="number">{{ $i++ }}</td>
                                                            <td id="nn">{{ $rooms->getRoomType()}}</td>
                                                            <td id="nn"> {{ $rooms->getStatus()}}</td>
                                                            <td id="nn"> {{ $rooms->getStatusClean()}}</td>
                                                            @if(app()->getLocale() == 'ar')
                                                                @if($rooms->price_per == "" ||  $rooms->RoomView =="")
                                                                    <td style="color:red " id="nn"> ضف لغه لو احببت</td>
                                                                    <td style="color: red" id="nn"> ضف لغه لو احببت</td>
                                                                @else
                                                            <td id="nn"> {{ $rooms->price_per}}</td>
                                                            <td id="nn"> {{ $rooms->RoomView}}</td>
                                                                @endif
                                                                @elseif(app()->getLocale() == 'en')
                                                                @if($rooms->price_per == "" ||  $rooms->RoomView =="")
                                                                    <td style="color: red" id="nn"> Add Lang If You Want</td>
                                                                    <td style="color: red" id="nn"> Add Lang If You Want</td>
                                                                @else
                                                                    <td id="nn"> {{ $rooms->price_per}}</td>
                                                                    <td id="nn"> {{ $rooms->RoomView}}</td>
                                                                @endif
                                                                @endif
                                                            <td id="nn"> {{ $rooms->price}}</td>
                                                            <td id="nn"> {{ $rooms->MaximumPerson}}</td>
                                                            <td id="nn"> {{ $rooms->RoomSize}}</td>
                                                            <td id="nn"> {{ $rooms->BedNumber}}</td>
                                                            <td id="nn"> {{$rooms->getactive()}}</td>
                                                            <td id="nn">  <img  id="" style=" width: 100px ;height: 100px"  src="{{URL::asset('images/rooms/'.$rooms->image)}}" alt="room Avatar">
                                                            </td>

                                                            <td>
                                                                <button class='edit btn btn-info btn-sm' roomedit_num="{{$i-1}}" roomedit_id="{{ $rooms->id}}"  roomedit_price_per="{{ $rooms->price_per}}" roomedit_RoomView="{{ $rooms->RoomView}}" roomedit_price="{{ $rooms->price}}" roomedit_maxperson="{{ $rooms->MaximumPerson}}" roomedit_roomsize="{{ $rooms->RoomSize}}" roomedit_bednumber="{{ $rooms->BedNumber}}" roomedit_image="{{ $rooms->image}}">  {{__('pageContent.edit')}}
                                                                </button>
                                                                <button room_id="{{ $rooms->id}}" class='room_delete btn btn-danger btn-sm' >  {{__('pageContent.delete')}} </button>
                                                                @if($rooms->is_active == 1)
                                                                <button room_num_active="{{$i-1}}" room_id_active="{{ $rooms->id}}" class='room_activation btn btn-danger btn-sm' >  {{__('pageContent.not_activation')}} </button>
                                                                    @else
                                                                    <button room_num_active="{{$i-1}}"  room_id_active="{{ $rooms->id}}" class='room_activation btn btn-danger btn-sm' >  {{__('pageContent.activation')}} </button>
@endif
                                                                @if($rooms->price_per == "" ||  $rooms->RoomView =="")
                                                                <button room_num_language="{{$i-1}}" room_id_language="{{ $rooms->id}}" class='add_room_Language btn btn-info btn-sm' >  {{__('pageContent.addlanguage')}} </button>
                                                                @endif
                                                            </td>


                                                        </tr>
                                                    @endforeach

                                                        @endisset
                                                    </tbody>

                                                </table>


                                            </div>
                                        {{$allrooms->links()}}
                                            <!-- /.box-body -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane" id="addnew">

                            <form id="postData" class="postsData"  >
                                {{ csrf_field() }}
                                <div class="input-group col-md-6" >
                                    <!-- SELECT2 EXAMPLE -->
                                    <div class="box box-default ">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">{{__('pageContent.select')}}</h3>

                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                                            </div>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body ">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>{{__('pageContent.roomtype')}}</label>
                                                    <div class="form-group col-md-6">
                                                        <select style="width: 100%;" class="form-control " id="mySelect" value="{{ old('type') }}" name="type" >
                                                            <option id="anytype" value="">{{__('pageContent.chooseAnyType')}}</option>
                                                            @foreach($allroomType as $allroomtypes)
                                                            <option id="Receptionistid" value="{{$allroomtypes->type}}">{{$allroomtypes->type}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                     @error('type')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                    </div>
                                    <!-- /.box -->
                                </div>
                                </br>
                                <div class="input-group col-md-6" >
                                    <div class="form-group mt-1">
                                        <input type="checkbox" name="is_active" id="switcherColor4" class="switchery" data-color="success" checked />
                                        <label for="switcherColor4" class="card-title m1-1"> {{__('pageContent.status')}}</label>
                                        @error('is_active')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <span class="input-group-addon"><i class="fa fa-cc-visa"></i></span>
                                    <input value="{{ old('price') }}" type="text" class="form-control form-control-user" name="price" placeholder="{{__('pageContent.price_placeholder')}}">

                                </div>

                                <br>
                                <div class="input-group col-md-6" >
                                    <span class="input-group-addon"><i class="fa   fa-child"></i></span>
                                    <input value="{{ old('MaximumPerson') }}" type="text" class="form-control form-control-user" name="MaximumPerson" placeholder="{{__('pageContent.MaximumPerson_placeholder')}}">
<br>
                                    <span class="input-group-addon"><i class="fa fa-simplybuilt"></i></span>
                                    <input value="{{ old('RoomSize') }}" type="text" class="form-control form-control-user" name="RoomSize" placeholder="{{__('pageContent.RoomSize_placeholder')}}">

                                </div>
                                <br>
                                <div class="input-group col-md-6"  >
                                    <span class="input-group-addon"><i class="fa   fa-child"></i></span>
                                    <input value="{{ old('price_per') }}" type="text" class="form-control form-control-user" name="price_per" placeholder="{{__('pageContent.price_per_placeholder')}}">
                                    <br>
                                    <span class="input-group-addon"><i class="fa fa-simplybuilt"></i></span>
                                    <input value="{{ old('RoomView') }}" type="text" class="form-control form-control-user" name="RoomView" placeholder="{{__('pageContent.RoomView_placeholder')}}">

                                </div>
                                <br>
                                <div class="input-group col-md-6" >
                                    <span class="input-group-addon"><i class="fa fa-university"></i></span>
                                    <input value="{{ old('BedNumber') }}" type="text" class="form-control form-control-user" name="BedNumber" placeholder="{{__('pageContent.BedNumber_placeholder')}}">

                                </div>
                                <br>
                                <div class="input-group col-md-6" >
                                <div style="overflow-x:hidden ; overflow-y:scroll; white-space: nowrap ; height: 350px;display:none" id="showScroll">
                                    <img class="box " src="" id="imagePreview" />
                                </div>
                                <div class="form-group">
                                    <label class="btn btn-default">
                                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                                        {{__('pageContent.photo_video')}} <input class="form-control" name="image" accept="image/jpeg , image/png "  onchange="ShowImagePreview(this, document.getElementById('imagePreview'))" type="file" style="display: none !important;">
                                    </label>
                                </div>
                                </div>

                                <div class="form-group">
                                    <input type="submit" id="add_room" class="btn btn-primary "  value="{{__('pageContent.add')}}" >

                                </div>


</form>
                        </div>


                        <div class=" col-md-12 tab-pane" >

                        </div>
                        <div class=" col-md-12 tab-pane" id="edit">
                            <form id="editData" class="typeroom" >
                                {{ csrf_field() }}

                                <div class="input-group col-md-6" style="display: none">
                                    <span class="input-group-addon"><i class="fa   fa-child"></i></span>
                                    <input id="room_id" value="{{ old('id') }}" type="text" class="form-control form-control-user" name="id" >
                                    <br>
                                    <span class="input-group-addon"><i class="fa fa-simplybuilt"></i></span>
                                    <input id="num" value="{{ old('number') }}" type="text" class="form-control form-control-user" name="number" >

                                </div>
                                <br>
                                <div class="input-group col-md-6 translated_attribute" id="">
                                    <span class="input-group-addon"><i class="fa   fa-child"></i></span>
                                    <input id="Price_per" value="{{ old('price_per') }}" type="text" class="form-control form-control-user " name="price_per" >
                                    <br>
                                    <span class="input-group-addon"><i class="fa fa-simplybuilt"></i></span>
                                    <input id="roomview" value="{{ old('RoomView') }}" type="text" class="form-control form-control-user" name="RoomView" >

                                </div>
                                <br>
                                <div class="input-group col-md-6" >

                                    <span class="input-group-addon"><i class="fa fa-cc-visa"></i></span>
                                    <input id="Price" value="{{ old('price') }}" type="text" class="form-control form-control-user" name="price" placeholder="price">

                                </div>

                                <br>
                                <div class="input-group col-md-6" >
                                    <span class="input-group-addon"><i class="fa   fa-child"></i></span>
                                    <input id="maximumPerson" value="{{ old('MaximumPerson') }}" type="text" class="form-control form-control-user" name="MaximumPerson" placeholder="Maximum Person">
                                    <br>
                                    <span class="input-group-addon"><i class="fa fa-simplybuilt"></i></span>
                                    <input id="roomSize" value="{{ old('RoomSize') }}" type="text" class="form-control form-control-user" name="RoomSize" placeholder="Room Size">

                                </div>
                                <br>
                                <div class="input-group col-md-6" >
                                    <span class="input-group-addon"><i class="fa fa-university"></i></span>
                                    <input id="bedNumber" value="{{ old('BedNumber') }}" type="text" class="form-control form-control-user" name="BedNumber" placeholder="Number Of Bed">

                                </div>
                                <br>
                                <div class="input-group col-md-6" >
                                    <div style="overflow-x:hidden ; overflow-y:scroll; white-space: nowrap ; height: 350px;" id="showScroll2">
                                        <img  class="box edit_imagePreview"  id="imagePreview_edit" />
                                    </div>
                                    <div class="form-group">
                                        <label class="btn btn-default">
                                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                                            Photo/Video <input class="form-control" name="image" accept="image/jpeg , image/png " onchange="ShowImagePreview2(this, document.getElementById('imagePreview_edit'))" type="file" style="display: none !important;">
                                        </label>
                                    </div>
                                </div>
                                <input style="display:none;" id="img" value="{{ old('img') }}" type="text" class="form-control form-control-user" name="img" placeholder="img">


                                <div class="form-group">
                                    <input type="submit" id="edit_room" class="btn btn-primary "  value="{{__('pageContent.edit')}}" >

                                </div>

                            </form>
            </div>


            <div class="modal modal-info fade" id="show">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Info Modal</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">ID :</label>
                                <b id="showid"/>
                            </div>
                            <div class="form-group">
                                <label for="">First Name :</label>
                                <b id="showfname"/>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->


        </div>
    </section>


@endsection
@section('scripts')
    <script src="{{URL::asset('jquery-3.0.0.min.js')}}"></script>


    <script type="text/javascript">




        function ShowImagePreview(imageUploader, previewImage) {
            document.getElementById("showScroll").style.display = "block";
            if (imageUploader.files && imageUploader.files[0]) {

                var reader = new FileReader();
                reader.onload = function (e) {
                    $(previewImage).attr('src', e.target.result);
                }
                reader.readAsDataURL(imageUploader.files[0]);
            }
        }

        function ShowImagePreview2(imageUploader, previewImage) {
            document.getElementById("showScroll2").style.display = "block";
            if (imageUploader.files && imageUploader.files[0]) {

                var reader = new FileReader();
                reader.onload = function (e) {
                    $(previewImage).attr('src', e.target.result);
                }
                reader.readAsDataURL(imageUploader.files[0]);
            }
        }


        $('#postData').on('submit', function(event){
            event.preventDefault();
            var getLocalValue = document.getElementById("getLocalValue").value;
            var allTableData = document.getElementById("tableshowdata");
            var totalNumbeOfRows = allTableData.rows.length;
            var newqalq = 1;
            newqalq = newqalq + totalNumbeOfRows;
            var room_num = $(this).attr('room_num_active');
            $.ajax({
                type: 'post',
                enctype : 'multipart/form-data',
                url : "{{ route('Manager.Room.Store')}}"  ,
                data: new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success : function(data){

                    if(data.result == true)
                    {
                        $('ul.nav.nav-tabs a:eq(0)').html('All Rooms Type');
                      //  $('ul.nav.nav-tabs a:eq(0)').tab('show');
                        $('ul.nav.nav-tabs a:eq(1)').html('Add New ');
                        $('ul.nav.nav-tabs a:eq(2)').html('Edit ');



                        var type_ar_en = "";
                         if(getLocalValue == 'ar'){


if( data.data.roomtype_id == 1 ){
    type_ar_en = "غرفة كلاسيكية";
}else if (data.data.roomtype_id == 2){
    type_ar_en = "غرفة فاخرة";
}else if (data.data.roomtype_id == 3){
    type_ar_en = "غرفه ديلوكس";
}else if (data.data.roomtype_id == 4){
    type_ar_en = "غرفه متميوة";
}else if (data.data.roomtype_id == 5){
    type_ar_en = "جناح";
}else if (data.data.roomtype_id == 6){
    type_ar_en = "غرفة عائليه";
}

}
else if(getLocalValue == 'en') {
                             if (data.data.roomtype_id == 1) {
                                 type_ar_en = "Classic Room";
                             } else if (data.data.roomtype_id == 2) {
                                 type_ar_en = "Luxury Room ";
                             } else if (data.data.roomtype_id == 3) {
                                 type_ar_en = "Deluxe Room ";
                             } else if (data.data.roomtype_id == 4) {
                                 type_ar_en = " Superior Room";
                             } else if (data.data.roomtype_id == 5) {
                                 type_ar_en = "Suite";
                             } else if (data.data.roomtype_id == 6) {
                                 type_ar_en = " Family Room";
                             }

                         }
            var state = "";
            if(getLocalValue == 'ar'){
            if( data.data.state_id== 1) {
                state =  'فارغة';

            }else if(data.data.state_id== 2)
            {
                state =  'ممتلئة';
            }
        }
        else if(getLocalValue == 'en'){
            if( data.data.state_id== 1) {
                state =  'Empty';

            }else if(data.data.state_id== 2)
            {
                state =  'Full';
            }
        }

         var state_clean = "";



if(getLocalValue == 'ar'){
    if( data.data.state_clean_id== 6) {
        state_clean =  'غير نظيفة';

            }else if(data.data.state_clean_id== 5)
            {
                state_clean =  'نظيفة';
            }
}
else if(getLocalValue == 'en'){
    if( data.data.state_clean_id== 6) {
        state_clean =  'Dirty';

            }else if(data.data.state_clean_id== 5)
            {
                state_clean =  'Clean';
            }
}

var active = "";

if(getLocalValue == 'ar'){
            if( data.data.is_active== 1) {
                active =  'مفعل';

            }else if(data.data.is_active== 0)
            {
                active =  'غير مفعل';
            }
        }
        else if(getLocalValue == 'en'){
            if( data.data.is_active== 1) {
                active =  'active';

            }else if(data.data.is_active== 0)
            {
                active =  'Not Active';
            }
        }


                        var botton_edit = "";

                        if(getLocalValue == 'ar'){

                            botton_edit =  'تعديل';

                        }
                        else if(getLocalValue == 'en'){

                            botton_edit =  'Edit';

                        }
                        var botton_delete = "";

                        if(getLocalValue == 'ar'){

                            botton_delete =  'حذف';

                        }
                        else if(getLocalValue == 'en'){

                            botton_delete =  'Delete';

                        }

                        var but_active = "";
                        if(getLocalValue == 'ar'){

                            if( data.data.is_active== 1) {
                                but_active =  'عدم تفعيل';

                            }else if(data.data.is_active== 0)
                            {
                                but_active =  'تفعيل';
                            }

                        }
                        else if(getLocalValue == 'en'){

                            if( data.data.is_active== 1) {
                                but_active =  'Not Active';

                            }else if(data.data.is_active== 0)
                            {
                                but_active =  'Active';
                            }

                        }

                        var img = '/images/rooms/' + data.data.image;
                        var imag = " <img style=' width: 100px ;height: 100px'  src='"+img+"' class='row'>";
                           $('#tableshowdata').append("<tr>"+
                            "<td>" + totalNumbeOfRows + "</td>"+
                            "<td>" + type_ar_en + "</td>"+
                            "<td>" + state + "</td>"+
                            "<td>" + state_clean + "</td>"+
                               "<td>" + data.data.price_per + "</td>"+
                               "<td>" + data.data.RoomView + "</td>"+
                            "<td>" + data.data.price + "</td>"+
                            "<td>" + data.data.MaximumPerson + "</td>"+
                            "<td>" + data.data.RoomSize + "</td>"+
                            "<td>" + data.data.BedNumber + "</td>"+
                            "<td>" + active + "</td>"+
                            "<td>" + imag + "</td>"+
                            "<td><button class='edit btn btn-info btn-sm' roomedit_num='"+totalNumbeOfRows+"' roomedit_id='"+data.data.id+"' roomedit_price_per='"+data.data.price_per+"' roomedit_RoomView='"+data.data.RoomView+"' roomedit_price='"+data.data.price+"' roomedit_maxperson='"+data.data.MaximumPerson+"' roomedit_roomsize='"+data.data.RoomSize+"' roomedit_bednumber='"+data.data.BedNumber+"' roomedit_image='"+data.data.image+"' > "+botton_edit+"</button>" +
                            "<button room_id='"+data.data.id+"' class='room_delete btn btn-danger btn-sm' > "+botton_delete+" </button> " +
                             "<button room_num_active='"+totalNumbeOfRows+"' room_id_active='"+data.data.id+"' class='room_activation btn btn-danger btn-sm' > "+but_active+"  </button>"+

                        "</td>"+

                            "</tr>");



                    }else {
                        alert(data.error)
                    }

                },
                error : function (reject){

                },
            });

        });

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


        $('#posttranslate').on('submit', function(event){
            event.preventDefault();
            var getLocalValue = document.getElementById("getLocalValue").value;
            var allTableData = document.getElementById("tableshowdata");
            var totalNumbeOfRows = allTableData.rows.length;
            var newqalq = 1;
            newqalq = newqalq + totalNumbeOfRows;
            var room_num = $(this).attr('room_num_active');
            $.ajax({
                type: 'post',
                enctype : 'multipart/form-data',
                url : "{{ route('Manager.Room.StoreLanguage')}}"  ,
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success : function(data){

                    if(data.result == true)
                    {
                        alert(data.data.RoomView);
                        $('ul.nav.nav-tabs a:eq(0)').html('All Rooms Type');
                      //  $('ul.nav.nav-tabs a:eq(0)').tab('show');
                        $('ul.nav.nav-tabs a:eq(1)').html('Add New ');
                        $('ul.nav.nav-tabs a:eq(2)').html('Edit ');
                        $('ul.nav.nav-tabs a:eq(3)').html('Add Language ');

                        var type_ar_en = "";
                        if(getLocalValue == 'ar'){


                            if( data.data.roomtype_id == 1 ){
                                type_ar_en = "غرفة كلاسيكية";
                            }else if (data.data.roomtype_id == 2){
                                type_ar_en = "غرفة فاخرة";
                            }else if (data.data.roomtype_id == 3){
                                type_ar_en = "غرفه ديلوكس";
                            }else if (data.data.roomtype_id == 4){
                                type_ar_en = "غرفه متميوة";
                            }else if (data.data.roomtype_id == 5){
                                type_ar_en = "جناح";
                            }else if (data.data.roomtype_id == 6){
                                type_ar_en = "غرفة عائليه";
                            }

                        }
                        else if(getLocalValue == 'en') {
                            if (data.data.roomtype_id == 1) {
                                type_ar_en = "Classic Room";
                            } else if (data.data.roomtype_id == 2) {
                                type_ar_en = "Luxury Room ";
                            } else if (data.data.roomtype_id == 3) {
                                type_ar_en = "Deluxe Room ";
                            } else if (data.data.roomtype_id == 4) {
                                type_ar_en = " Superior Room";
                            } else if (data.data.roomtype_id == 5) {
                                type_ar_en = "Suite";
                            } else if (data.data.roomtype_id == 6) {
                                type_ar_en = " Family Room";
                            }

                        }
                        var state = "";
                        if(getLocalValue == 'ar'){
                            if( data.data.state_id== 1) {
                                state =  'فارغة';

                            }else if(data.data.state_id== 2)
                            {
                                state =  'ممتلئة';
                            }
                        }
                        else if(getLocalValue == 'en'){
                            if( data.data.state_id== 1) {
                                state =  'Empty';

                            }else if(data.data.state_id== 2)
                            {
                                state =  'Full';
                            }
                        }

                        var state_clean = "";



                        if(getLocalValue == 'ar'){
                            if( data.data.state_clean_id== 6) {
                                state_clean =  'غير نظيفة';

                            }else if(data.data.state_clean_id== 5)
                            {
                                state_clean =  'نظيفة';
                            }
                        }
                        else if(getLocalValue == 'en'){
                            if( data.data.state_clean_id== 6) {
                                state_clean =  'Dirty';

                            }else if(data.data.state_clean_id== 5)
                            {
                                state_clean =  'Clean';
                            }
                        }

                        var active = "";

                        if(getLocalValue == 'ar'){
                            if( data.data.is_active== 1) {
                                active =  'مفعل';

                            }else if(data.data.is_active== 0)
                            {
                                active =  'غير مفعل';
                            }
                        }
                        else if(getLocalValue == 'en'){
                            if( data.data.is_active== 1) {
                                active =  'active';

                            }else if(data.data.is_active== 0)
                            {
                                active =  'Not Active';
                            }
                        }


                        var botton_edit = "";

                        if(getLocalValue == 'ar'){

                            botton_edit =  'تعديل';

                        }
                        else if(getLocalValue == 'en'){

                            botton_edit =  'Edit';

                        }
                        var botton_delete = "";

                        if(getLocalValue == 'ar'){

                            botton_delete =  'حذف';

                        }
                        else if(getLocalValue == 'en'){

                            botton_delete =  'Delete';

                        }


                        var but_active = "";
                        if(getLocalValue == 'ar'){

                            if( data.data.is_active== 1) {
                                but_active =  'عدم تفعيل';

                            }else if(data.data.is_active== 0)
                            {
                                but_active =  'تفعيل';
                            }

                        }
                        else if(getLocalValue == 'en'){

                            if( data.data.is_active== 1) {
                                but_active =  'Not Active';

                            }else if(data.data.is_active== 0)
                            {
                                but_active =  'Active';
                            }

                        }




                        var img = '/images/rooms/' + data.data.image;
                        var imag = " <img style=' width: 100px ;height: 100px'  src='"+img+"' class='row'>";
                        $('.room_record' + data.data.id).replaceWith(" "+
                            "<tr class='room_record" + data.data.id + "'>"+
                            "<td>" + document.getElementById("num").value + "</td>"+
                            "<td>" + type_ar_en + "</td>"+
                            "<td>" + state + "</td>"+
                            "<td>" + state_clean + "</td>"+
                            "<td>" + data.data.price_per + "</td>"+
                            "<td>" + data.data.RoomView + "</td>"+
                            "<td>" + data.data.price + "</td>"+
                            "<td>" + data.data.MaximumPerson + "</td>"+
                            "<td>" + data.data.RoomSize + "</td>"+
                            "<td>" + data.data.BedNumber + "</td>"+
                            "<td>" + active + "</td>"+
                            "<td>" + imag + "</td>"+
                            "<td><button class='edit btn btn-info btn-sm' roomedit_num='"+document.getElementById("num").value+"' roomedit_id='"+data.data.id+"' roomedit_price_per='"+data.data.price_per+"' roomedit_RoomView='"+data.data.RoomView+"' roomedit_price='"+data.data.price+"' roomedit_maxperson='"+data.data.MaximumPerson+"' roomedit_roomsize='"+data.data.RoomSize+"' roomedit_bednumber='"+data.data.BedNumber+"' roomedit_image='"+data.data.image+"' > "+botton_edit+"</button>" +
                            " <button room_id='"+data.data.id+"' class='room_delete btn btn-danger btn-sm' > "+botton_delete+" </button> " +
                            "  <button room_num_active='"+document.getElementById("num").value+"'  room_id_active='"+data.data.id+"' class='room_activation btn btn-danger btn-sm' > "+but_active+"  </button>"+

                            " </td>"+

                            "</tr>");



                    }else {
                        alert(data.error)
                    }

                },
                error : function (reject){

                },
            });

        });


        $(document).on('click' , '.room_delete' ,function(e){
            if (confirm('Are you sure to delete this record ?') == true) {
                e.preventDefault();
                var room_id = $(this).attr('room_id');
                $.ajax({
                    type: 'post',
                    url: "{{ route('Manager.Room.Delete')}}",
                    data: {
                        '_token': "{{csrf_token()}} ",
                        'id': room_id,
                    },

                    success: function (data) {
                        $('ul.nav.nav-tabs a:eq(0)').html('All Rooms');
                       // $('ul.nav.nav-tabs a:eq(0)').tab('show');
                        $('ul.nav.nav-tabs a:eq(1)').html('Add New ');
                        $('ul.nav.nav-tabs a:eq(2)').html('Edit ');
                        $("#record_" + room_id).remove();
                    },
                    error: function (reject) {

                    },
                });
            }

        });



        $(document).on('click', '.add_room_Language', function() {


            var id = $(this).attr('room_id_language');

            $.ajax({
                url: 'Room/getLanguage/'+id,
                type: 'get',
                dataType: 'json',
                success: function(response){
                    $('ul.nav.nav-tabs a:eq(0)').html('All Rooms');
                    $('ul.nav.nav-tabs a:eq(1)').html('Add New ');
                    $('ul.nav.nav-tabs a:eq(2)').html('Edit ');
                    $('ul.nav.nav-tabs a:eq(3)').html('Add Language ');
                    //$('ul.nav.nav-tabs a:eq(3)').tab('show');

                    var len = 0;
                    var room_id = 0 ;
                    var price_per = "";
                    var RoomView = "" ;
                    if(response['data'] != null){
                        len = response['data'].length;
                    }
                    if(len > 0) {
                        for (var i = 0; i < len; i++) {
                            room_id = response['data'][i].room_id;
                            price_per = response['data'][i].price_per;
                            RoomView = response['data'][i].RoomView;
                        }
                    }
                    document.getElementById("roomtranslate_id").value = room_id;
                    document.getElementById("price_per_language").value = price_per;
                    document.getElementById("room_view_language").value = RoomView;
                },
                error: function (reject) {

                },
            });

        });



        $(document).on('click', '.edit', function() {



            document.getElementById("num").value = $(this).attr('roomedit_num');
            document.getElementById("room_id").value = $(this).attr('roomedit_id');
            document.getElementById("Price").value = $(this).attr('roomedit_price');
            document.getElementById("img").value = $(this).attr('roomedit_image');
            document.getElementById("maximumPerson").value = $(this).attr('roomedit_maxperson');
            if($(this).attr('roomedit_price_per') == "" && $(this).attr('roomedit_RoomView') == "") {
               // document.getElementByClassName('translated_attribute').style.display = 'none';
                $('.translated_attribute').attr('style', 'display:none') ;
            }else {
                $('.translated_attribute').attr('style', 'display:display') ;
                document.getElementById("Price_per").value = $(this).attr('roomedit_price_per');
                document.getElementById("roomview").value = $(this).attr('roomedit_RoomView');
            }
            document.getElementById("roomSize").value = $(this).attr('roomedit_roomsize');
            document.getElementById("bedNumber").value = $(this).attr('roomedit_bednumber');
            $('.edit_imagePreview').attr('src', '/images/rooms/'+ $(this).attr('roomedit_image'));
        });






        $('#editData').on('submit', function(event){
            event.preventDefault();
            var getLocalValue = document.getElementById("getLocalValue").value;
            var allTableData = document.getElementById("tableshowdata");
            var totalNumbeOfRows = allTableData.rows.length;
            var newqalq = 1;
            newqalq = newqalq + totalNumbeOfRows;
            var room_num = $(this).attr('room_num_active');
            $.ajax({
                type: 'post',
                enctype : 'multipart/form-data',
                url : "{{ route('Manager.Room.Update')}}"  ,
                data: new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success : function(data){

                    if(data.result == true)
                    {
                       /*
                        $('ul.nav.nav-tabs a:eq(0)').html('All Rooms Type');
                        $('ul.nav.nav-tabs a:eq(0)').tab('show');
                        $('ul.nav.nav-tabs a:eq(1)').html('Add New ');
                        $('ul.nav.nav-tabs a:eq(2)').html('Edit ');

                        */

                        var type_ar_en = "";
                        if(getLocalValue == 'ar'){


                            if( data.data.roomtype_id == 1 ){
                                type_ar_en = "غرفة كلاسيكية";
                            }else if (data.data.roomtype_id == 2){
                                type_ar_en = "غرفة فاخرة";
                            }else if (data.data.roomtype_id == 3){
                                type_ar_en = "غرفه ديلوكس";
                            }else if (data.data.roomtype_id == 4){
                                type_ar_en = "غرفه متميوة";
                            }else if (data.data.roomtype_id == 5){
                                type_ar_en = "جناح";
                            }else if (data.data.roomtype_id == 6){
                                type_ar_en = "غرفة عائليه";
                            }

                        }
                        else if(getLocalValue == 'en') {
                            if (data.data.roomtype_id == 1) {
                                type_ar_en = "Classic Room";
                            } else if (data.data.roomtype_id == 2) {
                                type_ar_en = "Luxury Room ";
                            } else if (data.data.roomtype_id == 3) {
                                type_ar_en = "Deluxe Room ";
                            } else if (data.data.roomtype_id == 4) {
                                type_ar_en = " Superior Room";
                            } else if (data.data.roomtype_id == 5) {
                                type_ar_en = "Suite";
                            } else if (data.data.roomtype_id == 6) {
                                type_ar_en = " Family Room";
                            }

                        }
                        var state = "";
                        if(getLocalValue == 'ar'){
                            if( data.data.state_id== 1) {
                                state =  'فارغة';

                            }else if(data.data.state_id== 2)
                            {
                                state =  'ممتلئة';
                            }
                        }
                        else if(getLocalValue == 'en'){
                            if( data.data.state_id== 1) {
                                state =  'Empty';

                            }else if(data.data.state_id== 2)
                            {
                                state =  'Full';
                            }
                        }

                        var state_clean = "";



                        if(getLocalValue == 'ar'){
                            if( data.data.state_clean_id== 6) {
                                state_clean =  'غير نظيفة';

                            }else if(data.data.state_clean_id== 5)
                            {
                                state_clean =  'نظيفة';
                            }
                        }
                        else if(getLocalValue == 'en'){
                            if( data.data.state_clean_id== 6) {
                                state_clean =  'Dirty';

                            }else if(data.data.state_clean_id== 5)
                            {
                                state_clean =  'Clean';
                            }
                        }

                        var active = "";

                        if(getLocalValue == 'ar'){
                            if( data.data.is_active== 1) {
                                active =  'مفعل';

                            }else if(data.data.is_active== 0)
                            {
                                active =  'غير مفعل';
                            }
                        }
                        else if(getLocalValue == 'en'){
                            if( data.data.is_active== 1) {
                                active =  'active';

                            }else if(data.data.is_active== 0)
                            {
                                active =  'Not Active';
                            }
                        }


                        var botton_edit = "";

                        if(getLocalValue == 'ar'){

                            botton_edit =  'تعديل';

                        }
                        else if(getLocalValue == 'en'){

                            botton_edit =  'Edit';

                        }
                        var botton_delete = "";

                        if(getLocalValue == 'ar'){

                            botton_delete =  'حذف';

                        }
                        else if(getLocalValue == 'en'){

                            botton_delete =  'Delete';

                        }


                        var but_active = "";
                        if(getLocalValue == 'ar'){

                            if( data.data.is_active== 1) {
                                but_active =  'عدم تفعيل';

                            }else if(data.data.is_active== 0)
                            {
                                but_active =  'تفعيل';
                            }

                        }
                        else if(getLocalValue == 'en'){

                            if( data.data.is_active== 1) {
                                but_active =  'Not Active';

                            }else if(data.data.is_active== 0)
                            {
                                but_active =  'Active';
                            }

                        }




                        var img = '/images/rooms/' + data.data.image;
                        var imag = " <img style=' width: 100px ;height: 100px'  src='"+img+"' class='row'>";
                        $('.room_record' + data.data.id).replaceWith(" "+
                            "<tr class='room_record" + data.data.id + "'>"+
                            "<td>" + document.getElementById("num").value + "</td>"+
                            "<td>" + type_ar_en + "</td>"+
                            "<td>" + state + "</td>"+
                            "<td>" + state_clean + "</td>"+
                            "<td>" + data.data.price_per + "</td>"+
                            "<td>" + data.data.RoomView + "</td>"+
                            "<td>" + data.data.price + "</td>"+
                            "<td>" + data.data.MaximumPerson + "</td>"+
                            "<td>" + data.data.RoomSize + "</td>"+
                            "<td>" + data.data.BedNumber + "</td>"+
                            "<td>" + active + "</td>"+
                            "<td>" + imag + "</td>"+
                            "<td><button class='edit btn btn-info btn-sm' roomedit_num='"+document.getElementById("num").value+"' roomedit_id='"+data.data.id+"' roomedit_price_per='"+data.data.price_per+"' roomedit_RoomView='"+data.data.RoomView+"' roomedit_price='"+data.data.price+"' roomedit_maxperson='"+data.data.MaximumPerson+"' roomedit_roomsize='"+data.data.RoomSize+"' roomedit_bednumber='"+data.data.BedNumber+"' roomedit_image='"+data.data.image+"' > "+botton_edit+"</button>" +
                            " <button room_id='"+data.data.id+"' class='room_delete btn btn-danger btn-sm' > "+botton_delete+" </button> " +
                            "  <button room_num_active='"+document.getElementById("num").value+"'  room_id_active='"+data.data.id+"' class='room_activation btn btn-danger btn-sm' > "+but_active+"  </button>"+

                            " </td>"+

                            "</tr>");



                    }else {
                        alert(data.error)
                    }

                },
                error : function (reject){

                },
            });

        });


        $(document).on('click' , '.room_delete' ,function(e){
            if (confirm('Are you sure to delete this record ?') == true) {
                e.preventDefault();
                var room_id = $(this).attr('room_id');
                $.ajax({
                    type: 'post',
                    url: "{{ route('Manager.Room.Delete')}}",
                    data: {
                        '_token': "{{csrf_token()}} ",
                        'id': room_id,
                    },

                    success: function (data) {
                        $('ul.nav.nav-tabs a:eq(0)').html('All Rooms');
                       // $('ul.nav.nav-tabs a:eq(0)').tab('show');
                        $('ul.nav.nav-tabs a:eq(1)').html('Add New ');
                        $('ul.nav.nav-tabs a:eq(2)').html('Edit ');
                        $("#record_" + room_id).remove();
                    },
                    error: function (reject) {

                    },
                });
            }

        });


        $(document).on('click' , '.room_activation' ,function(e){
                e.preventDefault();
            var getLocalValue = document.getElementById("getLocalValue").value;
            var allTableData = document.getElementById("tableshowdata");
            var totalNumbeOfRows = allTableData.rows.length;
            var newqalq = 1;
            newqalq = newqalq + totalNumbeOfRows;
            var room_id = $(this).attr('room_id_active');
            var room_num = $(this).attr('room_num_active');
                $.ajax({
                    type: 'post',
                    url: "{{ route('Manager.Room.Activation')}}",
                    data: {
                        '_token': "{{csrf_token()}} ",
                        'id': room_id,
                    },

                    success: function (data) {
                        $('ul.nav.nav-tabs a:eq(0)').html('All Rooms');
                        //$('ul.nav.nav-tabs a:eq(0)').tab('show');
                        $('ul.nav.nav-tabs a:eq(1)').html('Add New ');
                        $('ul.nav.nav-tabs a:eq(2)').html('Edit ');



                        var type_ar_en = "";
                        if(getLocalValue == 'ar'){


                            if( data.data.roomtype_id == 1 ){
                                type_ar_en = "غرفة كلاسيكية";
                            }else if (data.data.roomtype_id == 2){
                                type_ar_en = "غرفة فاخرة";
                            }else if (data.data.roomtype_id == 3){
                                type_ar_en = "غرفه ديلوكس";
                            }else if (data.data.roomtype_id == 4){
                                type_ar_en = "غرفه متميوة";
                            }else if (data.data.roomtype_id == 5){
                                type_ar_en = "جناح";
                            }else if (data.data.roomtype_id == 6){
                                type_ar_en = "غرفة عائليه";
                            }

                        }
                        else if(getLocalValue == 'en') {
                            if (data.data.roomtype_id == 1) {
                                type_ar_en = "Classic Room";
                            } else if (data.data.roomtype_id == 2) {
                                type_ar_en = "Luxury Room ";
                            } else if (data.data.roomtype_id == 3) {
                                type_ar_en = "Deluxe Room ";
                            } else if (data.data.roomtype_id == 4) {
                                type_ar_en = " Superior Room";
                            } else if (data.data.roomtype_id == 5) {
                                type_ar_en = "Suite";
                            } else if (data.data.roomtype_id == 6) {
                                type_ar_en = " Family Room";
                            }

                        }
                        var state = "";
                        if(getLocalValue == 'ar'){
                            if( data.data.state_id== 1) {
                                state =  'فارغة';

                            }else if(data.data.state_id== 2)
                            {
                                state =  'ممتلئة';
                            }
                        }
                        else if(getLocalValue == 'en'){
                            if( data.data.state_id== 1) {
                                state =  'Empty';

                            }else if(data.data.state_id== 2)
                            {
                                state =  'Full';
                            }
                        }

                        var state_clean = "";



                        if(getLocalValue == 'ar'){
                            if( data.data.state_clean_id== 6) {
                                state_clean =  'غير نظيفة';

                            }else if(data.data.state_clean_id== 5)
                            {
                                state_clean =  'نظيفة';
                            }
                        }
                        else if(getLocalValue == 'en'){
                            if( data.data.state_clean_id== 6) {
                                state_clean =  'Dirty';

                            }else if(data.data.state_clean_id== 5)
                            {
                                state_clean =  'Clean';
                            }
                        }

                        var active = "";

                        if(getLocalValue == 'ar'){
                            if( data.data.is_active== true) {
                                active =  'مفعل';

                            }else if(data.data.is_active== false)
                            {
                                active =  'غير مفعل';
                            }
                        }
                        else if(getLocalValue == 'en'){
                            if( data.data.is_active== true) {
                                active =  'active';

                            }else if(data.data.is_active== false)
                            {
                                active =  'Not Active';
                            }
                        }


                        var botton_edit = "";

                        if(getLocalValue == 'ar'){

                            botton_edit =  'تعديل';

                        }
                        else if(getLocalValue == 'en'){

                            botton_edit =  'Edit';

                        }
                        var botton_delete = "";

                        if(getLocalValue == 'ar'){

                            botton_delete =  'حذف';

                        }
                        else if(getLocalValue == 'en'){

                            botton_delete =  'Delete';

                        }


                        var but_active = "";
                        if(getLocalValue == 'ar'){

                            if( data.data.is_active== 1) {
                                but_active =  'عدم تفعيل';

                            }else if(data.data.is_active== 0)
                            {
                                but_active =  'تفعيل';
                            }

                        }
                        else if(getLocalValue == 'en'){

                            if( data.data.is_active== 1) {
                                but_active =  'Not Active';

                            }else if(data.data.is_active== 0)
                            {
                                but_active =  'Active';
                            }

                        }



                        var img = '/images/rooms/' + data.data.image;
                        var imag = " <img style=' width: 100px ;height: 100px'  src='"+img+"' class='row'>";
                        $('.room_record' + data.data.id).replaceWith(" "+
                            "<tr class='room_record" + data.data.id + "'>"+
                            "<td>" + room_num + "</td>"+
                            "<td>" + type_ar_en + "</td>"+
                            "<td>" + state + "</td>"+
                            "<td>" + state_clean + "</td>"+
                            "<td>" + data.data.price_per + "</td>"+
                            "<td>" + data.data.RoomView + "</td>"+
                            "<td>" + data.data.price + "</td>"+
                            "<td>" + data.data.MaximumPerson + "</td>"+
                            "<td>" + data.data.RoomSize + "</td>"+
                            "<td>" + data.data.BedNumber + "</td>"+
                            "<td>" + active + "</td>"+
                            "<td>" + imag + "</td>"+
                            "<td><button class='edit btn btn-info btn-sm' roomedit_num='"+document.getElementById("num").value+"' roomedit_id='"+data.data.id+"' roomedit_price_per='"+data.data.price_per+"' roomedit_RoomView='"+data.data.RoomView+"' roomedit_price='"+data.data.price+"' roomedit_maxperson='"+data.data.MaximumPerson+"' roomedit_roomsize='"+data.data.RoomSize+"' roomedit_bednumber='"+data.data.BedNumber+"' roomedit_image='"+data.data.image+"' > "+botton_edit+"</button>" +
                            " <button room_id='"+data.data.id+"' class='room_delete btn btn-danger btn-sm' > "+botton_delete+" </button> " +
                            "  <button room_num_active='"+room_num+"' room_id_active='"+data.data.id+"' class='room_activation btn btn-danger btn-sm' > "+but_active+"  </button>"+

                            " </td>"+

                            "</tr>");

                    },
                    error: function (reject) {

                    },
                });

        });

    </script>
@endsection
