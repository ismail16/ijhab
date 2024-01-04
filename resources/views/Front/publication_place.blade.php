
@extends('Front.master')

@section('main_content')

<section id="main-container" class="main-container">
   <div id="tl-contact-us" class="tl-contact-us">
   <div class="container">
      <div class="row justify-content-lg-center">
         <div class="col-lg-12 col-md-12">
            <div class="contact-us-wrapper">
               <h2 class="text-center">36/4, Pallabi, Mirpur, Dhaka, Bangladesh</h2>
            </div> <!-- contact wrapper end -->
         </div> <!-- col end -->=
      </div> <!-- Row End -->
   </div> <!-- Container end -->
</div> <!-- Contact us end -->

</section>
<!-- Service End -->

<!-- Map Start -->
<div class="tl-map" id="tl-map">
   <div class="mapouter">
      <div class="gmap_canvas">
        {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d322.78635916889164!2d90.42411404858458!3d23.750560980433153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd7267078b1c9ebbb!2sDigital%20Marketing%20BD!5e0!3m2!1sen!2sbd!4v1603927370745!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> --}}
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14599.755567413717!2d90.35858929922313!3d23.820771932403844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0c1c61277db%3A0xc7d18838730e2e59!2sMirpur%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1604862163315!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
        </iframe>

      </div> <!-- Map canvas end -->
   </div> <!-- Map outer end -->
</div> <!-- Map End --><!-- Map Emd -->
@endsection
