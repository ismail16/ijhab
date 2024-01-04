@extends('admin.master')

@section('admin_main_content')
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Course List</h5>
            </div>

            <!-- Breadcrumb -->
            {{-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="index.html">Dashboard</a></li>
                            <li><a href="#"><span>form</span></a></li>
                            <li class="active"><span>form-layout</span></li>
                        </ol>
                    </div> --}}
            <!-- /Breadcrumb -->

        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Course List Form</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-wrap">
                                        <form method="POST" action="{{ url('courselist') }}" enctype="multipart/form-data">

                                            @csrf
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="exampleInputuname_1">Course List
                                                    Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="icon-user"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="exampleInputuname_1"
                                                        placeholder="Course List Name" name="name"
                                                        autocomplete="new-password">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label mb-10 text-left">Date-time</label>
                                                    <div class='input-group date' id='datetimepicker1'>
                                                        <input type='text' class="form-control" name="course_date" />
                                                        <span class="input-group-addon">
                                                            <span class="fa fa-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <label class="control-label mb-10 text-left">Traniner</label>
                                                <div class="form-group">
                                                    @foreach ($traniner as $item)
                                                        <div class="col-sm-4">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="traniner_id[]"
                                                                    value="{{ $item->trainer_id }}">{{ $item->name }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                @if ($errors->has('checkbox'))
                                                    <span style="color:red;">{{ $errors->first() }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label mb-10" for="exampleInputEmail_1">image
                                                    (150x150)</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="icon-cloud-upload"></i></div>
                                                    <input type="file" class="form-control" id="exampleInputEmail_1"
                                                        name="image">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="exampleInputpwd_2"> Details</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="icon-user-following"></i>
                                                    </div>
                                                    <textarea name="details" id="" cols="30" rows="10" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group" style="margin-left: 20px">
                                                <label class="control-label mb-10">Status</label>
                                                <div>
                                                    <div class="radio">
                                                        <input type="radio" id="radio_1" value="publish" checked=""
                                                            name="status">
                                                        <label for="radio_1">
                                                            publish
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <input type="radio" id="radio_2" name="status" value="draft">
                                                        <label for="radio_2">
                                                            draft
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-success mr-10">Submit</button>
                                            <a href="" class="btn btn-default">Cancel</a>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Course List Details</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="datable_1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>
                                                <th style="width:16.6%;">Name</th>
                                                <th style="width:16.6%;">Details</th>
                                                <th style="width:16.6%;">Image</th>
                                                <th>Traniner</th>
                                                <th style="width:16.6%;">status</th>
                                                <th style="width:16.6%;">action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($result as $item)
                                                <tr>
                                                    <td><a style="color:blue;text-decoration: underline"
                                                            href="{{ url('courselist/' . $item->list_id . '/edit') }}">{{ $item->name }}</a>
                                                    </td>
                                                    <td>{{ $item->details }}</td>
                                                    <td>
                                                        <img src="{{ asset('slider_image/course/' . $item->image) }}"
                                                            width="20%" alt="{{ $item->image }}">
                                                    </td>
                                                    <td>
                                                        @if ($item->getTraniner)
                                                            @foreach ($item->getTraniner as $val)
                                                                {{ $val->getTraninerName->name }}
                                                                @if (!$loop->last)
                                                                    ,
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->status }}</td>
                                                    <td><a href="{{ url('delet_consultans/' . $item->id) }}"><i
                                                                class="btn btn-danger fa fa-trash"></i></a></td>
                                                </tr>
                                            @endforeach


                                        </tbody>


                                    </table>
                                    {{ $result->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
@section('extra_js')
    <script>
        $('#datable_1').dataTable({
            "paging": false
        });
    </script>
    {{-- {{dd(Session)}} --}}
    @if (Session::has('success'))
        <script>
            swal({
                titel: "Well Done !!",
                text: "{{ Session::get('success') }}",
                icon: "success",
                buttons: false,
                timer: 3000,
            })
        </script>
    @endif

    @if (Session::has('delete'))
        <script>
            swal({
                title: "Well Done!!",
                text: "{{ Session::get('delete') }}",
                icon: "warning",
                buttons: false,
                timer: 3000,
            })
        </script>
    @endif
@endsection
