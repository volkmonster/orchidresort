
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
              <form action="{{ URL::to('/prebook')}}" method="post" id="rooms-booking-availability-search-form" accept-charset="UTF-8">
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
                    <div class="form-item form-type-select form-item-group-size-children:1">
                      <label for="edit-group-size-children1">{{Lang::get('front.booking_children')}}</label>
                      <select id="edit-group-size-children1" name="amount_children" class="form-select">
                        <option value="0" selected="selected">0</option>
                        <option value="1" <?php if(@$amount_children==1){echo 'selected="selected"'; }else{ echo ""; }?>>1</option>
                        <option value="2" <?php if(@$amount_children==2){echo 'selected="selected"'; }else{ echo ""; }?>>2</option>
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
        <div class="contact-items-wrap">
                  <h4 class="lead">Room Type Information</h4>
                  <div><div class="table-responsive">
    <table id="myTable" class="table tablesorter">
  <thead class="border1px">
  <tr>
  <th></th>
  <th>Room Type</th>
  <th>Max Occupy</th>
  <th>Price(THB)</th>
  
  
  </tr>
  </thead>
  <tbody> 
   <tr><td><input type="radio" name="roomtype" id="rooms-end-date"/></td><td>Deluxe</td><td><i class='icon-user'></i><i class='icon-user'></i></td><td>900</td></tr>
   <tr><td><input type="radio" name="roomtype" id="rooms-end-date"/></td><td>Standard</td><td><i class='icon-user'></i><i class='icon-user'></i></td><td>900</td></tr>
  </tbody>
  </table>
</div>
</div><p></p>
                </div>
        <div class="contact-items-wrap" id="block-system-main">
                
               <h4 class="lead">Customer Information</h4>
              <form action="{{ URL::to('/booking')}}" method="post" id="rooms-booking-availability-search-form" accept-charset="UTF-8">
                  <div>
                    <label>{{Lang::get('front.booking_firstname')}}</label>
                    <input type="text" name="checkin" id="rooms-start-date" class="form-text" value="{{@$checkin}}" />
                  </div>
                  <div>
                    <label>{{Lang::get('front.booking_lastname')}}</label>
                    <input type="text" name="checkin" id="rooms-start-date" class="form-text" value="{{@$checkin}}" />
                  </div>
                  <div>
                    <label>{{Lang::get('front.booking_email')}}</label>
                    <input type="text" name="checkin" id="rooms-start-date" class="form-text" value="{{@$checkin}}" />
                  </div>
                  <div>
                    <label>{{Lang::get('front.booking_mobile')}}</label>
                    <input type="text" name="checkin" id="rooms-start-date" class="form-text" value="{{@$checkin}}" />
                  </div>
                  <div>
                    <label>{{Lang::get('front.booking_spacial_request')}}</label>
                    <textarea required="" name="note" class="form-textarea" id="note" aria-required="true"></textarea>
                  </div>
                  <div class="form-actions form-wrapper" id="edit-actions">
                    <input type="submit" id="edit-submit" value="{{Lang::get('front.booking_search_for')}}" class="form-submit" />
                  </div>
              </form>

        </div>
      </div>
              <!-- /.region --> 
            </div>
            </div>
  
@stop