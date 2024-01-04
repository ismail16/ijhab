@extends('Front.master')

@section('main_content')
    <section id="main-container" class="main-container">
        <div id="tl-courses" class="tl-courses">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="grid service-wrapper">

                            @foreach ($result as $item)
                                <div class="element-item service-items web-design">
                                    <div class="course-img">
                                        <img src="{{ asset('slider_image/director/' . $item->image) }}" alt=""
                                            class="img-fluid">


                                    </div> <!-- Course Img end -->
                                    <div class="course-details">
                                        <a href="#">
                                            <h6 class="course-title courseName">{{ $item->name }}</h6>
                                        </a>
                                        <p class="course-mentor"><span class="courseMentor">{{ $item->degignation }}</span>
                                        </p>
                                    </div> <!-- Course details end -->
                                </div><!-- Service Items End -->
                            @endforeach

                        </div> <!-- Service Wrapper End -->

                    </div> <!-- COl end -->
                </div> <!-- Row End -->
            </div> <!-- Container end -->
        </div> <!-- Course end -->
    </section>
@endsection
