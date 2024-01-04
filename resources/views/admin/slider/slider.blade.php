@extends('admin.master')


@section('admin_main_content')
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Slider</h5>
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
            <div class="col-md-4">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Slider Form</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-wrap">
                                        <form method="POST" action="{{ url('slider') }}" enctype="multipart/form-data">

                                            @csrf
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="exampleInputuname_1">Slider
                                                    Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="icon-frame"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="exampleInputuname_1"
                                                        placeholder="slider name" name="name" autocomplete="new-password"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="exampleInputEmail_1">image
                                                    (1920x820)</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="icon-cloud-upload"></i></div>
                                                    <input type="file" class="form-control" id="exampleInputEmail_1"
                                                        name="image" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="exampleInputpwd_1">Titel</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="icon-lock"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="exampleInputpwd_1"
                                                        placeholder="title" name="title" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="exampleInputpwd_2">subtitle</label>
                                                <div class="input-group">

                                                    <div class="input-group-addon"><i class="icon-lock"></i>
                                                    </div>
                                                    <textarea name="subtitle" id="" cols="80" rows="10" class="form-control" required></textarea>
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
                                            <a href="{{ url('slider') }}" class="btn btn-default">Cancel</a>
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
                            <h6 class="panel-title txt-dark">Slider List</h6>
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
                                                <th style="width:16.6%;">Image</th>
                                                <th style="width:16.6%;">Title</th>
                                                <th style="width:16.6%;">sub-titel</th>
                                                <th style="width:16.6%;">status</th>
                                                <th style="width:16.6%;">action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($result as $item)
                                                <tr>
                                                    <td>
                                                        <a style="color: blue"
                                                            href="{{ url('slider/' . $item->slider_id . '/edit') }}"
                                                            target="_blank">{{ $item->name }}</a>

                                                    </td>
                                                    <td>
                                                        <img src="{{ asset('slider_image/' . $item->image) }}"
                                                            width="100%" alt="">
                                                    </td>
                                                    <td>{{ $item->title }}</td>
                                                    <td>{{ $item->subtitle }}</td>
                                                    <td>{{ $item->status }}</td>
                                                    <td><a href="{{ url('slider_delete/' . $item->slider_id) }}"><i
                                                                class="btn btn-danger fa fa-trash"></i></a></td>
                                                </tr>
                                            @endforeach

                                        </tbody>


                                    </table>
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
