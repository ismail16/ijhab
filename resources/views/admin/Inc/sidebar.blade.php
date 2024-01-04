<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<li class="navigation-header">
					<span>IJHAB</span>
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
				<a class="" href="{{url('slider')}}" data-toggle="collapse" data-target="#dashboard_dr"><div><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Slider</span></div><div class="pull-right">
					</div><div class="clearfix"></div></a>

				</li>
				<li>
				<a class="" href="{{url('director')}}"><div><i class="zmdi zmdi-male mr-20"></i><span class="right-nav-text">Advisors</span></div><div class="pull-right"></div><div class="clearfix"></div></a>

				</li>
				<li>
				<a class="" href="{{url('editor')}}"><div><i class="zmdi zmdi-male-alt mr-20"></i><span class="right-nav-text">Editor</span></div><div class="pull-right"></div><div class="clearfix"></div></a>

				</li>
				<li>
				<a class="" href="{{url('reviewer')}}"><div><i class="zmdi zmdi-male-female mr-20"></i><span class="right-nav-text">Reviewer</span></div><div class="pull-right"></div><div class="clearfix"></div></a>

				</li>
				<li>
				<a class="" href="{{url('consaltans')}}"><div><i class="zmdi zmdi-group mr-20"></i><span class="right-nav-text">Consaltans</span></div><div class="pull-right"></div><div class="clearfix"></div></a>

				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr"><div class="pull-left"><i class="zmdi zmdi-view-headline mr-20"></i><span class="right-nav-text">Events</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="ecom_dr" class="collapse collapse-level-1">
						<li>
						<a href="{{url('workshop')}}">Workshop</a>
						</li>
						<li>
						<a href="{{url('seminar')}}">Seminar/Webinar</a>
						</li>
						<li>
							<a href="{{url('confarence')}}">Confarence</a>
						</li>
						<li>
						<a href="{{url('traning')}}">Training</a>
						</li>

					</ul>
				</li>
				<li>
				<a class="active" href="javascript:void(0);" data-toggle="collapse" data-target="#form_dr"><div class="pull-left">
                    <i class="zmdi zmdi-calendar mr-20"></i><span class="right-nav-text">Archive</span></div><div class="pull-right">
                        <i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
						<ul id="form_dr" class="collapse collapse-level-1 two-col-list">
						<li>
							<a class="" href="{{url('years')}}">
								Years
							</a>

						</li>
						<li>
						<a href="{{ url('month_view') }}">
                            Month
                        </a>
						</li>
						<li><a href="{{ url('archive_view') }}">Archive</a></li>
						<li><a href="{{ url('archive_list') }}">Archive List</a></li>
					</ul>
				</li>

			</ul>
		</div>
