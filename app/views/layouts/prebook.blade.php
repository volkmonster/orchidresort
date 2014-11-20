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
              <form action="{{ URL::to('/booking/prebook')}}?{{http_build_query(Request::query())}}" method="post" id="rooms-booking-availability-search-form" accept-charset="UTF-8">
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
                  <div id="rooms-wrapper">
                    <div class="form-item form-type-select form-item-group-size-adults:1">
                      <label for="edit-group-size-adults1">{{Lang::get('front.booking_group')}}</label>
                      <select id="edit-group-size-adults1" name="amount_guest" class="form-select">
                        <option value="1" <?php if($amount_guest==1){echo 'selected="selected"'; }else{ echo ""; }?>>1</option>
                        <option value="2" <?php if($amount_guest==2){echo 'selected="selected"'; }else{ echo ""; }?>>2</option>
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
              <?php if(isset($allot_from)){?>
              <div class="region region-content">
                <div class="contact-items">
                    <h4 class="lead">Room Type Information</h4>
                    <h5 class="right">{{$allot_from}} - {{$allot_to}} | {{$amount_nights}}</h5>
                    <div class="split-blog-item"></div>
                    <div class="table-responsive"><form>
                      <table id="myTable" class="table tablesorter">
                    <thead class="border1px">
                    <tr>
                    <th>Room Type</th>
                    <th>Occupier</th>
                    <th>Price(THB)</th>
                    <th>Amount Rooms</th>
                    <th></th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $count=0; $soldout =0;?>
                      @foreach ($allotments as $allotment)
                     <tr><td>{{ $allotment['roomtype']['roomtype_name'] }}<br/><img src="{{ URL::to('/').str_replace('server/php/files/','server/php/files/thumbnail/',$allotment['roomtype']['roomtype_image']) }}"/></td><td><?php if($amount_guest==2){?><i class='icon-user'></i><i class='icon-user'></i><?php }else{ ?><i class='icon-user'><?php }?></td><td>{{$allotment['maxprice']}}</td><td><select id="room_quata_{{$allotment['roomtype_id']}}" name="room_quata_{{$allotment['roomtype_id']}}" onchange="selectroom(this)" >
                      <?php
                        if($allotment['minroom']<=0){ $soldout=1;}else{ $soldout=0;}
                        
                        for ($i=0; $i < $allotment['minroom']; $i++) {
                          echo "<option value='".$i."' >".$i."</option>";
                        } 
                      ?>
                    </select>
                    </td><td><a class="yellow_btn" <?php if($soldout==0){?> href="{{ URL::to('/booking/bookinfo')}}?bprm={{$link_booking}}&rtif={{$allotment['roomtype_id']}}" validateddlid="room_quata_{{$allotment['roomtype_id']}}" onclick="if(validateClick(this)){ return true;}else{return false;}" name="booking_btn_{{$allotment['roomtype_id']}}" <?php } ?> id="booking_btn_{{$allotment['roomtype_id']}}"/><?php if($soldout==1){ echo "Sold Out";}else{ echo "Book Now";} ?></a></td></tr>
                     <?php $count++;?>
                     @endforeach
                    </tbody>
                    </table>
                  </form>
                  </div>
                </div>
                
              </div>
              <!-- /.region --> 
              <?php } ?>
            </div>
            </div>
  
@stop
@section('jssection')
<script type="text/javascript">
              //Revolution Slider settings
              var tpj = jQuery;
              tpj.noConflict();
              tpj(document).ready(function() {
                  if (tpj.fn.cssOriginal != undefined)
                      tpj.fn.css = tpj.fn.cssOriginal;
                  tpj('.fullwidthbanner').revolution({

                      startheight: 420,
                      onHoverStop: 'on',
                      delay: 9000,
                      shuffle: 'off',
                      touchenabled: 'on',
                      navigationType: 'none',
                      fullWidth: 'on',
                      fullScreen: 'off',
                      lazyLoad: 'off',
                      shadow: 0
 

                  });
              });

               //Datepicker settings
              var picker1 = new Pikaday({
                  field: document.getElementById('rooms-start-date'),
                  firstDay: 1,
                  format: 'DD/MM/YYYY',
                  minDate: moment().subtract({
                      days: 0
                  }).toDate(),
                  yearRange: [2000, 2020],
                  onSelect: function() {
                      var date = document.createTextNode(this.getMoment().format('Do MMMM YYYY') + ' ');
                  }
              });

              var picker2 = new Pikaday({
                  field: document.getElementById('rooms-end-date'),
                  firstDay: 1,
                  format: 'DD/MM/YYYY',
                  minDate: moment().subtract({
                      days: -1
                  }).toDate(),
                  yearRange: [2000, 2020],
                  onSelect: function() {
                      var date = document.createTextNode(this.getMoment().format('Do MMMM YYYY') + ' ');
                  }
              });

              function selectroom(obj){
                  var selectobj = jQuery(obj);
                  
                  var roomtype_id = selectobj.attr('id').replace("room_quata_", "");

                  var booklinkobj = jQuery("#booking_btn_" + roomtype_id);
                  
                  var link = booklinkobj.attr('href');

                  link = "{{ URL::to('/booking/bookinfo')}}?bprm={{@$link_booking}}&rtif="+roomtype_id+"&roomno="+selectobj.val();

                  booklinkobj.attr('href',link);
              }

              function validateClick(btn){

                var ddl = jQuery(btn).attr("validateDDLId");
                  if (jQuery("#" + ddl).val() == "0" || jQuery("#" + ddl).val() == null) {
                    alert("Please select no. of rooms to continue");
                    return false;
                  }else{
                    var roomtype_id = jQuery("#" + ddl).attr('id').replace("room_quata_", "");
                    var link = "{{ URL::to('/booking/bookinfo')}}?bprm={{@$link_booking}}&rtif="+roomtype_id+"&roomno="+jQuery("#" + ddl).val();
                    jQuery(btn).attr('href',link);
                    
                    return true;
                  }

              }
          </script> 
@stop