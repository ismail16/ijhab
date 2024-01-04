@extends('Front.master')

@section('main_content')
    <section id="main-container" class="main-container">

        <div class="tl-conact-form">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!--<h2 class="column-title">Contact with us</h2>-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h2>{{ $result->title }}</h2>
                        <p style="color:gray;font-weight: 600;font-style: italic">{{ $result->author }}</p>
                        <p style="color:gray;font-weight: 600;font-style: italic;text-transform: capitalize">
                            {{ $result->getMonth->month_name }}</p>

                        @foreach ($result->getPhoto as $val)
                            <img src="{{ asset('files/' . $val->photo) }}" width="800px" />
                        @endforeach
                        <br>
                        <br>
                        <p>
                            <span style="color:#333399;font-weight:600">Abstract</span><br />
                            {!! $result->abstract !!}
                        </p>
                        <p>
                            <span style="color:#333399;font-weight:600">Keyword: </span>
                            {{ $result->keyword }}
                        </p>
                        <p style="color:">
                            <span style="color:#333399;font-weight:600">Research Area: </span>

                            {{ $result->research_area }}
                        </p>
                        <p style="color:">
                            <span style="color:#333399;font-weight:600">Country: </span>
                            {{ $result->country }}
                        </p>

                        <a href="{{ url('download/' . $result->id) }}" target="_blank" class="btn btn-info">download</a>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
