@extends('backoffice.main')
@section('content')
<div class="table-responsive">
    <table id="myTable" class="table tablesorter">
	<thead class="border1px">
	<tr>
	<th>Room Photo</th>
	<th>ID</th>
	<th>Room Type Name</th>
	<th>Include Breakfast</th>
	<th>Prices One</th>
	<th>Prices Double</th>
	<th>Edit / Delete</th>
	</tr>
	</thead>
	<tbody> 

@foreach ($roomtypes as $roomtype) 
    <tr><td><img width="100" src="{{ URL::to('/').str_replace('server/php/files/','server/php/files/thumbnail/',$roomtype['roomtype_image']) }}"/></td><td style="width:50px;">{{ $roomtype['id'] }}</td><td>{{ $roomtype['roomtype_name'] }}</td><td>{{ $roomtype['include_breakfast'] }}</td><td>{{ $roomtype['roomtype_price'] }}</td><td>{{ $roomtype['roomtype_prices_double'] }}</td><td><a href="{{ URL::to('./backoffice/settingroomtype').'/'.$roomtype['id'] }}"><i class="icon-tools"></i></a></td></tr>
@endforeach
	
	</tbody>
	</table>
</div>
@stop
@section('jssection')
<script type="text/javascript" src="{{ URL::asset('asset/js/jquery.tablesorter.min.js')}}"></script>
<script>
$(document).ready(function(){
$(function(){
$("#myTable").tablesorter();
});
});
</script>
@stop