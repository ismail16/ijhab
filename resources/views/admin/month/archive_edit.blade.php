@extends('admin.master')

@section('admin_main_content')
<div class="container-fluid">

                <!-- Title -->
                <div class="row heading-bg">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h5 class="txt-dark">Archive</h5>
                    </div>

                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default card-view">
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-dark">Add Archive</h6>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="form-wrap">
                                            <form method="POST" action="{{ url('update_archive') }}" enctype="multipart/form-data">

                                                @csrf

                                                <input type="hidden" name="id" value="{{$result->id}}"/>
                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <label class="control-label mb-10"
                                                                for="exampleInputuname_1">Title</label>
                                                         <input type="text" class="form-control" name="title" value="{{$result->title}}"/>
                                                        </div>
                                                        <div class="col-md-6">

                                                            <label class="control-label mb-10"
                                                                for="exampleInputuname_1">Author</label>
                                                         <input type="text" class="form-control" name="author" value="{{$result->author}}"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <label class="control-label mb-10"
                                                                for="exampleInputuname_1">Abstract</label>
                                                        <textarea name="abstract" class='form-control'

                                                        > {{$result->abstract}}</textarea>
                                                        </div>
                                                        <div class="col-md-6">

                                                            <label class="control-label mb-10"
                                                                for="exampleInputuname_1">Keyword's</label>
                                                         <input type="text" class="form-control" name="keyword" value="{{$result->keyword}}"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <label class="control-label mb-10"
                                                                for="exampleInputuname_1">Month</label>
                                                       <select name="month" class="form-control">
                                                           @foreach ($month as $val)

                                                           <option value="{{$val->id}}" @if ($val->id==$result->month){{"selected"}}

                                                           @endif  >{{$val->month_name}}</option>
                                                           @endforeach
                                                       </select>
                                                        </div>
                                                       <div class="col-md-6">

                                                            <label class="control-label mb-10"
                                                                for="exampleInputuname_1">Year</label>
                                                                <select name="year" class="form-control">
                                                                    @foreach ($year as $val)

                                                                    <option value="{{$val->id}}" @if ($val->id==$result->year){{"selected"}}

                                                                        @endif>{{$val->years_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <label class="control-label mb-10"
                                                                for="exampleInputuname_1">Reachearch Area</label>
                                                        <input type="text"name="research_area" class='form-control' value="{{$result->research_area}}"/>
                                                        </div>
                                                        <div class="col-md-6">

                                                            <label class="control-label mb-10"
                                                                for="exampleInputuname_1">Country</label>
                                                         <input type="text" class="form-control" name="country" value="{{$result->country}}"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <label class="control-label mb-10"
                                                                for="exampleInputuname_1">Author's Photo</label>
                                                        <input type="file"name="photo[]" class='form-control' multiple/>
                                                        </div>
                                                        <div class="col-md-6">

                                                            <label class="control-label mb-10"
                                                                for="exampleInputuname_1">Upload's</label>
                                                         <input type="file" class="form-control" name="upload_files"/>
                                                        </div>
                                                    </div>


                                                    <div class="form-group" style="margin-left: 20px">
                                                        <label class="control-label mb-10">Status</label>
                                                        <div>
                                                            <div class="radio">
                                                                <input type="radio"  id="radio_1"
                                                                    value="publish" checked="" name="status" @if ($result->status=='publish'){{"checked"}}

                                                                    @endif>
                                                                <label for="radio_1">
                                                                    publish
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <input type="radio" id="radio_2" name="status" @if ($result->status=='draft'){{"checked"}}

                                                                @endif
                                                                    value="draft">
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

                </div>

            </div>

@endsection
@section('extra_js')
<script>
    $('#datable_1').dataTable( {
    "paging": false
} );
</script>
{{-- {{dd(Session)}} --}}
@if (Session::has("success"))
<script>
    swal({
        titel: "Well Done !!",
        text: "{{Session:: get('success')}}",
        icon: "success",
        buttons: false,
        timer:3000,
          })


</script>

@endif

@if (Session::has("delete"))

<script>
    swal({
            title: "Well Done!!",
            text: "{{Session::get('delete')}}",
            icon: "warning",
            buttons: false,
           timer: 3000,
        })

</script>
@endif
@endsection

