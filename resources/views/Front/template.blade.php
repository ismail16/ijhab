@extends('Front.master')
@section('main_content')
    <section id="main-container" class="main-container">
        <div id="tl-contact-us" class="tl-contact-us">
            {{-- <form method="get" action="{{asset('asset_front/images/doc/Paper-Template.pdf')}}">
        <button formtarget="_blank" type="submit">Download!</button>
     </form> --}}
            <p align="center">
                <input style="color: red" type="button" value="Print Template" onClick="window.print()">
            </p>
            <p align="center"><img src="{{ asset('asset_front/images/doc/Paper-Template-1.jpg') }}" alt=""
                    class="responsive"></p>
            <p align="center"><img src="{{ asset('asset_front/images/doc/Paper-Template-2.jpg') }}" alt=""
                    class="responsive"></p>
            <p align="center"><img src="{{ asset('asset_front/images/doc/Paper-Template-3.jpg') }}" alt=""
                    class="responsive"></p>




        </div> <!-- Contact us end -->
    </section>
    <!-- Service End -->
@endsection
