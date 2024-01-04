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




            </div> <!-- Row End -->
        </div> <!-- Container end -->
    </section>
    <!-- About Area End -->
    <section id="tl-service" class="tl-service bg-solid">
        <div class="container">

        </div> <!-- Container end -->
    </section>
@endsection
