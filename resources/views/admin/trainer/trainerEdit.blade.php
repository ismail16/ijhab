@extends('admin.master')

@section('admin_main_content')
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Trainer Edit</h5>
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
            <div class="col-md-8">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Trainer Form</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-wrap">
                                        <form method="POST" action="{{ url('trainer/' . $result->trainer_id) }}"
                                            enctype="multipart/form-data">

                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="exampleInputuname_1">Trainer
                                                    Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="icon-frame"></i>
                                                    </div>
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ $result->name }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="exampleInputEmail_1">image
                                                    (150x150)</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="icon-cloud-upload"></i></div>
                                                    <input type="file" class="form-control" id="exampleInputEmail_1"
                                                        name="image">

                                                    <img src="{{ asset('slider_image/trainer/' . $result->image) }}"
                                                        width="10%" alt="{{ $result->image }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="exampleInputpwd_2">Trainer
                                                    Details</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="icon-lock"></i>
                                                    </div>
                                                    <textarea name="details" id="" cols="80" rows="10" class="form-control">{{ $result->details }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group" style="margin-left: 20px">
                                                <label class="control-label mb-10">Status</label>
                                                <div>
                                                    <div class="radio">
                                                        <input type="radio" id="radio_1" value="publish" name="status"
                                                            @if ($result->status == 'publish') {{ 'checked' }} @endif>
                                                        <label for="radio_1">
                                                            publish
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <input type="radio" id="radio_2" name="status"
                                                            @if ($result->status == 'unpublish') {{ 'checked' }} @endif
                                                            value="unpublish">
                                                        <label for="radio_2">
                                                            unpublish
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
@endsection
