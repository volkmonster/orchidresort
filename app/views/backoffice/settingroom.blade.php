@extends('backoffice.main')
@section('content')
<div class="table-responsive">
    <table id="myTable" class="table tablesorter">
	<thead class="border1px">
	<tr>
	<th>ID</th>
	<th>Room Type</th>
	<th>No. of Rooms</th>
	<th>Max of Occupancy</th>
	<th>Max Extra beds</th>
	<th>Include Breakfast</th>
	</tr>
	</thead>
	<tbody> 

@foreach ($roomtypes as $roomtype)
 
    <tr><td>{{ $roomtype['id'] }}</td><td>{{ $roomtype['roomtype_name'] }}</td><td><input type="number" name="roomtype_rooms_{{ $roomtype['id'] }}" value="{{ $roomtype['number_room'] }}" /></td><td><input type="number" name="roomtype_max_{{ $roomtype['id'] }}" value="{{ $roomtype['roomtype_maxperson'] }}" /></td><td><input type="number" name="roomtype_extra_{{ $roomtype['id'] }}" value="{{ $roomtype['roomtype_maxbedsupport'] }}" /></td><td><input type="checkbox" name="include_breakfast_{{ $roomtype['id'] }}" /></td></tr>
@endforeach
	<tr><td colspan=6>
    <div class="form-actions form-wrapper right" id="edit-actions">
        <input type="button" id="save" value="Save" class="form-submit" />
        <input type="button" id="save" value="Cancel" class="form-submit" />
    </div>
	</td><tr>
	</tbody>
	</table>
</div>
@stop
@section('jssection')

@stop