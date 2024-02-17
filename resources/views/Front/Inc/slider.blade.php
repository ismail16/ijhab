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
                                    <div class="slider-btn">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
