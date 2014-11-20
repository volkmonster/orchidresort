@extends('backoffice.main')
@section('content')
 <!--Availability search Block -->
  <div id="content-top">
    <div class="row">
      <div>
        <div class="region region-content-top">
          <div id="block-rooms-booking-manager-rooms-availability-search" class="block block-rooms-booking-manager contextual-links-region">
            <label> <h2>Bookings : </h2> </label>
            <div class="content">
            	<div id="rooms-wrapper">

                <div class="rows"> 

                  <div class="twelve columns">
                    <label for="edit-group-size-children1">Action Status</label>
                    <select id="action" name="action" class="form-select">
                    <option value="All">All</option>
                    <option value="1">Acknowledged</option>
                    <option value="0">Pending</option>
                    </select>
                    <label for="edit-group-size-children1">Booking Status</label>
                  
                    <select id="status" name="status" class="form-select">
                      <option value="All">All</option>
                      <option value="0">Admended</option>
                      <option value="1">Confirmed</option>
                      <option value="2">Cancel</option>
                    </select>
                  </div>
                </div>
                  <div class="rows">
                    <div class="six columns">
                      <div class="start-date">
                      <div class="container-inline-date">
                        <div class="form-item form-type-date-popup form-item-rooms-start-date">
                          <label>Booking From : </label>
                          <div id="edit-rooms-start-date" class="date-padding">
                            <div class="form-item form-type-textfield form-item-rooms-start-date-date">
                              <label>Date</label>
                              <input type="text" name="bookfrom" id="bookfrom" class="form-text" />
                              <div class="description">E.g., 07/02/2014</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>
                    </div>
                    <div class="six columns mgl20">
                    <div class="end-date">
                      <div class="container-inline-date">
                        <div class="form-item form-type-date-popup form-item-rooms-end-date">
                          <label>To :</label>
                          <div id="edit-rooms-end-date" class="date-padding">
                            <div class="form-item form-type-textfield form-item-rooms-end-date-date">
                              <label>Date</label>
                              <input type="text" name="bookto" id="bookto" class="form-text" />
                              <div class="description">E.g., 07/02/2014</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                  </div>
                <div class="rows">
                  <div class="six columns">
                    <div class="start-date">
                      <div class="container-inline-date">
                        <div class="form-item form-type-date-popup form-item-rooms-start-date">
                          <label>Check-in Date From : </label>
                          <div id="edit-rooms-start-date" class="date-padding">
                            <div class="form-item form-type-textfield form-item-rooms-start-date-date">
                              <label>Date</label>
                              <input type="text" name="checkinfrom" id="checkinfrom" class="form-text" />
                              <div class="description">E.g., 07/02/2014</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="six columns mgl20">
                    <div class="end-date">
                      <div class="container-inline-date">
                        <div class="form-item form-type-date-popup form-item-rooms-end-date">
                          <label>To :</label>
                          <div id="edit-rooms-end-date" class="date-padding">
                            <div class="form-item form-type-textfield form-item-rooms-end-date-date">
                              <label>Date</label>
                              <input type="text" name="checkinto" id="checkinto" class="form-text" />
                              <div class="description">E.g., 07/02/2014</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="rows">
                  <div class="right">
                  <div class="form-actions form-wrapper" id="edit-actions">
                    <input type="button" id="search_button" value="{{Lang::get('front.booking_search_for')}}" class="form-submit yellow_btn" />
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
				<th>Booking ID</th>
				<th>Acknowlegment</th>
				<th>Action Status</th>
				<th>Booking Status</th>
				<th>Guest Name</th>
        <th>Book Date</th>
        <th>Check-in Date</th>
        <th>Check-out Date</th>
				</tr>
				</thead>
				<tbody id="myTableBody">
				</tbody>
				</table>
			</div>
		</form>

	</div>
  
  </div>

 @stop

@section('jssection')
<script type="text/javascript" src="//cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">


$('#search_button').click(function(){
	$.get("{{ URL::to('backoffice/databooking') }}?searchby="+$('#searchby').val()+"&action="+$('#action').val()+"&status="+$('#status').val()+"&bookfrom="+$('#bookfrom').val()+"&bookto="+$('#bookto').val()+"&checkinfrom="+$('#checkinfrom').val()+"&checkinto="+$('#checkinto').val(), function( response ) {
		$('#myTableBody').html('');
    $.each(response, function(i, item) {
	        var acknowlegment = ""; 
          var action        = "pending"; 
          var book_status   = "Amended";

          if(response[i].account_id>0){
            acknowlegment = response[i].account_fullname;
            action ="Acknowledged";
          }
          if(response[i].booking_status==1){
            book_status = "Confirmed";
          }else if(response[i].booking_status==2){
            book_status = "Cancel";
          }

          if(action=="Acknowledged"){
          $('<tr style="background-color:#79be28;">').html(
            "<td ><a href=\"{{ URL::to('backoffice/checkin/"+response[i].id+"')}}\">" + response[i].bookingnumber + "</a></td><td>" + acknowlegment + "</td><td>" + action + "</td><td>" + book_status + "</td><td>" + response[i].customer_firstname +" "+ response[i].customer_lastname + "</td><td>" + response[i].created_at + "</td><td>" + response[i].checkin_date + "</td><td>" + response[i].checkout_date + "</td>").appendTo('#myTable');
        }else{
	    		$('<tr>').html(
	        	"<td ><a href=\"{{ URL::to('backoffice/checkin/"+response[i].id+"')}}\">" + response[i].bookingnumber + "</a></td><td>" + acknowlegment + "</td><td>" + action + "</td><td>" + book_status + "</td><td>" + response[i].customer_firstname +" "+ response[i].customer_lastname + "</td><td>" + response[i].created_at + "</td><td>" + response[i].checkin_date + "</td><td>" + response[i].checkout_date + "</td>").appendTo('#myTable');
			  }

		});

	});
});

$('#save_button').click(function(){

	$.each($('.xxx'),function(i, item){
		//console.log(item.value);
		//console.log(item.defaultValue);

		if(item.value!=item.defaultValue){
				// Update allotment	
				$.get("{{ URL::to('backoffice/updateallotment') }}?name="+item.name+"&newvalue="+item.value, function( response ) {
					console.log(response);
				});
		}
	});
	
});


            
             //Datepicker settings
            var picker1 = new Pikaday({
                field: document.getElementById('bookfrom'),
                firstDay: 1,
                format: 'DD/MM/YYYY',
                minDate: moment().subtract({
                    days: 180
                }).toDate(),
                yearRange: [2000, 2020],
                onSelect: function() {
                    var date = document.createTextNode(this.getMoment().format('Do MMMM YYYY') + ' ');
                }
            });

            var picker2 = new Pikaday({
                field: document.getElementById('bookto'),
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

             //Datepicker settings
            var picker3 = new Pikaday({
                field: document.getElementById('checkinfrom'),
                firstDay: 1,
                format: 'DD/MM/YYYY',
                minDate: moment().subtract({
                    days: 180
                }).toDate(),
                yearRange: [2000, 2020],
                onSelect: function() {
                    var date = document.createTextNode(this.getMoment().format('Do MMMM YYYY') + ' ');
                }
            });

            var picker4 = new Pikaday({
                field: document.getElementById('checkinto'),
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
        </script> 
@stop