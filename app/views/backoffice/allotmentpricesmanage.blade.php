@extends('backoffice.main')
@section('content')
 <!--Availability search Block -->
  <div id="content-top">
    <div class="row">
      <div>
        <div class="region region-content-top">
          <div id="block-rooms-booking-manager-rooms-availability-search" class="block block-rooms-booking-manager contextual-links-region">
            <label> <span>Rate Control : </span> </label>
            <div class="content">
            	<div id="rooms-wrapper">
                    
                    
                      <label for="edit-group-size-adults1">Rate Plan</label>
                      <select id="edit-group-size-adults1" name="amount_guest" class="form-select">
                        <option value="retail" selected="selected">Retail</option>
                      </select>
                      <label for="edit-group-size-children1">Room Types</label>
                      <select id="roomtrpename" name="roomtrpename" class="form-select">
                        @foreach ($roomtypes as $roomtype)
                        <option value="{{$roomtype['id']}}">{{$roomtype['roomtype_name']}} - ID {{$roomtype['id']}}</option>
                        @endforeach
                      </select>

                  <div class="start-date">
                    <div class="container-inline-date">
                      <div class="form-item form-type-date-popup form-item-rooms-start-date">
                        <label>Date Range From : </label>
                        <div id="edit-rooms-start-date" class="date-padding">
                          <div class="form-item form-type-textfield form-item-rooms-start-date-date">
                            <label>Date</label>
                            <input type="text" name="checkin" id="rooms-start-date" class="form-text" />
                            <div class="description">E.g., 07/02/2014</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="end-date">
                    <div class="container-inline-date">
                      <div class="form-item form-type-date-popup form-item-rooms-end-date">
                        <label>Date Range To :</label>
                        <div id="edit-rooms-end-date" class="date-padding">
                          <div class="form-item form-type-textfield form-item-rooms-end-date-date">
                            <label>Date</label>
                            <input type="text" name="checkout" id="rooms-end-date" class="form-text" />
                            <div class="description">E.g., 07/02/2014</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-actions form-wrapper" id="edit-actions">
                    <input type="button" id="search_button" value="{{Lang::get('front.booking_search_for')}}" class="form-submit yellow_btn" />
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
				<th>Date</th>
				<th>Days</th>
				<th>Single</th>
				<th>Double</th>
				</tr>
				</thead>
				<tbody id="myTableBody">
				</tbody>
				</table>
			</div>
		</form>
		<div class="form-actions form-wrapper right" id="save-actions">
            <input type="button" id="save_button" value="Save" class="form-submit yellow_btn" />
          </div>
		</div>

	</div>
  
  </div>

 @stop

@section('jssection')
<script type="text/javascript" src="//cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">


$('#search_button').click(function(){

	$.get("{{ URL::to('backoffice/dataallotmentprices') }}?id="+$('#roomtrpename').val()+"&from="+$('#rooms-start-date').val()+"&to="+$('#rooms-end-date').val(), function( response ) {
		$('#myTableBody').html('');
    $.each(response, function(i, item) {
	   
	    	if(response[i].allotment_dayname=="Saturday" || response[i].allotment_dayname=="Sunday"){
	    		$('<tr style="background-color:#ccc;">').html(
	        	"<td>" + response[i].allotment_date + "</td><td>" + response[i].allotment_dayname + "</td><td ><input maxlength='4' size='4' type='text' class='xxx' name='single_allot_"+response[i].id+"' id='single_allot_"+response[i].id+"' value='" + response[i].price_one + "' class='form-text' /></td><td><input maxlength='4' size='4' type='text' class='yyy' name='double_allot_"+response[i].id+"' id='double_allot_"+response[i].id+"' value='" + response[i].price_double + "' class='form-text' /></td>").appendTo('#myTable');
	    	}else{
	    		$('<tr>').html(
	        	"<td>" + response[i].allotment_date + "</td><td>" + response[i].allotment_dayname + "</td><td ><input maxlength='4' size='4' type='text' class='xxx' name='single_allot_"+response[i].id+"' id='single_allot_"+response[i].id+"' value='" + response[i].price_one + "' class='form-text' /></td><td><input maxlength='4' size='4' type='text' class='yyy' name='double_allot_"+response[i].id+"' id='double_allot_"+response[i].id+"' value='" + response[i].price_double + "' class='form-text' /></td>").appendTo('#myTable');
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
				$.get("{{ URL::to('backoffice/updateallotmentprice') }}?name="+item.name+"&newvalue="+item.value+"&type=single", function( response ) {
					console.log(response);
				});
		}
	});

  $.each($('.yyy'),function(i, item){
    //console.log(item.value);
    //console.log(item.defaultValue);

    if(item.value!=item.defaultValue){
        // Update allotment 
        $.get("{{ URL::to('backoffice/updateallotmentprice') }}?name="+item.name+"&newvalue="+item.value+"&type=double", function( response ) {
          console.log(response);
        });
    }
  });
	
});




             //Datepicker settings
            var picker1 = new Pikaday({
                field: document.getElementById('rooms-start-date'),
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
        </script> 
@stop