<!DOCTYPE html>
<html lang="en">
<head>
  
	<!-- Basic metas -->
<title>Thailand airport hotel : Orchid Resort Hotel</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="Thailand airport hotel, orchid resort, hotel near airport" />
<meta name="description" content="Thailand airport hotel : Orchid Resort Hotel">
<meta name="author" content="Nontakorn Ponlasit">
<meta name="distribution" content="{{@Session::get('locale')}}">

<!-- Mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Google Web Fonts -->
<!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,500,600,700&amp;subset=latin,cyrillic,latin-ext,vietnamese,greek,greek-ext,cyrillic-ext" rel="stylesheet" type="text/css">-->
<!-- Booking form CSS --> 
<link rel="stylesheet" href="{{ URL::asset('asset/css/booking/booking_search.css')}}">
<!-- CSS FILES -->
<!-- Site CSS -->
<link rel="stylesheet" href="{{ URL::asset('asset/css/style.css')}}">
<!-- Menu CSS -->
<link rel="stylesheet" href="{{ URL::asset('asset/css/menus.css')}}">
<!-- table CSS -->
<link rel="stylesheet" href="{{ URL::asset('asset/css/watable.css')}}">
<!-- Responsive CSS -->
<link rel="stylesheet" href="{{ URL::asset('asset/css/responsive.css')}}">
<!-- Colors CSS -->
<link rel="stylesheet" href="{{ URL::asset('asset/css/skins/default.css')}}">
<!-- Revolution Slider CSS -->
<link rel="stylesheet" href="{{ URL::asset('asset/vendor/rs-plugin/css/font-style.css')}}">
<link rel="stylesheet" href="{{ URL::asset('asset/css/colorbox_style.css')}}">
<!--Datepicker -->
<link rel="stylesheet" href="{{ URL::asset('asset/vendor/pikaday/pikaday.css')}}">

<?php  if(Request::segment(1)=="accomodation"){ ?>
<!--Panel Slider CSS-->
<link rel="stylesheet" href="{{ URL::asset('asset/css/room-calendar-style.css')}}">
<?php } ?>

</head>

<body>
<div id="layout-mode" class="boxed"><!-- Use classes Wide: wide, Boxed: boxed -->
  <div id="header" class="container">
    <div id="header_line" class="container header_line"> 
      <!-- features top -->
      <div class="row">
        <div class="columns left">
        <!-- Social Icons -->
          
            <ul>
              <li class="left">
                <a class="white" id="language" style="cursor:pointer;">
                <?php if(@Session::get('locale')=="th") echo "EN"; else echo "TH"; ?>
                </a>
              </li>
            </ul>
          
          <!-- end of Social Icons --> 
        </div> 
        <div class="six columns right"> 
          <!-- Phone number -->
          <ul>
            <li class="right"> <i class='icon-user'></i> Welcome : K' <?php $userdata = Session::All(); echo @$userdata['user'];?></li>
          </ul>
          <!-- End of Phone number --> 
        </div>
      </div>
      <!-- end .features top --> 
    </div>
    <div class="row">
      <div id="logo" class="four columns logo"> 
        <!-- logo & slogan --> 
        <a href="/backoffice/checkin" title="Check In"> <img alt="" src="{{ URL::asset('asset/logo.png')}}" /> </a> 
        <!-- end. logo & slogan --> 
      </div>
      <div class="eight columns"> 
        <!--admin menu-->
        <nav id="navigation" role="navigation">
          <div id="main-menu">
            <ul>
              <li><a  href="/backoffice/checkin" <?php if(Request::segment(2)=="checkin") echo 'class="active"'; else  echo ""; ?> ><i class="icon-print"></i>{{Lang::get('admin.menu_checkin')}}</a>
              </li>
              <li> <a title="" <?php if(Request::segment(2)=="allotmentroommanagement") echo 'class="active"'; else  echo ""; ?>><i class="icon-star"></i>{{Lang::get('admin.menu_allotment')}}</a>
              <ul>
                  <li class=""> <a href="/backoffice/allotmentroommanagement">{{Lang::get('admin.menu_allotment_room')}}</a> </li>
                </ul>
              </li>
              <li><a  <?php if(Request::segment(2)=="reportbookings") echo 'class="active"'; else  echo ""; ?> ><i class="icon-print"></i>{{Lang::get('admin.menu_report')}}</a>
                <ul>
                  <li class=""> <a href="/backoffice/reportbookings">{{Lang::get('admin.menu_report_booking')}}</a> </li>
                </ul>
              </li>
              <li><a title="" <?php $pos = strpos(Request::segment(2), "setting"); if($pos !== false) echo 'class="active"'; else  echo ""; ?>><i class="icon-cog"></i>{{Lang::get('admin.menu_setting')}}</a>
                <ul>
                  <li class=""> <a href="/backoffice/settingpassword">{{Lang::get('admin.menu_change_password')}}</a> </li>
                  <li class=""> <a href="/backoffice/settingroom">{{Lang::get('admin.menu_setting_room')}}</a> </li>
                  <li class=""> <a href="/backoffice/settingroomtype">{{Lang::get('admin.menu_setting_roomtype')}}</a></li>
                </ul>
              </li>
              <li class="last"> <a href="/backoffice/logout" title="" <?php if(Request::segment(1)=="contact") echo 'class="active"'; else  echo ""; ?>><i class="icon-logout"></i>{{Lang::get('admin.menu_logout')}}</a></li>
            </ul>
          </div>
        </nav>
        <!--end of admin menu-->
      </div>
    </div>
  </div>
  <?php  if(!Request::segment(1)==""){ ?>
  @section('breadcrumb')
<!--Page title & breadcrumb-->
  <div id="pre-content">
    <div class="row"> 
      <!--start breadcrumb -->
      <div id="breadcrumb">
        <div class="breadcrumb"> <span class="crumbs"><a href="/">{{Lang::get('front.menu_home')}}</a></span>
          <span class="crumbs-current"><span class="crumbs-arrow"> > </span>{{Ucfirst(Request::segment(1))}}</span></div>
      </div>
      <!-- end breadcrumb -->
      <div class="page-title">{{Ucfirst(Request::segment(2))}}</div>
    </div>
    <div class="pre-content-overlay"></div>
  </div>
  <!--end of Page title & breadcrumb--> 
@show
<?php } ?>
  <!-- start section content -->
  @yield('content')
  <!-- end section content -->
  <!--Footer region-->
  <div id="footer">
    <div id="background-footer-overlay">
      
      <div class="footer-overlay"></div>
    </div>
  </div>
  <div class="copyright" id="copyright">
    <div class="row">
      <div class="twelve columns">
        <div class="region region-copyright">
          <div id="block-block-9" class="block block-block contextual-links-region">
            <div class="content">
              <div class="left">
                <input id="lang" type="hidden" value="{{@Session::get('locale')}}"/>
                <h6> <strong class="left">Thailand Airport Hotel - The Orchid Resort.</strong> <br />
                  Copyright © 2014 Orchid Resort, Inc. All Rights Reserved.</h6>
              </div>
              <div class="right"> <img alt="" src="{{ URL::asset('asset/images/payment-methods.png')}}" /> </div>
            </div>
          </div>
          <!-- /.block --> 
        </div>
        <!-- /.region --> 
      </div>
    </div>
  </div>
</div>
<div class="row"></div>
<!-- JS Files -->
<script type="text/javascript" src="{{ URL::asset('asset/js/jquery-2.1.0.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('asset/js/uniform.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('asset/js/jquery.watable.js')}}"></script>

<script type="text/javascript" src="{{ URL::asset('asset/js/bootstrap-transition.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('asset/js/bootstrap-tooltip.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('asset/js/bootstrap-confirmation.js')}}"></script>

<script type="text/javascript" src="{{ URL::asset('asset/js/template.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('asset/js/responsive.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('asset/js/jquery.flexslider-min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('asset/js/jquery.isotope.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('asset/vendor/rs-plugin/jquery.themepunch.plugins.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('asset/vendor/rs-plugin/jquery.themepunch.revolution.min.js')}}"></script>

<script type="text/javascript" src="{{ URL::asset('asset/vendor/pikaday/moment.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('asset/vendor/pikaday/pikaday.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('asset/js/jquery.ketchup.all.min.js')}}" ></script>
<script type="text/javascript">

$('#language').click(function(){
  changelanguage();
});
function changelanguage(){

        var q  = window.location.search;
        var current_lang = document.getElementById('lang').value;
        
          if(current_lang=="en"){
                  window.location.href = window.location.protocol+"//"+window.location.hostname+window.location.pathname+"?lang=th";  
          }else{
                  window.location.href = window.location.protocol+"//"+window.location.hostname+window.location.pathname+"?lang=en"; 
          }

        
    }
    </script>
@yield('jssection')
</body>
</html>
