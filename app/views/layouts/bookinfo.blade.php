@extends('layouts.main')
@section('content')
<!--Availability search Block -->
  <div id="content-top">
    <div class="row">
      <div>
        <div class="region region-content-top">
          <div id="block-rooms-booking-manager-rooms-availability-search" class="block block-rooms-booking-manager contextual-links-region">
            <h2> <span>{{Lang::get('front.booking_search')}}</span> </h2>
            <div class="content">
              <form action="{{ URL::to('/booking/prebook')}}" method="post" id="rooms-booking-availability-search-form" accept-charset="UTF-8">
                <div>
                  <div class="start-date">
                    <div class="container-inline-date">
                      <div class="form-item form-type-date-popup form-item-rooms-start-date">
                        <label>{{Lang::get('front.booking_checkin_date')}}</label>
                        <div id="edit-rooms-start-date" class="date-padding">
                          <div class="form-item form-type-textfield form-item-rooms-start-date-date">
                            <label>Date</label>
                            <input type="text" name="checkin" id="rooms-start-date" class="form-text" value="{{@$checkin}}" />
                            <div class="description">E.g., 07/02/2014</div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <span class="text-danger">{{ $errors->first('checkin'); }}</span>
                  </div>
                  <div class="end-date">
                    <div class="container-inline-date">
                      <div class="form-item form-type-date-popup form-item-rooms-end-date">
                        <label>{{Lang::get('front.booking_checkout_date')}}</label>
                        <div id="edit-rooms-end-date" class="date-padding">
                          <div class="form-item form-type-textfield form-item-rooms-end-date-date">
                            <label>Date</label>
                            <input type="text" name="checkout" id="rooms-end-date" class="form-text" value="{{@$checkout}}"/>
                            <div class="description">E.g., 07/02/2014</div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <span class="text-danger">{{ $errors->first('checkout'); }}</span>
                  </div>
                  <div class="form-item form-type-select form-item-rooms">
                    <label>Rooms</label>
                    <select id="edit-rooms" name="rooms" class="form-select">
                      <option value="1" selected="selected">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                    </select>
                  </div>
                  <div id="rooms-wrapper">
                    <div class="form-item form-type-select form-item-group-size-adults:1">
                      <label for="edit-group-size-adults1">{{Lang::get('front.booking_group')}}</label>
                      <select id="edit-group-size-adults1" name="amount_guest" class="form-select">
                        <option value="1" <?php if(@$amount_guest==1){echo 'selected="selected"'; }else{ echo ""; }?>>1</option>
                        <option value="2" <?php if(@$amount_guest==2){echo 'selected="selected"'; }else{ echo ""; }?>>2</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-actions form-wrapper" id="edit-actions">
                    <input type="submit" id="edit-submit" value="{{Lang::get('front.booking_search_for')}}" class="form-submit" />
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- /.block --> 
        </div>
        <!-- /.region --> 
      </div>
    </div>
  </div>
  <!--End of Availability search Block --> 
<div class="row" id="content-wrap">
  <div class="twelve columns" id="content">
              <div class="region region-content">
        <div class="contact-items-book">
                  <h4 class="lead">{{Lang::get('front.booking_information')}}</h4>
                  <div class="twelve columns boxes">
                     <div class="five columns"> 
                        <img src="{{ URL::to('/').str_replace('server/php/files/','server/php/files/thumbnail/',$roomtypes['roomtype_image']) }}"/>
                     </div>
                     <div class="seven columns">
                      <ul>
                      <li><i class="icon-record"></i>{{$roomtypes['roomtype_name']}}</li>
                      <li><i class="icon-record"></i>{{Lang::get('front.booking_checkin_date')}} : {{$allot_from}}</li>
                      <li><i class="icon-record"></i>{{Lang::get('front.booking_checkout_date')}} : {{$allot_to}}</li>
                      <li><i class="icon-record"></i>{{$amount_nights}} {{Lang::get('front.night')}}<?php if($amount_nights>1 && (Session::get('locale')=="en") ){ echo "s"; } ?>, {{$amount_rooms}} {{Lang::get('front.room')}}<?php if($amount_rooms>1 && (Session::get('locale')=="en")){ echo "s"; } ?></li>
                      </ul>
                     </div>
                  </div>
                  <h4 class="lead">{{Lang::get('front.booking_customerinfo')}}</h4>
                  <div class="twelve columns boxes">
              <form id="customer_form" role="form" action="{{ URL::to('/booking/bookinfo')}}" method="post" accept-charset="UTF-8">
                  <div class="six columns">
                    <div>
                    <label>{{Lang::get('front.booking_firstname')}}</label>
                    <input type="text" name="firstname" id="firstname" class="form-text" value="{{@Input::old('firstname')}}" />
                    <span class="text-danger">{{ $errors->first('firstname'); }}</span>
                  </div>
                  <div>
                    <label>{{Lang::get('front.booking_email')}}</label>
                    <input type="text" name="email" id="email" class="form-text" value="{{@Input::old('email')}}" />
                    <span class="text-danger">{{ $errors->first('email'); }}</span>
                  </div>
                  <div>
                    <label>{{Lang::get('front.booking_mobile')}}</label>
                    <input type="text" name="mobile" id="mobile" maxlength="10" class="form-text" value="{{@Input::old('mobile')}}" />
                    <span class="text-danger">{{ $errors->first('mobile'); }}</span>
                  </div>
                  <div>
                    <label>{{Lang::get('front.booking_detail')}}</label>
                    <textarea name="detail" id="detail" rows="4" cols="50" >{{@Input::old('detail')}}</textarea>
                    <span class="text-danger">{{ $errors->first('detail'); }}</span>
                  </div>
                  <div>
                    <label>&nbsp;</label>
                    <span class="input-group-addon" style="padding:0">
                        <img id="piccaptcha" src=""  onclick="return regenCaptcha();" />
                        <span id="recap" style="cursor:pointer;" ><img title="Refresh" alt="Refresh" src="{{ URL::asset('asset/images/refresh.png');}}" /></span>
                    </span>
                    <input type="text" name="captcha" maxlength="5" id="captcha" class="form-text" />
                    <span class="text-danger">{{ $errors->first('captcha'); }}</span>
                    <?php if(Session::has('book_failed')){ ?>
                            <span class="text-danger">{{ Session::get('book_failed') }}</span>
                    <?php } ?>
                  </div>
                  </div>
                  <div class="six columns">
                      <div>
                    <label>{{Lang::get('front.booking_lastname')}}</label>
                    <input type="text" name="lastname" id="lastname" class="form-text" value="{{@Input::old('lastname')}}" />
                    <span class="text-danger">{{ $errors->first('lastname'); }}</span>
                  </div>
                  <div>
                    <label>{{Lang::get('front.booking_confirm_email')}}</label>
                    <input type="text" name="email_confirmation" id="email_confirmation" class="form-text" value="{{@Input::old('email_confirmation')}}" />
                    <span class="text-danger">{{ $errors->first('email_confirmation'); }}</span>
                  </div>
                  </div>
                  <div class="twelve columns">
                    <div class="form-actions form-wrapper right">
                      <input type="submit" id="book-continue" value="{{Lang::get('admin.save')}}" class="yellow_btn form-submit" />
                    </div>
                  </div>
              </form>
                  </div>
                </div>
        <div class="contact-items-book_r" id="block-system-main">
                <h4 class="lead">&nbsp;</h4>
                <div class="twelve columns boxes">
                  <div>
                    <h1 class="green-bold">{{$amount_rooms}} {{Lang::get('front.room')}}<?php if($amount_rooms>1 && (Session::get('locale')=="en")){ echo "s"; } ?> </strong> x {{$amount_nights}} {{Lang::get('front.night')}}<?php if($amount_nights>1 && (Session::get('locale')=="en")){ echo "s"; } ?></h1>
                  </div>
                  <div >
                    <h3>
                    <strong>Total price : </strong><span class="green-bold">{{number_format(($roomtypes['roomtype_price']*$amount_rooms*$amount_nights), 2, '.', ',');}}&nbsp;&nbsp;THB</span>
                    </h3>
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