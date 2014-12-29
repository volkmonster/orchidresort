@extends('layouts.main')
@section('content') 
<div class="row" id="content-wrap">
  <div class="twelve columns">
              <div class="region region-content">
        <div class="twelve columns boxes">
          <div role="alert" class="alert alert-success">
            <?php  

              $thanklang       = Lang::get('front.booking_done');
              echo str_replace('{email}',$booking_detail['customer_email'],$thanklang);
            ?>
            
          </div>
          <div role="alert" class="alert alert-info">
            {{Lang::get('front.booking_important')}}
          </div>
                  <h4 class="lead">{{Lang::get('front.booking_information')}}</h4>
                  <div >
                     <div class="six columns"> 
                        <div class="img-contain"><img src="{{ URL::to('/').$roomtypes['roomtype_image'] }}"/></div>
                        <h2><strong>{{Lang::get('front.totalcharge')}} : </strong><div class="green-bold">{{number_format(($booking_detail['booking_price']), 2, '.', ',')}} {{Lang::get('front.baht')}}</div></h2>
                     </div>
                     <div class="six columns right">
                      <ul>
                      <li class="yellow_btn">{{Lang::get('front.booking_number')}} : {{$booking_detail['bookingnumber']}}</li>
                      <li><i class="icon-record"></i>{{Lang::get('front.booking_guestname')}} : {{$booking_detail['customer_firstname']."   ".$booking_detail['customer_lastname']}}</li>
                      <li><i class="icon-record"></i>{{Lang::get('front.booking_arrival')}} : {{str_replace('00:00:00','',$booking_detail['checkin_date'])}}</li>
                      <li><i class="icon-record"></i>{{Lang::get('front.booking_departure')}} : {{str_replace('00:00:00','',$booking_detail['checkout_date'])}}</li>
                      <li><i class="icon-record"></i>{{Lang::get('front.booking_amountnight')}} : {{@Session::get('amount_nights')}}</li>
                      <li><i class="icon-record"></i>{{Lang::get('front.booking_amountrooms')}} : {{@Session::get('amount_rooms')}}</li>
                      <li><i class="icon-record"></i>{{Lang::get('front.booking_breakfast')}} :  <?php if($roomtypes['include_breakfast']==true){ echo "Included"; }else{ echo "Excluded"; }?></li>
                      <li><i class="icon-record"></i>{{Lang::get('front.booking_maxoccupancy')}} :  {{$booking_detail['amount_guest']}}</li>
                      <li><i class="icon-record"></i>{{Lang::get('front.booking_roomtype')}} :  {{$roomtypes['roomtype_name']}}</li>
                      </ul>
                      <a href="javascript:void();" class="yellow_btn" onclick="window.print(); return false;">{{Lang::get('front.print')}}</a> 
                     </div>
                  </div>
                </div>
      </div>
              <!-- /.region --> 
            </div>
            </div>
  
@stop
@section('jssection')

<script type="text/javascript" src="{{ URL::asset('asset/js/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('asset/js/additional-methods.js')}}"></script>

<script type="text/javascript" language="javascript" >

    $('#recap').click(function(){
        regenCaptcha();
    });

    regenCaptcha();

    function regenCaptcha(){
        if($('#piccaptcha')){
            $('#piccaptcha').attr('src',"{{ URL::to('/booking/captcha') }}?{{http_build_query(Request::query())}}&ran="+Math.random());
        }
    }
  
  
      $(document).ready(function () {


        var error_firstname = "{{Lang::get('validation.required')}}";
            error_firstname = error_firstname.replace(":attribute", "{{Lang::get('front.booking_firstname')}}");

        var error_lastname = "{{Lang::get('validation.required')}}";
            error_lastname = error_lastname.replace(":attribute", "{{Lang::get('front.booking_lastname')}}");

        var error_email = "{{Lang::get('validation.email')}}";
            error_email = error_email.replace(":attribute", "{{Lang::get('front.booking_email')}}");

        var error_emailconfirm = "{{Lang::get('validation.email')}}";
            error_emailconfirm = error_emailconfirm.replace(":attribute", "{{Lang::get('front.booking_confirm_email')}}");

        var error_captcha = "{{Lang::get('validation.required')}}";
            error_captcha = error_captcha.replace(":attribute", "{{Lang::get('front.booking_captcha')}}");

        var error_mobile = "{{Lang::get('validation.required')}}";
            error_mobile = error_mobile.replace(":attribute", "{{Lang::get('front.booking_mobile')}}");


        $("#customer_form").validate({
                  rules: {
                    firstname: "required",
                    lastname: "required",
                    email: {
                      required: true,
                      email: true
                    },
                    email_confirmation: {
                      required: true,
                      email: true
                    },
                    mobile: {
                      required: true,
                      phoneTH: true
                    },
                    captcha: "required"
                  },
                  messages: {
                    firstname: error_firstname,
                    lastname: error_lastname,
                    mobile: error_mobile,
                    email: error_email,
                    email_confirmation: error_emailconfirm,
                    captcha: error_captcha
                  }
                });
        });
  </script>
@stop