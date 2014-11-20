@extends('backoffice.main')
@section('content')
 <!--Availability search Block -->
  <div id="content-top">
    <div class="row">
      <div>
        <div class="region region-content-top">
          <div id="block-rooms-booking-manager-rooms-availability-search" class="block block-rooms-booking-manager contextual-links-region">
            <h2> <span>Check In : </span> </h2>
            <div class="content">
            	<div id="rooms-wrapper">

                <div class="rows">
                  <div class="four columns">
                    <label for="edit-group-size-adults1">Search By : </label>
                    <select id="searchby" name="searchby" class="form-select">
                      <option value="guest" >Guest</option>
                      <option value="bookingnumber" >Booking ID</option>
                    </select>
                  </div>
                  <div class="four columns">
                    <input type="text" name="search_val" id="search_val" class="form-text" />
                  </div>
                  <div class="two columns">
                    <div class="right">
                      <input type="button" id="search_button" value="{{Lang::get('admin.search')}}" class="form-submit yellow_btn" />
                    </div>
                  </div>
                </div>
            </div>

                </div>
            </div>
          </div>
          <!-- /.block --> 
        </div>
        <!-- /.region --> 
      </div>
    </div>
    <div id="boxes">
      <div class="row">
       <form action="{{ URL::to('/updateallotment')}}" method="post" id="update_allotment" accept-charset="UTF-8">
         <div id="room_manage" style="display:;" class="table-responsive">
            <table id="myTable" class="table tablesorter">
          <thead class="border1px">
          <tr>
          <th>Booking Number</th>
          <th>Check-in Date</th>
          <th>Guest Full Name</th>
          <th>Action</th>
          <th>Print Status</th>
          </tr>
          </thead>
          <tbody id="myTableBody">
          </tbody>
          </table>
        </div>
      </form>

    </div>
 @stop

@section('jssection')
<script type="text/javascript" src="//cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $('#search_button').click(function(){
      
        $.get("{{ URL::to('backoffice/searchbooking') }}?searchby="+$('#searchby').val()+"&val="+$('#search_val').val(), function( response ) {
           $('#myTableBody').html('');
            $.each(response, function(i, item) {

              if(response[i].print_status==false){
                $('<tr>').html("<td>" + response[i].bookingnumber + "</td><td>" + response[i].checkin_date + "</td><td>" + response[i].customer_firstname + "  "+ response[i].customer_lastname + "</td><td><a  href='{{ URL::to('/backoffice/checkin/"+response[i].id+"')}}' class='yellow_btn' name='comfirm_book_"+response[i].id+"' id='comfirm_book_"+response[i].id+"'>Detail</a></td><td>-</td>").appendTo('#myTable');
              }else{
                $('<tr>').html("<td>" + response[i].bookingnumber + "</td><td>" + response[i].checkin_date + "</td><td>" + response[i].customer_firstname + "  "+ response[i].customer_lastname + "</td><td><a  href='{{ URL::to('/backoffice/checkin/"+response[i].id+"')}}' class='yellow_btn' name='comfirm_book_"+response[i].id+"' id='comfirm_book_"+response[i].id+"'>Detail</a></td><td>Printed</td>").appendTo('#myTable');
              }
            });
        });
  });
</script> 
@stop