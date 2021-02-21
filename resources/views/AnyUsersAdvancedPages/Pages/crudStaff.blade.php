@extends('anyUsersAdvancedPages.layouts.content')

@section('contentAnyUsersAdvancedPages')

    <section id="pageContent" class="content" >
        <div class="row">
            <div  class="col-md-12 animate-box " data-animate-effect="fadeInLeft">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#Allusers" data-toggle="tab">All Users</a></li>
                        <li><a href="#addnew" data-toggle="tab">Add New</a></li>
                        <li><a href="#edit" data-toggle="tab">Edit</a></li>
                    </ul>
                    <div class="tab-content">

                        <div class="active tab-pane" id="Allusers">
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
                                                        <th >No.</th>
                                                        <th>Fname</th>
                                                        <th>Mname</th>
                                                        <th>Lname</th>
                                                        <th>Email</th>
                                                        <th>Salary</th>
                                                        <th>Type</th>

                                                        <th>Age</th>
                                                        <th>BirthDate</th>
                                                        <th>WorkHours</th>
                                                        <th>Phone</th>
                                                        <th>Address</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php  $i=1; ?>
                                                    @foreach ($allusers as $user)
                                                        <tr class="user_record{{$user->id}}" id="record_{{$user->id}}">
                                                            <td  id="number">{{ $i++ }}</td>
                                                            <td id="nn">{{$user->fname}} </td>
                                                            <td>{{$user->mname}} </td>
                                                            <td>{{$user->lname}}</td>
                                                            <td>{{$user->email}}</td>

                                                            <td></td>

                                                            <td>@if($user->type_id == 2)
                                                                    R
                                                                @elseif($user->type_id == 3)
                                                                    A
                                                                @elseif($user->type_id == 4)
                                                                    H
                                                                @elseif($user->type_id == 5)
                                                                    Ch
                                                                @endif
                                                            </td>

                                                            <td>{{$user->age}} </td>
                                                            <td>{{$user->birthdate}}</td>
                                                            <td>{{$user->workhours}}</td>
                                                            <td>{{$user->phone}}</td>
                                                            <td>{{$user->Address}}</td>
                                                            <td>




                                                                <button class='edit btn btn-info btn-sm'
                                                                        useredit_num="{{$i-1}}" useredit_id="{{$user->id}}"
                                                                        useredit_fname="{{$user->fname}}" useredit_mname="{{$user->mname}}" useredit_lname="{{$user->lname}}" useredit_email="{{$user->email}}" useredit_salary="{{$user->salary}}" useredit_age="{{$user->age}}" useredit_workhours="{{$user->workhours}}" useredit_phone="{{$user->phone}}" useredit_Address="{{$user->Address}}" useredit_type_id="{{$user->type_id}}" useredit_birthdate="{{$user->birthdate}}"
                                                                > Edit
                                                                </button>

                                                                <button staff_id="{{$user->StaffId}}" user_id="{{$user->id}}" class="user_delete btn btn-danger btn-sm" > del
                                                                </button>

                                                                 <button class='show btn btn-info btn-sm'  data-id="{{$user->id}}"
                                                                         data-fname="{{$user->fname}}"  data-mname="{{$user->mname}}"  data-lname="{{$user->lname}}"  data-email="{{$user->email}}"  data-salary="{{$user->salary}}"  data-age="{{$user->age}}"  data-workhours="{{$user->workhours}}"  data-phone="{{$user->phone}}"  data-Address="{{$user->Address}}"  data-type_id="{{$user->type_id}}" data-birthdate="{{$user->birthdate}}"   >Show</button>



                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>

                                                </table>


                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <form enctype="multipart/form-data" action="{{url('/updateprofileimage')}}" method="POST">
                                <input hidden="hidden" type="text" name="userid" value="{{ Auth::user()->id }}">
                                </br><input type="file" name="profileimage" required ></br>

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input style="width: 320px" type="submit" class=" btn btn-sm btn-primary">


                            </form>
                        </div>

                        <div class="tab-pane" id="addnew">

                            <form id="users" class="user" >
                                {{ csrf_field() }}
                            <div class="input-group col-md-6" >

                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input  value="{{ old('fname') }}" type="text" class="form-control form-control-user" name="fname" placeholder="First Name">
                            </div>
                            </br>
                            <div class="input-group col-md-6">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input value="{{ old('mname') }}" type="text" class="form-control form-control-user" name="mname" placeholder="Middle Name">
                            </div>
                            </br>
                            <div class="input-group col-md-6">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input value="{{ old('lname') }}" type="text" class="form-control form-control-user" name="lname" placeholder="Last Name">
                            </div>
                            </br>
                            <div class="input-group col-md-6">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input value="{{ old('email') }}" type="email" class="form-control form-control-user" name="email" placeholder="Email Address">
                            </div>
                            </br>
                            <div class="input-group col-md-6">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input value="{{ old('password') }}" type="password" class="form-control form-control-user" name="password" placeholder="Password">
                            </div>
                            </br>
                            <div class="input-group col-md-6">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input value="{{ old('confirmpassword') }}" type="password" class="form-control form-control-user" name="confirmpassword" placeholder="Repeat Password">
                            </div>
                            </br>
                            <div class="input-group col-md-6">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input value="{{ old('salary') }}" type="text" class="form-control form-control-user" name="salary" placeholder="Salary">
                            </div>
                            </br>
                            <div class="input-group col-md-6">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input value="{{ old('age') }}" type="text" class="form-control form-control-user" name="age" placeholder="Age">
                            </div>
                            </br>
                            <div class="input-group col-md-6">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input value="{{ old('birthdate') }}" type="date" class="form-control form-control-user" name="birthdate" placeholder="Birthdate">
                            </div>
                            </br>
                            <div class="input-group col-md-6">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input value="{{ old('workhours') }}" type="text" class="form-control form-control-user" name="workhours" placeholder="Work Hours">
                            </div>
                                </br>
                                <div class="input-group col-md-6">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input value="{{ old('phone') }}" type="phone" class="form-control form-control-user" name="phone" placeholder="Phone">
                                </div>
                            </br>
                            <div class="input-group col-md-6">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input value="{{ old('Address') }}" type="text" class="form-control form-control-user" name="Address" placeholder="Address">
                            </div>
                            </br>

                            <!-- SELECT2 EXAMPLE -->
                            <div class="box box-default ">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Select</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body ">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Your Jop</label>

                                                    <select style="width: 100%;" class="form-control select2" id="mySelect" value="{{ old('status') }}" name="status">
                                                        <option value="2">Receptionist</option>
                                                        <option value="3">Acountant</option>
                                                        <option value="4">Housekeaping</option>
                                                        <option value="5">Cheif</option>

                                                    </select>
                                                </select>
                                            </div>

                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                            <!-- /.box -->

                            <div class="form-group">
                                <img src="" style="margin:10px" height="200" width="200" id="imagePreview" />
                                <input id="mine" type="file" style="width:200px;border:5px" name="image" accept="image/jpeg , image/png " onchange="ShowImagePreview(this, document.getElementById('imagePreview'))" />


                            </div>

                            <div class="form-group">
                                <button id="add_users" class="btn btn-primary "  value="Register Account" >Register Account</button>
                            </div>


</form>
                        </div>



                        <div class="tab-pane" id="edit">
                            <form  id="editUser" class="user">
                                {{ csrf_field() }}
                                <div class="input-group col-md-6" >

                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input   value="{{ old('num') }}" type="text" class="form-control form-control-user" name="editnum" id="numuser" >
                                </div>
                                </br>
                                <div class="input-group col-md-6">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input   value="{{ old('Id') }}" type="text" class="form-control form-control-user" name="editid" id="iduser" >
                                </div>
                                </br>
                                <div class="input-group col-md-6">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input value="{{ old('editfname') }}" type="text" class="form-control form-control-user" name="editfname" id="fnameuser" placeholder="First Name">
                                </div>
                                </br>
                                <div class="input-group col-md-6">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input value="{{ old('editmname') }}" type="text" class="form-control form-control-user" name="editmname" id="mnameuser" placeholder="Middle Name">
                                </div>
                                </br>
                                <div class="input-group col-md-6">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input value="{{ old('editlname') }}" type="text" class="form-control form-control-user" name="editlname" id="lnameuser" placeholder="Last Name">
                                </div>
                                </br>
                                <div class="input-group col-md-6">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input value="{{ old('editemail') }}" type="email" class="form-control form-control-user" name="editemail" id="emailuser" placeholder="Email Address">
                                </div>
                                </br>
                                <div class="input-group col-md-6">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input value="{{ old('editsalary') }}" type="text" class="form-control form-control-user" name="editsalary" id="salaryuser"  placeholder="Salary" >
                                </div>
                                </br>
                                <div class="input-group col-md-6">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input value="{{ old('editage') }}" type="text" class="form-control form-control-user" name="editage" id="ageuser" placeholder="Age">
                                </div>
                                </br>
                                <div class="input-group col-md-6">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input value="{{ old('editbirthdate') }}" type="date" class="form-control form-control-user" name="editbirthdate" id="birthdateuser" placeholder="Birthdate">
                                </div>
                                </br>
                                <div class="input-group col-md-6">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input value="{{ old('editworkhours') }}" type="text" class="form-control form-control-user" name="editworkhours" id="workhoursuser" placeholder="Work Hours">
                                </div>
                                </br>
                                <div class="input-group col-md-6">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input value="{{ old('editphone') }}" type="phone" class="form-control form-control-user" name="editphone" id="phoneuser" placeholder="Phone">
                                </div>
                                </br>
                                <div class="input-group col-md-6">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input value="{{ old('editAddress') }}" type="text" class="form-control form-control-user" name="editAddress"  id="addressuser"  placeholder="Address">
                                </div>
                                </br>

                                <!-- SELECT2 EXAMPLE -->
                                <div class="box box-default ">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Select</h3>

                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                                        </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body ">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Your Jop</label>

                                                        <select style="width: 100%;" class="form-control " id="mySelect" value="{{ old('editstatus') }}" name="editstatus" >
                                                            <option id="anytype" value=""></option>
                                                            <option id="Receptionistid" value="2">Receptionist</option>
                                                            <option id="Acountantid" value="3">Acountant</option>
                                                            <option id="Housekeapingid" value="4">Housekeaping</option>
                                                            <option id="Cheifid" value="5">Cheif</option>

                                                        </select>
                                                </div>

                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                </div>
                                <!-- /.box -->

                                <div class="form-group">
                                    <img src="" style="margin:10px" height="200" width="200" id="imagePreview" />
                                    <input id="mine" type="file" style="width:200px;border:5px" name="image" accept="image/jpeg , image/png " onchange="ShowImagePreview(this, document.getElementById('imagePreview'))" />


                                </div>

                                <div class="form-group">
                                    <button id="edit_users" class="btn btn-primary "  value="Edit Account" >Edit Account</button>
                                </div>


                            </form>
                        </div>




                    </div>
                </div>
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
                            <div class="form-group">
                                <label for="">Middle Name :</label>
                                <b id="showmname"/>
                            </div>
                            <div class="form-group">
                                <label for="">Last Name :</label>
                                <b id="showlname"/>
                            </div>
                            <div class="form-group">
                                <label for="">Email Address :</label>
                                <b id="showemail"/>
                            </div>
                            <div class="form-group">
                                <label for="">Salary :</label>
                                <b id="showsalary"/>
                            </div>
                            <div class="form-group">
                                <label for="">Job :</label>
                                <b id="showtype"/>
                            </div>
                            <div class="form-group">
                                <label for="">Age :</label>
                                <b id="showage"/>
                            </div>
                            <div class="form-group">
                                <label for="">Birthdate :</label>
                                <b id="showbirthdate"/>
                            </div>
                            <div class="form-group">
                                <label for="">Workhours :</label>
                                <b id="showworkhours"/>
                            </div>
                            <div class="form-group">
                                <label for="">Phone :</label>
                                <b id="showphone"/>
                            </div>
                            <div class="form-group">
                                <label for="">Address :</label>
                                <b id="showaddress"/>
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






        function jQueryAjaxPost(form) {
            $.validator.unobtrusive.parse(form);
            if ($(form).valid()) {
                var ajaxConfig = {
                    type: 'POST',
                    url: form.action,
                    data: new FormData(form),
                    success: function (response) {
                        if (response.success) {
                            $("#firstTab").html(response.html);
                            refreshAddNewTab($(form).attr('data-restUrl'), true);
                            $.notify(response.message, "success");
                            if (typeof activatejQueryTable !== 'undefined' && $.isFunction(activatejQueryTable))
                                activatejQueryTable();
                        }
                        else {
                            $.notify(response.message, "error");
                        }
                    }
                }
                if ($(form).attr('enctype') == "multipart/form-data") {
                    ajaxConfig["contentType"] = false;
                    ajaxConfig["processData"] = false;
                }
                $.ajax(ajaxConfig);

            }
            return false;
        }



        $(document).on('click' , '#add_users' ,function(e){
            e.preventDefault();
            var form= $('#users').serialize();
            //var numberuser =  document.getElementById('tableshowdata').column[0].cells.length;
            var allTableData = document.getElementById("tableshowdata");
            var totalNumbeOfRows = allTableData.rows.length;
            var newqalq = 1;
            newqalq = newqalq + totalNumbeOfRows;









            //var url = $('#users').attr('action');
            // alert(form);

            $.ajax({
                type: 'post',
                enctype : 'multipart/form-data',
                url : 'registerByManager' ,
                data: form,
                success : function(data){

                    if(data.result == true)
                    {
                        $('ul.nav.nav-tabs a:eq(0)').html('All Users');
                       // $('ul.nav.nav-tabs a:eq(0)').tab('show');
                        $('ul.nav.nav-tabs a:eq(1)').html('Add New ');
                        $('ul.nav.nav-tabs a:eq(2)').html('Edit ');




                        $('#tableshowdata').append("<tr>"+
                            "<td>" + totalNumbeOfRows + "</td>"+
                            "<td>" + data.data1.fname + "</td>"+
                            "<td>" + data.data1.mname + "</td>"+
                            "<td>" + data.data1.lname + "</td>"+
                            "<td>" + data.data1.email + "</td>"+
                            "<td>" + data.data2.salary + "</td>"+
                            "<td>" + data.data1.type_id + "</td>"+
                            "<td>" + data.data2.age + "</td>"+
                            "<td>" + data.data2.birthdate + "</td>"+
                            "<td>" + data.data2.workhours + "</td>"+
                            "<td>" + data.data2.phone + "</td>"+
                            "<td>" + data.data2.Address + "</td>"+
                            "<td><button class='edit btn btn-info btn-sm'  useredit_id='"+data.data1.Id+"' useredit_fname='"+data.data1.fname+"' useredit_mname='"+data.data1.mname+"' useredit_lname='"+data.data1.lname+"' useredit_email='"+data.data1.email+"' useredit_salary='"+data.data2.salary+"' useredit_age='"+data.data2.age+"' useredit_workhours='"+data.data2.workhours+"'useredit_phone='"+data.data2.phone+"' useredit_Address='"+data.data2.Address+"' useredit_type_id='"+data.data1.type_id+"' useredit_birthdate='"+data.data2.birthdate+"' > Edit</button>                                                 " +
                            " <button staff_id='"+data.data2.StaffId+"' user_id='"+data.data1.Id+"' class='user_delete btn btn-danger btn-sm' > del </button>                                               " +
                            " <button class='show btn btn-info btn-sm'  show_id='"+data.data1.Id+"' show_fname='"+data.data1.fname+"' show_mname='"+data.data1.mname+"' show_lname='"+data.data1.lname+"' show_email='"+data.data1.email+"' show_salary='"+data.data2.salary+"' show_age='"+data.data2.age+"' show_workhours='"+data.data2.workhours+"'show_phone='"+data.data2.phone+"' show_Address='"+data.data2.Address+"' show_type_id='"+data.data1.type_id+"' show_birthdate='"+data.data2.birthdate+"'   >Show</button> " +
                            " </td>"+

                            "</tr>");



                        //autoloadpage();
                        //refreshAddNewTab();
                    }
                },
                error : function (reject){

                }
            });

        });



        $(document).on('click' , '#edit_users' ,function(e){
            e.preventDefault();
            //var formData = new FormData($('#editUser'));
            var form= $('#editUser').serialize();
            var num = document.getElementById("numuser").value;
            $.ajax({
                type: 'post',
                url : '/edititionByManager',
                data:  form,

                success : function(data){
                    $('ul.nav.nav-tabs a:eq(0)').html('All Users');
                  //  $('ul.nav.nav-tabs a:eq(0)').tab('show');
                    $('ul.nav.nav-tabs a:eq(1)').html('Add New ');
                    $('ul.nav.nav-tabs a:eq(2)').html('Edit ');

                    $('.user_record' + data.data.Id).replaceWith(" "+
                        "<tr class='user_record" + data.data.Id + "'>"+
                        "<td>" + num  + "</td>"+
                        "<td>" + data.data.fname + "</td>"+
                        "<td>" + data.data.mname +  "</td>"+
                        "<td>" + data.data.lname + "</td>"+
                        "<td>" + data.data.email + "</td>"+
                        "<td>" + data.data.salary + "</td>"+
                        "<td>" + data.data.type_id + "</td>"+
                        "<td>" + data.data.age + "</td>"+
                        "<td>" + data.data.birthdate + "</td>"+
                        "<td>" + data.data.workhours + "</td>"+
                        "<td>" + data.data.phone + "</td>"+
                        "<td>" + data.data.Address + "</td>"+
                        "<td> <button class='edit btn btn-info btn-sm'   useredit_id='"+data.data.Id+"' useredit_fname='"+data.data.fname+"' useredit_mname='"+data.data.mname+"' useredit_lname='"+data.data.lname+"' useredit_email='"+data.data.email+"' useredit_salary='"+data.data.salary+"' useredit_age='"+data.data.age+"' useredit_workhours='"+data.data.workhours+"'useredit_phone='"+data.data.phone+"' useredit_Address='"+data.data.Address+"' useredit_type_id='"+data.data.type_id+"' useredit_birthdate='"+data.data.birthdate+"' > Edit</button>                                                                    " +
                        "   <button staff_id='"+data.data.StaffId+"' user_id='"+data.data.Id+"' class='user_delete btn btn-danger btn-sm' > del </button>                                              " +
                        "      <a href='#show' data-toggle='modal' class=' btn btn-info btn-sm' >Show</a>       </td>"+
                        "</tr>");


                },
                error : function (reject){

                },
            });

        });





        $(document).on('click' , '.user_delete' ,function(e){
            if (confirm('Are you sure to delete this record ?') == true) {
                e.preventDefault();
                var user_id = $(this).attr('user_id');
                var staff_id = $(this).attr('staff_id');
                $.ajax({
                    type: 'post',
                    url: '/deletionByManager',
                    data: {
                        '_token': "{{csrf_token()}} ",
                        'id': user_id,
                        'idstaff': staff_id,
                    },

                    success: function (data) {
                        $('ul.nav.nav-tabs a:eq(0)').html('All Users');
                      //  $('ul.nav.nav-tabs a:eq(0)').tab('show');
                        $('ul.nav.nav-tabs a:eq(1)').html('Add New ');
                        $('ul.nav.nav-tabs a:eq(2)').html('Edit ');
                        $("#record_" + user_id).remove();
                    },
                    error: function (reject) {

                    },
                });
            }

        });


        $(document).on('click' , '#edition' ,function(e){
            e.preventDefault();

            var useredit_num =  $(this).attr('useredit_num');
            var useredit_id =  $(this).attr('useredit_id');
            var useredit_fname =  $(this).attr('useredit_fname');
            var useredit_mname =  $(this).attr('useredit_mname');
            var useredit_lname =  $(this).attr('useredit_lname');
            var useredit_email =  $(this).attr('useredit_email');
            var useredit_salary =  $(this).attr('useredit_salary');
            var useredit_age =  $(this).attr('useredit_age');
            var useredit_workhours =  $(this).attr('useredit_workhours');
            var useredit_phone =  $(this).attr('useredit_phone');
            var useredit_Address =  $(this).attr('useredit_Address');
            var useredit_birthdate =  $(this).attr('useredit_birthdate');
            var useredit_type_id =  $(this).attr('useredit_type_id');


            $('ul.nav.nav-tabs a:eq(0)').html('All Users');
            $('ul.nav.nav-tabs a:eq(1)').html('Add New ');
            $('ul.nav.nav-tabs a:eq(2)').html('Edit ');
          //  $('ul.nav.nav-tabs a:eq(2)').tab('show');



            document.getElementById("numuser").value = useredit_num;
            document.getElementById("iduser").value = useredit_id;
            document.getElementById("fnameuser").value = useredit_fname;
            document.getElementById("mnameuser").value = useredit_mname;
            document.getElementById("lnameuser").value = useredit_lname;
            document.getElementById("emailuser").value = useredit_email;
            document.getElementById("balanceuser").value = useredit_salary;
            document.getElementById("ageuser").value = useredit_age;
            document.getElementById("birthdateuser").value = useredit_birthdate;
            document.getElementById("workhoursuser").value = useredit_workhours;
            document.getElementById("phoneuser").value = useredit_phone;
            document.getElementById("addressuser").value = useredit_Address;


        });






        // setInterval(function () { autoloadpage(); }, 30000); // it will call the function autoload() after each 30 seconds.
        function autoloadpage() {
            $.ajax({
                url: '/CrudUsers',
                type: "POST",
                success: function (data) {
                    $('ul.nav.nav-tabs a:eq(0)').html('All Users');
                  //  $('ul.nav.nav-tabs a:eq(0)').tab('show');
                    $('ul.nav.nav-tabs a:eq(1)').html('Add New ');
                    $('ul.nav.nav-tabs a:eq(2)').html('Edit ');
                    $("#pageContent").html(data); // here the wrapper is main div
                }
            });
        }







        function refreshAddNewTab() {
            $.ajax({
                type: 'GET',
                url: '/CrudUsers',
                success: function (response) {
                    $('ul.nav.nav-tabs a:eq(0)').html('All Users');
                   // $('ul.nav.nav-tabs a:eq(0)').tab('show');
                    $('ul.nav.nav-tabs a:eq(1)').html('Add New ');
                    $('ul.nav.nav-tabs a:eq(2)').html('Edit ');

                }

            });
        }





        function testJS(elem)
        {
            //console.log(element.id);

            var ID_String=elem.id.toString();
            var ID_Sender=""
            var ID_Message=""

            var i=0;
            while(ID_String[i]!=',')
            {
                ID_Sender=ID_Sender+ID_String[i];
                i++;
            }
            i=i+1;
            while(ID_String[i]!=',')
            {
                ID_Message=ID_Message+ID_String[i];
                i++;
            }

            //var b = document.getElementById("test3").innerHTML ;
            //document.getElementById("test4").value = b;
            document.getElementById("test2").value = ID_Sender   ;
            document.getElementById("test4").value = ID_Message   ;
        }








        function Edit(id ) {


            $('ul.nav.nav-tabs a:eq(0)').html('All Users');
            $('ul.nav.nav-tabs a:eq(1)').html('Add New ');
            $('ul.nav.nav-tabs a:eq(2)').html('Edit ');
          //  $('ul.nav.nav-tabs a:eq(2)').tab('show');

            /* var fname = $('input[name=editfname]').val();
             var mname = $('input[name=editmname]').val();
             var lname = $('input[name=editlname]').val();
             var email = $('input[name=editemail]').val();
              var type = $('input[name=editstatus]').val();
               var ssn = $('input[name=editssn]').val();
                var age = $('input[name=editage]').val();
                 var birthdate = $('input[name=editbirthdate]').val();
                  var workhours = $('input[name=editworkhours]').val();
                   var phone = $('input[name=editphone]').val();
                    var Address = $('input[name=editAddress]').val();*/

            var object_String=id.toString();
            // alert(object_String)

            var Id = "";
            var fname = "";
            var mname = "";
            var lname = "";
            var email = "";
            var age = "";
            var birthdate = "";
            var salary = "";

            var workhours = "";
            var phone = "";
            var Address = "";
            var type = "";

            var i=0;

            while(object_String[i]!=',')
            {
                Id=Id+object_String[i];
                i++;
            }
            i=i+1;

            while(object_String[i]!=',')
            {
                fname=fname+object_String[i];
                i++;
            }
            i=i+1;

            while(object_String[i]!=',')
            {
                mname=mname+object_String[i];
                i++;
            }
            i=i+1;

            while(object_String[i]!=',')
            {
                lname=lname+object_String[i];
                i++;
            }
            i=i+1;

            while(object_String[i]!=',')
            {
                email=email+object_String[i];
                i++;
            }
            i=i+1;

            while(object_String[i]!=',')
            {
                salary=salary+object_String[i];
                i++;
            }


            i=i+1;

            while(object_String[i]!=',')
            {
                age=age+object_String[i];
                i++;
            }

            i=i+1;

            while(object_String[i]!=',')
            {
                workhours=workhours+object_String[i];
                i++;
            }
            i=i+1;

            while(object_String[i]!=',')
            {
                phone=phone+object_String[i];
                i++;
            }
            i=i+1;

            while(object_String[i]!=',')
            {
                Address=Address+object_String[i];
                i++;
            }
            i=i+1;

            while(object_String[i]!=',')
            {
                type=type+object_String[i];
                i++;
            }
            i=i+1;

            while(object_String[i]!=',')
            {
                birthdate=birthdate+object_String[i];
                i++;
            }


            document.getElementById("iduser").value = Id;
            document.getElementById("fnameuser").value = fname;
            document.getElementById("mnameuser").value = mname;
            document.getElementById("lnameuser").value = lname;
            document.getElementById("emailuser").value = email;
            document.getElementById("salaryuser").value = salary;
            document.getElementById("ageuser").value = age;
            document.getElementById("birthdateuser").value = birthdate;
            document.getElementById("workhoursuser").value = workhours;
            document.getElementById("phoneuser").value = phone;
            document.getElementById("addressuser").value = Address;
            if(type.toString().equals("2")){

                document.getElementById("Receptionistid").value = "r" ;
            }else if(type.toString().equals("3"))
            {
                document.getElementById("statususer").value = "Acountant";
            }
            else if(type.toString().equals("4"))
            {
                document.getElementById("statususer").value = "Housekeaping";
            }
            else if(type.toString().equals("5"))
            {
                document.getElementById("statususer").value = "Cheif";
            }

        }




        // Fetch all records
        $('#but_fetchall').click(function(){
            fetchRecords(0);
        });

        // Fetch all records
        /* $('#search').keypress(function(){
            fetchRecords(0);
         });*/

        // Search by userid
        $('#but_search').click(function(){
            var userid = Number($('#search').val().trim());

            // Search by userid
            /* $('#search').keypress(function(){
                var userid = Number($('#search').val().trim());*/

            if(userid > 0){
                fetchRecords(userid);
            }

        });


        $('#but_search').on('keyup change',function(){
            var userid = Number($('#search').val().trim());

            // Search by userid
            /* $('#search').keypress(function(){
                var userid = Number($('#search').val().trim());*/

            if(userid > 0){
                fetchRecords(userid);
            }
        });


        function fetchRecords(id){
            var userid = Number($('#search').val().trim());

            $.ajax({
                url: 'getUsersById/'+id,
                type: 'get',
                dataType: 'json',
                success: function(response){

                    var len = 0;
                    $('#tableshowdata tbody').empty(); // Empty <tbody>
                    if(response['data'] != null){
                        len = response['data'].length;
                    }

                    if(len > 0){
                        for(var i=0; i<len; i++){
                            var id = response['data'][i].Id;
                            var Staffid = response['data'][i].StaffId;
                            var fname = response['data'][i].fname;
                            var mname = response['data'][i].mname;
                            var lname = response['data'][i].lname;
                            var email = response['data'][i].email;
                            var salary = response['data'][i].salary;
                            var type_id = response['data'][i].type_id;
                            var age = response['data'][i].age;
                            var birthdate = response['data'][i].birthdate;
                            var workhours = response['data'][i].workhours;
                            var phone = response['data'][i].phone;
                            var Address = response['data'][i].Address;

                            var tr_str = "<tr>" +
                                "<td align='center'>" + (i+1) + "</td>" +
                                "<td align='center'>" + fname + "</td>" +
                                "<td align='center'>" + mname + "</td>" +
                                "<td align='center'>" + lname + "</td>" +
                                "<td align='center'>" + email + "</td>" +
                                "<td align='center'>" + salary + "</td>" +
                                "<td align='center'>" + type_id + "</td>" +
                                "<td align='center'>" + age + "</td>" +
                                "<td align='center'>" + birthdate + "</td>" +
                                "<td align='center'>" + workhours + "</td>" +
                                "<td align='center'>" + phone + "</td>" +
                                "<td align='center'>" + Address + "</td>" +
                                "<td align='center'> <button class='edit btn btn-info btn-sm'  useredit_id='"+id+"' useredit_fname='"+fname+"' useredit_mname='"+mname+"' useredit_lname='"+lname+"' useredit_email='"+email+"' useredit_salary='"+salary+"' useredit_age='"+age+"' useredit_workhours='"+workhours+"'useredit_phone='"+phone+"' useredit_Address='"+Address+"' useredit_type_id='"+type_id+"' useredit_birthdate='"+birthdate+"' > Edit</button>                                                          <button staff_id='"+Staffid+"' user_id='"+id+"' class='user_delete btn btn-danger btn-sm' > del </button>                                                              <a href='#show' data-toggle='modal' class=' btn btn-info btn-sm' >Show</a></td>" +
                                "</tr>";

                            $("#tableshowdata tbody").append(tr_str);
                        }
                    }else{
                        if(userid == 1) {
                            var tr_str = "<tr>" +
                                "<td align='center' colspan='4'>This User Is Not Authnticate to you.</td>" +
                                "</tr>";
                        }else{
                            var tr_str = "<tr>" +
                                "<td align='center' colspan='4'>No record found.</td>" +
                                "</tr>";
                        }

                        $("#tableshowdata tbody").append(tr_str);
                    }

                }
            });
        }

        // Search by userid
        $('#but_fetchByLike').click(function(){
            var userstring = document.getElementById("search").value;

            // Search by userid
            /* $('#search').keypress(function(){
                var userid = Number($('#search').val().trim());*/

            if(userstring.length == 0) {
                fetchRecords(0);
            }else {
                fetchRecords(userstring);
            }

        });

        function fetchRecordsByLikeStatements(stringValue){
            // var userid = Number($('#search').val().trim());
            $.ajax({
                url: 'getUsersById?stringValue='+stringValue,
                type: 'get',
                dataType: 'json',
                success: function(response){

                    var len = 0;
                    $('#tableshowdata tbody').empty(); // Empty <tbody>
                    if(response['data'] != null){
                        len = response['data'].length;
                    }

                    if(len > 0){
                        for(var i=0; i<len; i++){
                            var id = response['data'][i].Id;
                            var Staffid = response['data'][i].StaffId;
                            var fname = response['data'][i].fname;
                            var mname = response['data'][i].mname;
                            var lname = response['data'][i].lname;
                            var email = response['data'][i].email;
                            var salary = response['data'][i].salary;
                            var type_id = response['data'][i].type_id;
                            var age = response['data'][i].age;
                            var birthdate = response['data'][i].birthdate;
                            var workhours = response['data'][i].workhours;
                            var phone = response['data'][i].phone;
                            var Address = response['data'][i].Address;

                            var tr_str = "<tr>" +
                                "<td align='center'>" + (i+1) + "</td>" +
                                "<td align='center'>" + fname + "</td>" +
                                "<td align='center'>" + mname + "</td>" +
                                "<td align='center'>" + lname + "</td>" +
                                "<td align='center'>" + email + "</td>" +
                                "<td align='center'>" + salary + "</td>" +
                                "<td align='center'>" + type_id + "</td>" +
                                "<td align='center'>" + age + "</td>" +
                                "<td align='center'>" + birthdate + "</td>" +
                                "<td align='center'>" + workhours + "</td>" +
                                "<td align='center'>" + phone + "</td>" +
                                "<td align='center'>" + Address + "</td>" +
                                "<td align='center'> <button class='edit btn btn-info btn-sm'  useredit_id='"+id+"' useredit_fname='"+fname+"' useredit_mname='"+mname+"' useredit_lname='"+lname+"' useredit_email='"+email+"' useredit_salary='"+salary+"' useredit_age='"+age+"' useredit_workhours='"+workhours+"'useredit_phone='"+phone+"' useredit_Address='"+Address+"' useredit_type_id='"+type_id+"' useredit_birthdate='"+birthdate+"' > Edit</button>                                                          <button staff_id='"+Staffid+"' user_id='"+id+"' class='user_delete btn btn-danger btn-sm' > del </button>                                                              <a href='#show' data-toggle='modal' class=' btn btn-info btn-sm' >Show</a></td>" +
                                "</tr>";

                            $("#tableshowdata tbody").append(tr_str);
                        }
                    }else{

                        var tr_str = "<tr>" +
                            "<td align='center' colspan='4'>No record found.</td>" +
                            "</tr>";


                        $("#tableshowdata tbody").append(tr_str);
                    }

                }
            });
        }








        $(document).on('click', '.edit', function() {

            $('ul.nav.nav-tabs a:eq(0)').html('All Users');
            $('ul.nav.nav-tabs a:eq(1)').html('Add New ');
            $('ul.nav.nav-tabs a:eq(2)').html('Edit ');
           // $('ul.nav.nav-tabs a:eq(2)').tab('show');

            document.getElementById("numuser").value = $(this).attr('useredit_num');
            document.getElementById("iduser").value = $(this).attr('useredit_id');
            document.getElementById("fnameuser").value = $(this).attr('useredit_fname');
            document.getElementById("mnameuser").value = $(this).attr('useredit_mname');
            document.getElementById("lnameuser").value = $(this).attr('useredit_lname');
            document.getElementById("emailuser").value = $(this).attr('useredit_email');
            document.getElementById("salaryuser").value = $(this).attr('useredit_salary');
            document.getElementById("ageuser").value = $(this).attr('useredit_age');
            document.getElementById("birthdateuser").value = $(this).attr('useredit_birthdate');
            document.getElementById("workhoursuser").value = $(this).attr('useredit_workhours');
            document.getElementById("phoneuser").value = $(this).attr('useredit_phone');
            document.getElementById("addressuser").value = $(this).attr('useredit_Address');


            var type_id = $(this).attr('useredit_type_id');

            if(type_id == 2)
            {

                document.getElementById("anytype").text = "Receptionist";
                document.getElementById("anytype").value = "2";
                $("#Receptionistid").remove();
            }else if(type_id == 3)
            {

                document.getElementById("anytype").text = "Acountant";
                document.getElementById("anytype").value = "3";
                $("#Acountantid").remove();
            }else if(type_id == 4)
            {

                document.getElementById("anytype").text = "Housekeaping";
                document.getElementById("anytype").value = "4";
                $("#Housekeapingid").remove();
            } else if(type_id == 5)
            {

                document.getElementById("anytype").text = "Cheif";
                document.getElementById("anytype").value = "5";
                $("#Cheifid").remove();
            }

        });



        $(document).on('click', '.show', function() {

            $('#show').modal('show');
            $('#showid').text($(this).data('id'));
            $('#showfname').text($(this).data('fname'));
            $('#showmname').text($(this).data('mname'));
            $('#showlname').text($(this).data('lname'));
            $('#showemail').text($(this).data('email'));
            $('#showsalary').text($(this).data('salary'));
            $('#showage').text($(this).data('age'));
            $('#showbirthdate').text($(this).data('birthdate'));
            $('#showworkhours').text($(this).data('workhours'));
            $('#showphone').text($(this).data('phone'));
            $('#showaddress').text($(this).data('address'));

            var type_id = $(this).data('type_id');

            if(type_id == 2)
            {
                $('#showtype').text("Receptionist");
            }else if(type_id == 3)
            {
                $('#showtype').text("Acountant");
            }else if(type_id == 4)
            {
                $('#showtype').text("Housekeaping");
            } else if(type_id == 5)
            {
                $('#showtype').text("Cheif");
            }

        });


        function ShowImagePreview(imageUploader, previewImage) {
            if (imageUploader.files && imageUploader.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(previewImage).attr('src', e.target.result);
                }
                reader.readAsDataURL(imageUploader.files[0]);
            }

            var image = document.getElementById("mine").value + ',';
            var directory=""
            var folder=""
            var path=""

            var i=0;
            while(image[i]!='\\')
            {
                directory=directory+image[i];
                i++;
            }
            i=i+1;
            while(image[i]!='\\')
            {
                folder=folder+image[i];
                i++;
            }
            i=i+1;
            while(image[i]!=',')
            {
                path=path+image[i];
                i++;
            }
            i=i+1;
            document.getElementById("myImage").value = path   ;


        }



        function selectElement(id, valueToSelect) {
            let element = document.getElementById(id);
            element.value = valueToSelect;
        }

    </script>
@endsection
