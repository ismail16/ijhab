<div id="tl-slider" class="tl-slider">
    <div class="tl-slider-carousel owl-carousel">

        @php $result = App\sliderModel::getSliders()  @endphp
        @foreach ($result as $item)
            <div class="tl-slider-wrapper" style="background-image: url({{ asset('slider_image/' . $item->image) }})">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="slider-content">
                                    <h1 class="slider-title">{{ $item->name }}</h1>
                                    <!--<p class="slider-text">-->
                                    <!--  We have 20 years Experience on this profession. it is pleasure, but because those who do not know-->
                                    <!--  how to pursue pleasure rationally encounter consequences that are extremely painful.-->
                                    <!--</p> <!-- Slider text end -->-->
                                    <div class="slider-btn">
                                        {{-- <a href="#" class="btn btn-border">Enrol Now</a> --}}
                                    </div> <!-- Slider btn end -->
                                </div> <!-- Slider Content end -->
                            </div> <!-- COl End -->
                        </div> <!-- Row End -->

                    </div> <!-- Container end -->
                </div> <!-- Slider Inner end -->
            </div> <!-- Slider Wrapper end -->
        @endforeach
    </div> <!-- Slider Carousel end -->
</div>
