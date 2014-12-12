@extends('backoffice.main')
@section('content')
 <!--Availability search Block -->
  <div id="content-top">
    <div class="row">
      <div>
        <div class="region region-content-top">
          <form action="{{ URL::to('backoffice/settingpassword')}}" method="post" accept-charset="UTF-8">
          <div id="block-rooms-booking-manager-rooms-availability-search" class="block block-rooms-booking-manager contextual-links-region">
            <h2> <span>Update Password : </span> </h2>
            <div class="content">
            	<div id="rooms-wrapper">
                <div class="rows">
                  <div class="four columns">
                    <label for="edit-group-size-adults1">Old password : </label>
                    <input type="text" name="old_pwd" id="old_pwd" class="form-text" />
                    <span class="text-danger">{{ $errors->first('old_pwd'); }}</span>
                  </div>
                  <div class="four columns">
                    <label for="edit-group-size-adults2">New password : </label>
                    <input type="text" name="new_pwd" id="new_pwd" class="form-text" />
                    <span class="text-danger">{{ $errors->first('new_pwd'); }}</span>
                  </div>
                  <div class="two columns right">
                    
                      <label for="edit-group-size-adults1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                      <input type="submit" id="save_button" value="{{Lang::get('admin.save')}}" class="form-submit yellow_btn" />
                    
                  </div>
                </div>
            </div>

                </div>
            </div>
          </form>
          </div>
          <!-- /.block --> 
        </div>
        <!-- /.region --> 
      </div>
    </div>    
 @stop

@section('jssection')
 
@stop