@extends('Front.master')

@section('main_content')
    <!-- Carousel Start -->
    @include('Front.Inc.slider')
    <!-- Carousel End -->
    <section id="tl-intro" class="tl-intro bg-solid">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-4 wow zoomIn" data-wow-delay=".1s">
                    <a href="#" class="tl-intro-wrapper bg-yellow">
                        <span class="intro-icon">
                            <i class="icon icon-calendar"></i>
                        </span> <!-- Intro Icon End -->
                        <div class="intro-content">
                            <h6 class="intro-title">time to strat your paper</h6>
                            {{-- <p>We are here support you</p> --}}
                        </div> <!-- Intro Content end -->
                    </a> <!-- Intro Wrapper end -->
                </div> <!-- Col End -->
                <div class="col-lg-4 wow zoomIn" data-wow-delay=".3s">
                    <a href="#" class="tl-intro-wrapper bg-green">
                        <span class="intro-icon">
                            <i class="icon icon-bell"></i>
                        </span> <!-- Intro Icon End -->
                        <div class="intro-content">
                            <h6 class="intro-title">24 Hours Consultancy</h6>
                            {{-- <p>Your query can get to your goal</p> --}}
                        </div> <!-- Intro Content end -->
                    </a> <!-- Intro Wrapper end -->
                </div> <!-- Col End -->
                <div class="col-lg-4 wow zoomIn" data-wow-delay=".5s">
                    <a href="#" class="tl-intro-wrapper bg-orange">
                        <span class="intro-icon">
                            <i class="icon icon-internet"></i>
                        </span> <!-- Intro Icon End -->
                        <div class="intro-content">
                            <h6 class="intro-title">Online Submission</h6>
                            {{-- <p>Just click to get us</p> --}}
                        </div> <!-- Intro Content end -->
                    </a> <!-- Intro Wrapper end -->
                </div> <!-- Col End -->
            </div> <!-- Row End -->
        </div> <!-- Container end -->
    </section>
    <!-- Intro Area End -->

    <!-- About Area Start -->
    <section id="tl-about" class="tl-about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="column-title wow fadeIn" data-wow-delay=".1s">
                        Welcome to IJHAB
                    </h2>
                    <div class="about-content">
                        <p class="wow fadeIn">Welcome to the International Journal of Humanities Arts and Business Journal
                            website.
                            This double-blind peer review Journal offers four issues each calendar year covering multiple
                            themes and disciplines.
                            Each issue includes original and high quality research articles, book reviews etc. for the
                            readers, industry experts and researchers.
                            The journal is published by Creative Research & Consultancy (CRC) and Research Hub Bangladesh
                            (RHB) in both online and print version.
                            Thank you for your interest in the International Journal of Humanities Arts and Business and for
                            joining us in our commitment to knowledge in the service of practice</p>
                        <div class="row">
                            <div class="col-lg-6 wow fadeIn" data-wow-delay=".1s">
                                <div class="about-box about-bg bg-overlay-green"
                                    style="background-image: url({{ asset('asset_front/images/about/about-bg1.jpg') }})"">
                                    <h3>Call For Paper</h3>
                                    <a href=" #" class="btn btn-border">Check Here</a>
                                </div> <!-- About Box end -->
                            </div> <!-- Col End -->
                            <div class="col-lg-6 wow fadeIn" data-wow-delay=".3s">
                                <div class="about-box about-bg bg-overlay-red"
                                    style="background-image: url({{ asset('asset_front/images/about/about-bg2.jpg') }})"">
                                    <h3>Submission Guidelines</h3>
                                    <a href=" #" class="btn btn-border">Find Out More</a>
                                </div> <!-- About Box end -->
                            </div> <!-- Col End -->
                        </div> <!-- Row End -->
                    </div> <!-- About Content end -->
                </div> <!-- Col end -->
                <div class="col-lg-4 wow fadeInRight">
                    <div class="about-event">
                        <h2 class="event-title">Volumes and Issues</h2>

                        <div class="event-box-wrapper" style="padding-left:1rem!important;">
                            @foreach ($result as $item)
                                @php $countYear = App\ArchiveModel:: countYearData($item->year)@endphp
                                <div style="padding-left:0px!important;">
                                    <a style="font-weight:bold"
                                        href={{ url('year_by_show/' . $item->year) }}>{{ $item->getYear->years_name }} <span
                                            style="color:#000000;">{{ ' (' . $countYear . ')' }}</span></a><br />

                                    @php
                                        $i = 0;
                                        $res = \App\ArchiveModel::getYears($item->year);
                                    @endphp
                                    @foreach ($res as $val)
                                        @php $month_count = App\ArchiveModel::countYearMonth($val->year,$val->month)@endphp

                                        <a style="font-weight:600" href="{{ url('year_by_show/' . $item->year) }}">
                                            {{ $val->getMonth->month_name }} {{ ' (' . $month_count . ')' }}</a><br />
                                    @endforeach
                                </div> <!-- Event Time End -->
                            @endforeach
                        </div> <!-- Event Box End -->

                    </div> <!-- About Event End -->
                </div><!-- Col End -->
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="card-header wow fadeIn" data-wow-delay=".1s"> Editorial board</h2>
                    <div class="card-body">
                        <div class="row  text-center">
                            <div class="col-md-3 p-4 border">
                                <div class="">
                                    <img src="{{ asset('slider_image/editor/613f8003b6fc2.jpeg') }}" alt=""
                                        class="img-fluid rounded">
                                </div>
                                <div class="mt-3">
                                    <h4> Dr. M. Maniruzzaman</h4>
                                    <h5>Editor -in-Chief</h5>
                                    <p>Professor, Department of English, Jahangirnagar University</p>
                                </div>
                            </div>
                            <div class="col-md-3 p-4 border">
                                <div class="">
                                    <img src="{{ asset('slider_image/editor/613f80debdae6.jpeg') }}" alt=""
                                        class="img-fluid rounded">
                                </div>
                                <div class="mt-3">
                                    <h4>Dr. Tanvir Fittin Abir</h4>
                                    <h5>Executive Editor</h5>
                                    <p>Associate Professor, Department of Business Administration, Daffodil International
                                        University</p>
                                </div>
                            </div>
                            <div class="col-md-3 p-4 border">
                                <div class="">
                                    <img src="{{ asset('slider_image/consultans/6152ca8378f79.jpeg') }}" alt=""
                                        class="img-fluid rounded">
                                </div>
                                <div class="mt-3">
                                    <h4>Sk Obaidullah</h4>
                                    {{-- <h5>Editor -in-Chief</h5> --}}
                                    <p>PhD fellow, PU, Gujarat, India. CEO, Research Hub Bangladesh</p>
                                </div>
                            </div>
                            <div class="col-md-3 p-4 border">
                                <div class="">
                                    <img src="{{ asset('slider_image/consultans/6152cb4e43712.jpeg') }}" alt=""
                                        class="img-fluid rounded">
                                </div>
                                <div class="mt-3">
                                    <h4>A.F.M. Moshiur Rahman</h4>
                                    {{-- <h5>Editor -in-Chief</h5> --}}
                                    <p>PhD Fellow, KU, Director, (Research and Publication), Research Hub Bangladesh</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="card-header wow fadeIn" data-wow-delay=".1s"> Publisher</h2>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 p-4">
                                <div class="container">
                                    <h2 class="text-center bold">Country of publication : Bangladesh</h2>
                                    <h3 class="text-center">Published by : Research Hub Bangladesh</h3>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-3 my-5">
                                            <div class="card border-0">
                                                <div class="card-body text-center">
                                                    <i class="fa fa-envelope fa-5x mb-3" aria-hidden="true"></i>
                                                    <h4 class="text-uppercase">email</h4>
                                                    <p>editorijhab@gmail.com</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-3 my-5">
                                            <div class="card border-0">
                                                <div class="card-body text-center">
                                                    <i class="fa fa-phone fa-5x mb-3" aria-hidden="true"></i>
                                                    <h4 class="text-uppercase">call us</h4>
                                                    <p>(+880)1714449527, (+880)1785641759</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-3 my-5">
                                            <div class="card border-0">
                                                <div class="card-body text-center">
                                                    <i class="fa fa-map-marker fa-5x mb-3" aria-hidden="true"></i>
                                                    <h4 class="text-uppercase">Address </h4>
                                                    <address>Bangladesh Office : 36/4, Pallabi, Mirpur, Dhaka, Bangladesh
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-3 my-5">
                                            <div class="card border-0">
                                                <div class="card-body text-center">
                                                    <i class="fa fa-globe fa-5x mb-3" aria-hidden="true"></i>
                                                    <h4 class="text-uppercase">Website</h4>
                                                    <address>www.ijhab.com</address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="tl-service" class="tl-service bg-solid">
        <div class="container">
        </div>
    </section>
@endsection
