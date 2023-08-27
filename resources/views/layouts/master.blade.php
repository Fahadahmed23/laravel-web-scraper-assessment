<!DOCTYPE html>
<html>
<head>

    <!-- Add your CSS and other common header-related elements here -->

    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

	<title>@yield('title') | Admin Panel | appiskey</title>

    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Basic Styles -->

	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/bootstrap.min.css') }}?v={{ config('app.cache_buster') }}">
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/font-awesome.min.css') }}?v={{ config('app.cache_buster') }}">

	<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/smartadmin-production-plugins.min.css') }}?v={{ config('app.cache_buster') }}">
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/smartadmin-production.min.css') }}?v={{ config('app.cache_buster') }}">
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/smartadmin-skins.min.css') }}?v={{ config('app.cache_buster') }}">

    <!-- SmartAdmin RTL Support -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/smartadmin-rtl.min.css') }}?v={{ config('app.cache_buster') }}">

 
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/demo.min.css') }}?v={{ config('app.cache_buster') }}">

    <!-- FAVICONS -->
    <link rel="shortcut icon" href="{{ asset('img/favicon/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('img/favicon/favicon.ico') }}" type="image/x-icon">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> -->
    <!-- GOOGLE FONT -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Specifying a Webpage Icon for Web Clip
            Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
    <link rel="apple-touch-icon" href="{{ asset('img/splash/sptouch-icon-iphone.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/splash/touch-icon-ipad.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/splash/touch-icon-iphone-retina.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/splash/touch-icon-ipad-retina.png') }}">

    <!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Startup image for web apps -->
    <link rel="apple-touch-startup-image" href="{{ asset('img/splash/ipad-landscape.png') }}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
    <link rel="apple-touch-startup-image" href="{{ asset('img/splash/ipad-portrait.png') }}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
    <link rel="apple-touch-startup-image" href="{{ asset('img/splash/iphone.png') }}" media="screen and (max-device-width: 320px)">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    


	<!-- <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> -->
	<script src="https://cdn.ckeditor.com/4.16.2/full-all/ckeditor.js"></script>
	<!-- <script src="https://cdn.ckeditor.com/4.16.2/full-all/plugins/justify/plugin.js"></script> -->



	<style>
			.md-editor>textarea {
			background: #fff !important;
			border: 1px solid !important;
			margin-bottom: 15px !important;
			width: 99% !important;
			}
			.jarviswidget-color-purple>header {
			border-color: #474544!important;
			background: #474544 !important;
			color: #fff !important;
			}
			.jarviswidget {
			margin: 6px 0 28px !important;
			}
			.md-editor {
			padding-left: 12px !important;
			}
			/* Start Select Language Code Styling */
			.form-group label.control-label.col-md-12 {
			font-size: 15px;
			color: #ffffff;
			background: #474544;
			padding: 12px;
			}
			/* Select Language Code Styling End */
			select.form-control {
			width: 49%;
			height: 44px;
			margin: 15px 0;
			}


			/** Page Limit & Search Filter Ends  */

			.search-container {
			display: flex;
			align-items: center;
			}


			#filter-input {
			flex: 1;
			padding: 6px;
			max-width: 200px;
			margin-right:3px;
			}


			button {
			background-color: #f2f2f2;
			border: none;
			color: #666;
			padding: 8px;
			cursor: pointer;
			transition: transform 0.3s;
			}


			button:hover {
			transform: scale(1.2);
			}
			.dataTables_length {
			display: flex;
			align-items: center;
			text-align: right;
			}


			.dataTables_length {
			display: flex;
			justify-content: flex-end;
			align-items: center;
			}


			.dataTables_length > label{
			padding:0px;


			height: 100%;
			}


			select.form-control {
			height: auto;
			margin: 0;
			}


			.dataTables_filter > label {
			margin-left: 12px;
			}


			@media (max-width: 767px) {
				#dt_basic_optimist_length,
				.dataTables_filter > label {
				display: block;
				text-align: center;
				}
			}

			@media (max-width: 767px) {
				.dataTables_length {
				display: block;
				text-align: center;
				}
			
			}

			@media (max-width: 425px) {
				h4 {
				font-size: 16px; /* Adjust the font size as needed */
				}

			@media (max-width: 395px) {
			h4 {
			font-size: 14px; /* Adjust the font size as needed */
			}
			}
			
			@media (max-width: 400px) {
				#search-mobile {
				display: none;
				}
			}

			/** Page Limit & Search Filter Ends  */

			/* Disable click events and change cursor for disabled pagination links in DataTables */
			.dataTables_paginate .disabled a {
				pointer-events: none; /* Disable pointer events, preventing click */
				cursor: default; /* Set cursor to default, indicating that it's not clickable */
			}
		

        }
	</style>
</head>





<body>
<!--

	TABLE OF CONTENTS.

	Use search to find needed section.

	===================================================================

	|  01. #CSS Links                |  all CSS links and file paths  |
	|  02. #FAVICONS                 |  Favicon links and file paths  |
	|  03. #GOOGLE FONT              |  Google font link              |
	|  04. #APP SCREEN / ICONS       |  app icons, screen backdrops   |
	|  05. #BODY                     |  body tag                      |
	|  06. #HEADER                   |  header tag                    |
	|  07. #PROJECTS                 |  project lists                 |
	|  08. #TOGGLE LAYOUT BUTTONS    |  layout buttons and actions    |
	|  09. #MOBILE                   |  mobile view dropdown          |
	|  10. #SEARCH                   |  search field                  |
	|  11. #NAVIGATION               |  left panel & navigation       |
	|  12. #RIGHT PANEL              |  right panel userlist          |
	|  13. #MAIN PANEL               |  main panel                    |
	|  14. #MAIN CONTENT             |  content holder                |
	|  15. #PAGE FOOTER              |  page footer                   |
	|  16. #SHORTCUT AREA            |  dropdown shortcuts area       |
	|  17. #PLUGINS                  |  all scripts and plugins       |

	===================================================================

	-->

	<!-- #BODY -->
	<!-- Possible Classes

		* 'smart-style-{SKIN#}'
		* 'smart-rtl'         - Switch theme mode to RTL
		* 'menu-on-top'       - Switch to top navigation (no DOM change required)
		* 'no-menu'			  - Hides the menu completely
		* 'hidden-menu'       - Hides the main menu but still accessable by hovering over left edge
		* 'fixed-header'      - Fixes the header
		* 'fixed-navigation'  - Fixes the main menu
		* 'fixed-ribbon'      - Fixes breadcrumb
		* 'fixed-page-footer' - Fixes footer
		* 'container'         - boxed layout mode (non-responsive: will not work with fixed-navigation & fixed-ribbon)
	-->
	<body class="">

		<!-- HEADER -->
		<header id="header">
			<div id="logo-group">

			
				<!-- HTML code -->
				<div style="display: flex; align-items: center;">
					<a href="{{ route('movies') }}" id="logo" style="margin-bottom: 3px; margin-top: 3px;">
						<img src="{{ asset('img/LOGOADMIN.webp')}}" alt="appiskey Admin Panel" style="width: 150px; height: 43px; border-radius: 25px;">
					</a>
				</div>

	

				<!-- AJAX-DROPDOWN : control this dropdown height, look and feel from the LESS variable file -->
				<div class="ajax-dropdown">
				
					<!-- the ID links are fetched via AJAX to the ajax container "ajax-notifications" -->
					<div class="btn-group btn-group-justified" data-toggle="buttons">
						<label class="btn btn-default">
							<input type="radio" name="activity" id="ajax/notify/mail.html">
							Msgs (14) </label>
						<label class="btn btn-default">
							<input type="radio" name="activity" id="ajax/notify/notifications.html">
							notify (3) </label>
						<label class="btn btn-default">
							<input type="radio" name="activity" id="ajax/notify/tasks.html">
							Tasks (4) </label>
					</div>

					<!-- notification content -->
					<div class="ajax-notifications custom-scroll">

						<div class="alert alert-transparent">
							<h4>Click a button to show messages here</h4>
							This blank page message helps protect your privacy, or you can show the first message here automatically.
						</div>

						<i class="fa fa-lock fa-4x fa-border"></i>

					</div>
					<!-- end notification content -->

					<!-- footer: refresh area -->
					<span> Last updated on: 12/12/2013 9:43AM
						<button type="button" data-loading-text="<i class='fa fa-refresh fa-spin'></i> Loading..." class="btn btn-xs btn-default pull-right">
							<i class="fa fa-refresh"></i>
						</button> </span>
					<!-- end footer -->

				</div>
				<!-- END AJAX-DROPDOWN -->
			</div>

			<!-- projects dropdown -->
			<div class="project-context hidden-xs">



			</div>
			<!-- end projects dropdown -->

			<!-- pulled right: nav area -->
			<div class="pull-right">

				<!-- collapse menu button -->
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
				</div>
				<!-- end collapse menu -->

				<!-- #MOBILE -->
				<!-- Top menu profile link : this shows only when top menu is active -->
				<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
					<li class="">
						<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown">
							<img src="{{ asset('img/avatars/sunny.png') }}" alt="John Doe" class="online" />
						</a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Setting</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
							</li>
							<li class="divider"></li>


							@if(Auth::check())
							<li>
								<a href="{{ route('logout') }}" class="padding-10 padding-top-5 padding-bottom-5" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
								</form>
							</li>
							@endif


						</ul>
					</li>
				</ul>

				<!-- logout button -->
				@if(Auth::check())
				<div id="logout" class="btn-header transparent pull-right">

					<span>
						<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form1').submit();">
						<i class="fa fa-sign-out"></i>
					</a>
					</span>
				</div>
				<form id="logout-form1" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
				@endif

				<!-- end logout button -->

				<!-- search mobile button (this is hidden till mobile view port) -->
				<div id="search-mobile" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>
				</div>
				<!-- end search mobile button -->


				<!-- fullscreen button -->
				<div id="fullscreen" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
				</div>
				<!-- end fullscreen button -->


			</div>
			<!-- end pulled right: nav area -->

		</header>
		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel">

			<!-- User info -->
			<div class="login-info">
				<!-- <span>
				<a href="javascript:void(0);" id="show-shortcut">
					<span>
						Admin
					</span>
				</a>
				</span> -->
			</div>

			<!-- end user info -->

			<!-- NAVIGATION : This navigation is also responsive-->
			<nav>
				<ul>
			
					<li>
						<a href="{{ url('/movies') }}"><i class="fa fa-lg fa-fw fa-university"></i> <span class="menu-item-parent">Movie</span></a>
					</li>
					
				</ul>
			</nav>
			<span class="minifyme" data-action="minifyMenu">
				<i class="fa fa-arrow-circle-left hit"></i>
			</span>

		</aside>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->

		<!-- Content section -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon"></div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">

				@yield('content')
			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->

		<!-- PAGE FOOTER -->
		<div class="page-footer">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<!-- <span class="txt-color-white"> appiskey - Admin Panel © 2023 </span> -->
					<a href="https://appiskey.com/" target="_blank" class="txt-color-white">appiskey - Admin Panel © 2023</a>
				</div>

				<div class="col-xs-6 col-sm-6 text-right hidden-xs">
					<div class="txt-color-white inline-block">
						<i class="txt-color-blueLight hidden-mobile">Last account activity <i class="fa fa-clock-o"></i> <strong>52 mins ago &nbsp;</strong> </i>
						<div class="btn-group dropup">
							<button class="btn btn-xs dropdown-toggle bg-color-blue txt-color-white" data-toggle="dropdown">
								<i class="fa fa-link"></i> <span class="caret"></span>
							</button>
							<ul class="dropdown-menu pull-right text-left">
								<li>
									<div class="padding-5">
										<p class="txt-color-darken font-sm no-margin">Download Progress</p>
										<div class="progress progress-micro no-margin">
											<div class="progress-bar progress-bar-success" style="width: 50%;"></div>
										</div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<div class="padding-5">
										<p class="txt-color-darken font-sm no-margin">Server Load</p>
										<div class="progress progress-micro no-margin">
											<div class="progress-bar progress-bar-success" style="width: 20%;"></div>
										</div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<div class="padding-5">
										<p class="txt-color-darken font-sm no-margin">Memory Load <span class="text-danger">*critical*</span></p>
										<div class="progress progress-micro no-margin">
											<div class="progress-bar progress-bar-danger" style="width: 70%;"></div>
										</div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<div class="padding-5">
										<button class="btn btn-block btn-default">refresh</button>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END PAGE FOOTER -->

		<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
		Note: These tiles are completely responsive,
		you can add as many as you like
		-->
		<div id="shortcut">
			<ul>
				<li>
					<a href="inbox.html" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span>Mail <span class="label pull-right bg-color-darken">14</span></span> </span> </a>
				</li>
				<li>
					<a href="calendar.html" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i class="fa fa-calendar fa-4x"></i> <span>Calendar</span> </span> </a>
				</li>
				<li>
					<a href="gmap-xml.html" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i class="fa fa-map-marker fa-4x"></i> <span>Maps</span> </span> </a>
				</li>
				<li>
					<a href="invoice.html" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i class="fa fa-book fa-4x"></i> <span>Invoice <span class="label pull-right bg-color-darken">99</span></span> </span> </a>
				</li>
				<li>
					<a href="gallery.html" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i class="fa fa-picture-o fa-4x"></i> <span>Gallery </span> </span> </a>
				</li>
				<li>
					<a href="profile.html" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>My Profile </span> </span> </a>
				</li>
			</ul>
		</div>
    <!-- END SHORTCUT AREA -->

	<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="{{ asset('js/plugin/pace/pace.min.js') }}?v={{ config('app.cache_buster') }}"></script>

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>
			if (!window.jQuery) {
				document.write('<script src="{{ asset('js/libs/jquery-2.1.1.min.js') }}?v={{ config('app.cache_buster') }}"><\/script>');
			}
		</script>

		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="{{ asset('js/libs/jquery-ui-1.10.3.min.js') }}?v={{ config('app.cache_buster') }}"><\/script>');
			}
		</script>

		<!-- IMPORTANT: APP CONFIG -->
		<script src="{{ asset('js/app.config.js') }}?v={{ config('app.cache_buster') }}"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
		<script src="{{ asset('js/plugin/jquery-touch/jquery.ui.touch-punch.min.js') }}?v={{ config('app.cache_buster') }}"></script>

		<!-- BOOTSTRAP JS -->
		<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}?v={{ config('app.cache_buster') }}"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="{{ asset('js/notification/SmartNotification.min.js') }}"></script>

		<!-- JARVIS WIDGETS -->
		<script src="{{ asset('js/smartwidgets/jarvis.widget.min.js') }}?v={{ config('app.cache_buster') }}"></script>

		<!-- EASY PIE CHARTS -->
		<script src="{{ asset('js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js') }}?v={{ config('app.cache_buster') }}"></script>

		<!-- SPARKLINES -->
		<script src="{{ asset('js/plugin/sparkline/jquery.sparkline.min.js') }}?v={{ config('app.cache_buster') }}"></script>

		<!-- JQUERY VALIDATE -->
		<script src="{{ asset('js/plugin/jquery-validate/jquery.validate.min.js') }}?v={{ config('app.cache_buster') }}"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="{{ asset('js/plugin/masked-input/jquery.maskedinput.min.js') }}?v={{ config('app.cache_buster') }}"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<script src="{{ asset('js/plugin/select2/select2.min.js') }}?v={{ config('app.cache_buster') }}"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="{{ asset('js/plugin/bootstrap-slider/bootstrap-slider.min.js') }}?v={{ config('app.cache_buster') }}"></script>

		<!-- browser msie issue fix -->
		<script src="{{ asset('js/plugin/msie-fix/jquery.mb.browser.min.js') }}?v={{ config('app.cache_buster') }}"></script>

		<!-- FastClick: For mobile devices -->
		<script src="{{ asset('js/plugin/fastclick/fastclick.min.js') }}?v={{ config('app.cache_buster') }}"></script>

		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- template settings icon -->
		<!-- Demo purpose only -->
		<!-- <script src="{{ asset('js/demo.min.js') }}?v={{ config('app.cache_buster') }}"></script> -->

		<!-- MAIN APP JS FILE -->
		<script src="{{ asset('js/app.min.js') }}"></script>

		<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
		<!-- Voice command : plugin -->
		<script src="{{ asset('js/speech/voicecommand.min.js') }}?v={{ config('app.cache_buster') }}"></script>

		<!-- SmartChat UI : plugin -->
		<script src="{{ asset('js/smart-chat-ui/smart.chat.ui.min.js') }}?v={{ config('app.cache_buster') }}"></script>
		<script src="{{ asset('js/smart-chat-ui/smart.chat.manager.min.js') }}?v={{ config('app.cache_buster') }}"></script>

		<!-- PAGE RELATED PLUGIN(S) -->
		<script src="{{ asset('js/plugin/datatables/jquery.dataTables.min.js') }}?v={{ config('app.cache_buster') }}"></script>
		<script src="{{ asset('js/plugin/datatables/dataTables.colVis.min.js') }}?v={{ config('app.cache_buster') }}"></script>
		<script src="{{ asset('js/plugin/datatables/dataTables.tableTools.min.js') }}?v={{ config('app.cache_buster') }}"></script>
		<script src="{{ asset('js/plugin/datatables/dataTables.bootstrap.min.js') }}?v={{ config('app.cache_buster') }}"></script>
		<script src="{{ asset('js/plugin/datatable-responsive/datatables.responsive.min.js') }}?v={{ config('app.cache_buster') }}"></script>
		
	
		<!-- Adding Cache Buster to Scripts -->
		<script src="{{ asset('js/plugin/summernote/summernote.min.js') }}?v={{ config('app.cache_buster') }}"></script>
		<script src="{{ asset('js/plugin/markdown/markdown.min.js') }}?v={{ config('app.cache_buster') }}"></script>
		<script src="{{ asset('js/plugin/markdown/to-markdown.min.js') }}?v={{ config('app.cache_buster') }}"></script>
		<script src="{{ asset('js/plugin/markdown/bootstrap-markdown.min.js') }}?v={{ config('app.cache_buster') }}"></script>





		<script type="text/javascript">

		// DO NOT REMOVE : GLOBAL FUNCTIONS!

		$(document).ready(function() {

			pageSetUp();

			/* // DOM Position key index //

			l - Length changing (dropdown)
			f - Filtering input (search)
			t - The Table! (datatable)
			i - Information (records)
			p - Pagination (paging)
			r - pRocessing
			< and > - div elements
			<"#id" and > - div with an id
			<"class" and > - div with a class
			<"#id.class" and > - div with an id and class

			Also see: http://legacy.datatables.net/usage/features
			*/

			/* BASIC ;*/
				var responsiveHelper_dt_basic = undefined;
				var responsiveHelper_datatable_fixed_column = undefined;
				var responsiveHelper_datatable_col_reorder = undefined;
				var responsiveHelper_datatable_tabletools = undefined;

				var breakpointDefinition = {
					tablet : 1024,
					phone : 480
				};

				$('#dt_basic').dataTable({
					"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
					"autoWidth" : true,
					"preDrawCallback" : function() {
						// Initialize the responsive datatables helper once.
						if (!responsiveHelper_dt_basic) {
							responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
						}
					},
					"rowCallback" : function(nRow) {
						responsiveHelper_dt_basic.createExpandIcon(nRow);
					},
					"drawCallback" : function(oSettings) {
						responsiveHelper_dt_basic.respond();
					}
				});

			/* END BASIC */

			/* COLUMN FILTER  */
		    var otable = $('#datatable_fixed_column').DataTable({
		    	//"bFilter": false,
		    	//"bInfo": false,
		    	//"bLengthChange": false
		    	//"bAutoWidth": false,
		    	//"bPaginate": false,
		    	//"bStateSave": true // saves sort state using localStorage
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_fixed_column) {
						responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_fixed_column.respond();
				}

		    });

		    // custom toolbar
		    $("div.toolbar").html('<div class="text-right"><img src="img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');

		    // Apply the filter
		    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {

		        otable
		            .column( $(this).parent().index()+':visible' )
		            .search( this.value )
		            .draw();

		    } );
		    /* END COLUMN FILTER */

			/* COLUMN SHOW - HIDE */
			$('#datatable_col_reorder').dataTable({
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'C>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_col_reorder) {
						responsiveHelper_datatable_col_reorder = new ResponsiveDatatablesHelper($('#datatable_col_reorder'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_col_reorder.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_col_reorder.respond();
				}
			});

			/* END COLUMN SHOW - HIDE */

			/* TABLETOOLS */
			$('#datatable_tabletools').dataTable({

				// Tabletools options:
				//   https://datatables.net/extensions/tabletools/button_options
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
		        "oTableTools": {
		        	 "aButtons": [
		             "copy",
		             "csv",
		             "xls",
		                {
		                    "sExtends": "pdf",
		                    "sTitle": "SmartAdmin_PDF",
		                    "sPdfMessage": "SmartAdmin PDF Export",
		                    "sPdfSize": "letter"
		                },
		             	{
	                    	"sExtends": "print",
	                    	"sMessage": "Generated by SmartAdmin <i>(press Esc to close)</i>"
	                	}
		             ],
		            "sSwfPath": "js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
		        },
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_tabletools) {
						responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#datatable_tabletools'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_tabletools.respond();
				}
			});

			/* END TABLETOOLS */

		})

		</script>
		<script type="text/javascript">

			// DO NOT REMOVE : GLOBAL FUNCTIONS!

			$(document).ready(function() {

				pageSetUp();

				/*
				* SUMMERNOTE EDITOR
				*/

				$('.summernote').summernote({
					height : 180,
					focus : false,
					tabsize : 2
				});

				/*
				* MARKDOWN EDITOR
				*/

				$("#mymarkdown").markdown({
					autofocus:false,
					savable:true
				});

				$(".page-templates-data").markdown({
					autofocus:false,
					savable:false
				})



			});

		</script>

		 <!-- Footer section -->
		 @yield('footer')

		<!-- Your GOOGLE ANALYTICS CODE Below -->
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
			_gaq.push(['_trackPageview']);

			(function() {
			var ga = document.createElement('script');
			ga.type = 'text/javascript';
			ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(ga, s);
			})();
		</script>

	</body>

</html>
