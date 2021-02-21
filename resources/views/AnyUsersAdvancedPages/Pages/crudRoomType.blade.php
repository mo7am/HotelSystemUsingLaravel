@extends('anyUsersAdvancedPages.layouts.content')

@section('contentAnyUsersAdvancedPages')

    <section id="pageContent" class="content" >
        <div class="row">
            <div  class="col-md-12 animate-box " data-animate-effect="fadeInLeft">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#AllTyperooms" data-toggle="tab">{{__('pageContent.allroomtype')}}</a></li>
                        <li><a href="#addnew" data-toggle="tab">{{__('pageContent.addnew')}}</a></li>
                        <li><a href="#edit" data-toggle="tab">{{__('pageContent.edit')}}</a></li>
                    </ul>
                    <div class="tab-content">

                        <div class="{{$valueactive}} tab-pane" id="AllTyperooms">
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
                                                        <th>{{__('pageContent.type')}}</th>
                                                        <th>{{__('pageContent.status')}}</th>
                                                        <th>{{__('pageContent.action')}}</th>
                                                    </tr>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @isset($alltyperooms)
                                                    <?php  $i=1; ?>
                                                    @foreach ($alltyperooms as $typerooms)
                                                        <tr class="user_record" id="record_">
                                                            <td  id="number">{{ $i++ }}</td>
                                                            <td id="nn"> {{$typerooms->type}}</td>
                                                            <td id="nn"> {{$typerooms->getactive()}}</td>
                                                            <td>
                                                                <button class='edit btn btn-info btn-sm' edit_active="{{$typerooms->is_active}}" edit_id="{{$typerooms->id}}" edit_getactive ="{{$typerooms->getactive()}}" edit_type="{{$typerooms->type}}">  {{__('pageContent.edit')}}
                                                                </button>
                                                                <a href="{{route('Manager.TypeRoom.Delete',$typerooms->id)}}" class="btn btn-danger btn-sm">{{__('pageContent.delete')}}</a>

                                                            </td>


                                                        </tr>
                                                    @endforeach

                                                        @endisset
                                                    </tbody>

                                                </table>


                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane" id="addnew">

                            <form id="typerooms" class="typeroom"  action="{{route('Manager.TypeRoom.Store')}}" method="post">
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
                                                            <option id="Receptionistid" value="{{__('pageContent.classicroom')}}">{{__('pageContent.classicroom')}}</option>
                                                            <option id="Acountantid" value="{{__('pageContent.luxuryroom')}}">{{__('pageContent.luxuryroom')}}</option>
                                                            <option id="Housekeapingid" value="{{__('pageContent.deluxeroom')}}">{{__('pageContent.deluxeroom')}}</option>
                                                            <option id="Cheifid" value="{{__('pageContent.superiorroom')}}">{{__('pageContent.superiorroom')}}</option>
                                                            <option id="Cheifid" value="{{__('pageContent.suite')}}">{{__('pageContent.suite')}}</option>
                                                            <option id="Cheifid" value="{{__('pageContent.familyroom')}}">{{__('pageContent.familyroom')}}</option>

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
                                </div>

                                <div class="form-group">
                           <input type="submit" value="{{__('pageContent.add')}}">
                            </div>


</form>
                        </div>



                        <div class="{{$valueactive2}} tab-pane" id="edit">
                            <form  id="editUser" class="user"  action="{{route('Manager.TypeRoom.Update')}}" method="post">
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
                                                        <select style="width: 100%;" class="form-control " id="mySelectoption" value="" name="type" >
                                                            <option id="anytypeoption" value=""></option>
                                                            <option id="Receptionistid" value="{{__('pageContent.classicroom')}}">{{__('pageContent.classicroom')}}</option>
                                                            <option id="Acountantid" value="{{__('pageContent.luxuryroom')}}">{{__('pageContent.luxuryroom')}}</option>
                                                            <option id="Housekeapingid" value="{{__('pageContent.deluxeroom')}}">{{__('pageContent.deluxeroom')}}</option>
                                                            <option id="Cheifid" value="{{__('pageContent.superiorroom')}}">{{__('pageContent.superiorroom')}}</option>
                                                            <option id="Cheifid" value="{{__('pageContent.suite')}}">{{__('pageContent.suite')}}</option>
                                                            <option id="Cheifid" value="{{__('pageContent.familyroom')}}">{{__('pageContent.familyroom')}}</option>

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
                                        <input type="checkbox" name="is_active" id="switcherColor4" class="switchery" data-color="success"  />

                                        <label for="switcherColor4" class="card-title m1-1"> {{__('pageContent.status')}}</label>
                                        <input type="text" id="valuechecked">
                                        @error('is_active')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
<input type="text" value="" id="idtyperoom" name="id" hidden>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary " value="{{__('pageContent.edit')}}">
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


        $(document).on('click', '.edit', function() {


            $('ul.nav.nav-tabs a:eq(0)').html('All Rooms Type');
            $('ul.nav.nav-tabs a:eq(1)').html('Add New ');
            $('ul.nav.nav-tabs a:eq(2)').html('Edit ');
            $('ul.nav.nav-tabs a:eq(2)').tab('show');
//var type = $(this).attr('edit_type');

            document.getElementById("anytypeoption").text = $(this).attr('edit_type');
            document.getElementById("anytypeoption").value = $(this).attr('edit_type');
            document.getElementById("idtyperoom").value = $(this).attr('edit_id');
            if($(this).attr('edit_active') == 0){
                document.getElementById("valuechecked").value = 0;
            }else {
                document.getElementById("valuechecked").value = $(this).attr('edit_active');
                document.getElementById("switcherColor4").checked = checked;
            }



        });


        function get_id(){
            var id = document.getElementById("valuechecked").value;
            return id;
        }
    </script>
@endsection
