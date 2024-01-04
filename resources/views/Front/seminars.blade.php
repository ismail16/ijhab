@extends('Front.master')

@section('main_content')
    <section id="tl-service" class="tl-service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="column-title text-center">
                        Our Seminar And Webinar
                    </h2>
                </div> <!-- Col End -->
            </div> <!-- Row End -->
            <div class="row">
                @foreach ($result as $item)
                    <div class="col-lg-4">
                        <div class="feature-box-wrapper">
                            <div class="feature-img">
                                <a class="readmore-btn readmore" href="{{ url('seminars-details/' . $item->seminar_id) }}">
                                    <span><img src="{{ asset('slider_image/seminar/' . $item->image) }}"
                                            alt="{{ $item->image }}" class="img-fluid"></span></a>
                            </div> <!-- Feature Image End -->
                            <div class="feature-content">
                                <h5 class="feature-title">{{ $item->title }}</h5>
                                <p>{{ \Illuminate\Support\Str::limit($item->details, 120, '...') }}</p>
                                <a class="readmore-btn readmore"
                                    href="{{ url('seminars-details/' . $item->seminar_id) }}">Read more</a>
                            </div> <!-- Feature Content end -->
                        </div><!-- Feature Box end -->
                    </div> <!-- Col End -->
                @endforeach
                <!-- Col End -->
            </div> <!-- Row End -->
        </div> <!-- Container End -->
    </section>
@endsection
