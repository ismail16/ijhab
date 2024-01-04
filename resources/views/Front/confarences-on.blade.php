@extends('Front.master')

@section('main_content')
    <!-- News Right Start -->
    <section id="main-container" class="main-container">
        <div id="tl-news" class="tl-news">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="post-content post-single">
                            <div class="post-media post-image">
                                <img class="img-fluid" src="{{ asset('slider_image/confarence/' . $result->image) }}"
                                    width="100%" alt="{{ $result->image }}">
                            </div> <!-- Media End -->
                            <div class="post-body">
                                <div class="entry-header">
                                    <h2 class="entry-title">
                                        <a href="">{{ $result->title }}</a>
                                    </h2>
                                </div> <!-- Entry Header End -->
                                <div class="post-meta">
                                    <span class="post-meta-time">
                                        <span class="hours"></span>{{ date('Y-m-d', strtotime($result->event_date)) }}
                                    </span>
                                </div><!-- Post meta Right End-->
                                <div class="entry-content">
                                    {!! nl2br($result->details) !!}
                                </div> <!-- Entry Content End -->
                            </div> <!-- post-body end-->
                        </div> <!-- Post End -->
                        <nav class="post-navigation clearfix">
                        </nav><!-- Post Navigation End -->

                        <div class="comments-area" id="comments">
                        </div> <!-- Comment area end -->
                        <div class="comments-form">
                        </div> <!-- Comments form end -->
                    </div><!-- Col End -->
                    <div class="col-lg-4">
                        <div class="sidebar sidebar-right">

                        </div> <!-- Sidebar Right end -->
                    </div> <!-- Col End -->
                </div> <!-- Row End -->
            </div> <!-- Container End -->
        </div> <!-- Mews Left End -->
    </section>
    <!-- News Right End -->
@endsection
