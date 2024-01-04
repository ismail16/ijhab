@extends('admin.master')

@section('admin_main_content')
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">conference</h5>
            </div>
        </div>
        <!-- /Title -->
        <!-- Row -->
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">conference Form</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-wrap">
                                        <form method="POST" action="{{ url('confarence') }}" enctype="multipart/form-data">

                                            @csrf
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="exampleInputuname_1">title</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="icon-user"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="exampleInputuname_1"
                                                        placeholder="Title" name="title" autocomplete="new-password"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="exampleInputEmail_1">image
                                                    (700x400)</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="icon-cloud-upload"></i></div>
                                                    <input type="file" class="form-control" id="exampleInputEmail_1"
                                                        name="image" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="exampleInputpwd_2"> Details</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="icon-user-following"></i>
                                                    </div>
                                                    <textarea name="details" id="" cols="30" rows="10" class="form-control" required></textarea>

                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label mb-10 text-left">Date-time</label>
                                                    <div class='input-group date' id='datetimepicker1'>
                                                        <input type='text' class="form-control" name="confarence_date"
                                                            required />
                                                        <span class="input-group-addon">
                                                            <span class="fa fa-calendar"></span>
                                                        </span>
                                                    </div>
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
                            <h6 class="panel-title txt-dark">conference Info</h6>
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
                                                <th style="width:16.6%;">Title</th>
                                                <th style="width:16.6%;">Details</th>
                                                <th style="width:16.6%;">Date-time</th>
                                                <th style="width:16.6%;">Image</th>
                                                <th style="width:16.6%;">status</th>
                                                <th style="width:16.6%;">action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($result as $item)
                                                <tr>
                                                    <td><a style="color:blue;text-decoration: underline"
                                                            href="{{ url('confarence/' . $item->confarence_id . '/edit') }}">{{ $item->title }}</a>
                                                    </td>
                                                    <td>
                                                        {{ \Illuminate\Support\Str::limit($item->details, 50, '...') }}
                                                    </td>
                                                    <td>{{ date('Y-m-d h:i:s a', strtotime($item->confarence_date)) }}</td>
                                                    <td>
                                                        <img src="{{ asset('slider_image/confarence/' . $item->image) }}"
                                                            width="30%" alt="{{ $item->image }}">
                                                    </td>
                                                    <td>{{ $item->status }}</td>
                                                    <td><a href="{{ url('delet_confarence/' . $item->confarence_id) }}"><i
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
