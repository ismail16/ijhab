@extends('admin.master')


@section('admin_main_content')
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">form layout</h5>
            </div>

            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">Dashboard</a></li>
                    <li><a href="#"><span>form</span></a></li>
                    <li class="active"><span>form-layout</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->

        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-md-6 ">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Form with icon</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-wrap">
                                        <form method="POST" action="{{ url('slider/' . $info->slider_id) }}"
                                            enctype="multipart/form-data">

                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="exampleInputuname_1">Slider
                                                    Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="icon-frame"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="exampleInputuname_1"
                                                        value="{{ $info->name }}" name="name"
                                                        autocomplete="new-password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="exampleInputEmail_1">image
                                                    (1920x820)</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="icon-cloud-upload"></i></div>
                                                    <input type="file" class="form-control" id="exampleInputEmail_1"
                                                        name="image">
                                                </div>
                                                <div>
                                                    <span>
                                                        <img src="{{ asset('slider_image/' . $info->image) }}" alt=""
                                                            width="30%">
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="exampleInputpwd_1">Titel</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="icon-lock"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="exampleInputpwd_1"
                                                        value="{{ $info->title }}" name="title">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="exampleInputpwd_2">subtitle</label>
                                                <div class="input-group">

                                                    <div class="input-group-addon"><i class="icon-lock"></i>
                                                    </div>
                                                    <textarea name="subtitle" id="" cols="80" rows="10" class="form-control">{{ $info->subtitle }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group" style="margin-left: 20px">
                                                <label class="control-label mb-10">Status</label>
                                                <div>
                                                    <div class="radio">
                                                        <input type="radio" id="radio_1" value="publish" name="status"
                                                            @if ($info->status == 'publish') {{ 'checked' }} @endif>
                                                        <label for="radio_1">
                                                            publish
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <input type="radio" id="radio_2" name="status"
                                                            @if ($info->status == 'draft') {{ 'checked' }} @endif
                                                            value="draft">
                                                        <label for="radio_2">
                                                            draft
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-success mr-10">update</button>
                                            <a href="{{ url('slider') }}" class="btn btn-default">Cancel</a>
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
    @if (Session::has('success'))
        <script>
            swal({
                title: "Well Done!!",
                text: "{{ Session::get('success') }}",
                icon: "success",
                buttons: false,
                timer: 3000,
            })
        </script>
    @endif
@endsection
