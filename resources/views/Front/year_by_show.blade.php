@extends('Front.master')

@section('main_content')
<!-- News Right Start -->
<section id="main-container" class="main-container">
    <div id="tl-news" class="tl-news">
    <div class="container">
       <div class="row">
          <div class="col-lg-12">
             <div class="post-content post-single">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Article Title & Author</th>
                        <th scope="col">Research Area</th>
                        <th scope="col">Country</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @foreach ($result as $item)

                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>
                                <a href="{{url('year_by_show_details/'.$item->id)}}">

                                    {{$item->title}}
                                    <br/>
                                    <span style="font-weight: 600;font-style: italic"> {{$item->author}}</span>
                                </a>
                            </td>
                            <td>{{$item->research_area}}</td>
                            <td>{{$item->country}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                  </table>
          </div><!-- Col End -->


             </div> <!-- Sidebar Right end -->
          </div> <!-- Col End -->
       </div> <!-- Row End -->
    </div> <!-- Container End -->
 </div> <!-- Mews Left End --></section>
 <!-- News Right End -->
@endsection
