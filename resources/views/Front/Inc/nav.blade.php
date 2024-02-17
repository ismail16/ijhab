<div id="tl-site-top" class="tl-site-top">

    <header id="tl-header" class="tl-header">
        <div class="tl-logo-area">
            <div class="container text-center">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('asset_front/images/logos/logo.png') }}" alt="" class="img-fluid">
                </a>
            </div>
        </div>
        <div class="site-navigation" data-toggle="affix">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i class="icon icon-menu"></i>
                        </span>
                    </button><!-- End of Navbar toggler-->
                    <div class="collapse navbar-collapse justify-content-start" id="navbarSupportedContent">
                        <ul class="navbar-nav ">
                            <li class="nav-item dropdown ">
                                <a class="nav-link" href="{{ url('/') }}">Home</a>
                            </li><!-- li end-->
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" data-toggle="dropdown">
                                    Editorial Board
                                    <span class="nav-indicator">
                                        <i class="fa fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li class="nav-item"><a href="{{ url('board-of-directors') }}">Advisors</a></li>
                                    <li class="nav-item"><a href="{{ url('board-of-editors') }}">Editors</a></li>
                                    <li class="nav-item"><a href="{{ url('reviewers') }}">Reviewers</a></li>
                                    <li class="nav-item"><a href="{{ url('managing-editor') }}">Managing Editor</a></li>
                                    <li class="nav-item"><a href="{{ url('publication-place') }}">Place of
                                            Publication</a></li>

                                </ul>
                            </li><!-- li end-->
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" data-toggle="dropdown">
                                    For Authors
                                    <span class="nav-indicator">
                                        <i class="fa fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li class="nav-item"><a href="{{ url('callforpapers') }}">Call for Papers</a></li>
                                    <li class="nav-item"><a href="{{ url('submissionguidelines') }}">Submission
                                            Guidelines</a></li>
                                    <li class="nav-item"><a href="{{ url('submissionsteps') }}">Submission Steps</a>
                                    </li>
                                    <li class="nav-item"><a href="{{ url('template') }}">Template</a></li>
                                    <li class="nav-item"><a href="{{ url('payment') }}">Payment</a></li>

                                </ul>
                            </li><!-- li end-->
                            <li class="nav-item dropdown"><a class="nav-link" href="{{ url('#') }}">Archive</a>
                            </li><!-- li end-->
                            <li class="nav-item dropdown"><a class="nav-link" href="{{ url('#') }}">Indexing</a>
                            </li><!-- li end-->
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#">
                                    Events
                                    <span class="nav-indicator">
                                        <i class="fa fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li class="nav-item"><a href="{{ url('workshops') }}">Workshop </a></li>
                                    <li class="nav-item"><a href="{{ url('seminars') }}">Seminar/Webinar</a></li>
                                    <li class="nav-item"><a href="{{ url('confarences') }}">Conference</a></li>
                                    <li class="nav-item"><a href="{{ url('trainings') }}">Training</a></li>
                                </ul>
                            </li><!-- li end-->
                            <li class="nav-item dropdown"><a class="nav-link" href="{{ url('aboutus') }}">About Us</a>
                            </li><!-- li end-->
                            <li class="nav-item dropdown"><a class="nav-link" href="{{ url('contacts') }}">Contact
                                    Us</a></li><!-- li end-->
                        </ul>
                        <!--Nav ul end-->
                    </div> <!-- Navbar Collapse End -->
                </nav> <!-- Nav End -->
            </div> <!-- Container end -->
        </div>
    </header>
</div>
