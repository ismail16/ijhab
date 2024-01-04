@extends('admin.master')

@section('admin_main_content')
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Archive List</h5>
            </div>

        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Archive List</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Titel</th>
                                                <th>Author</th>
                                                <th>Abstract</th>
                                                <th>Keyword</th>
                                                <th>Month</th>
                                                <th>Year</th>
                                                <th>Reachearch Area</th>
                                                <th>Country</th>
                                                <th>Author's Photo</th>
                                                <th>Upload's</th>
                                                <th>status</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php $i = 1; @endphp
                                            @foreach ($result as $item)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>
                                                        <a href="{{ url('archive_edit/' . $item->id) }}"
                                                            style="color:blue; text-decoration: underline">

                                                            {{ $item->title }}
                                                        </a>
                                                    </td>
                                                    <td> <a href="{{ url('archive_edit/' . $item->id) }}"
                                                            style="color:blue; text-decoration: underline">
                                                            {{ $item->author }}</a></td>
                                                    <td>
                                                        <div style="overflow-y:scroll;overflow-x:hidden;height: 100px;">

                                                            {{ $item->abstract }}
                                                        </div>

                                                    </td>
                                                    <td>{{ $item->keyword }}</td>
                                                    <td>{{ $item->getMonth->month_name }}</td>
                                                    <td>{{ $item->getYear->years_name }}</td>
                                                    <td>{{ $item->research_area }}</td>
                                                    <td>{{ $item->country }}</td>
                                                    <td>
                                                        <div style="overflow-y:scroll;overflow-x:hidden;height: 150px;">
                                                            @foreach ($item->getPhoto as $val)
                                                                <img src="{{ asset('files/' . $val->photo) }}"
                                                                    alt="{{ $val->photo }}" height="100"
                                                                    width="100" />
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('download/' . $item->id) }}"
                                                            class="btn btn-primary">Download Now</a>

                                                    </td>
                                                    <td>{{ $item->status }}</td>
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
