
@extends('backoffice.main')
@section('content')
 <!--Availability search Block -->
    <div id="boxes">
      <div class="row">
        <div >
           <div class="eight columns"> 
             <a class="yellow_btn" href="{{ URL::to('/backoffice/checkin')}}">Back</a>
             <h3><strong>Lead Guest    : {{$booking_detail['customer_firstname']."   ".$booking_detail['customer_lastname']}}</strong></h3>
             <h3><strong>Email Address : {{$booking_detail['customer_email']}}</strong></h3>
             <h3><strong>Mobile No : {{$booking_detail['customer_mobile']}}</strong></h3>
             <h3><strong>Total Charge  : </strong><span class="green-bold">THB {{number_format(($booking_detail['booking_price']), 2, '.', ',')}}</span></h3>
             <hr/>
             <div style="display:none;" id="infobox" role="alert" class="alert alert-success">
                <strong>Well done!</strong>  Your booking with Orchid Resort Completed.
            </div>
             <?php if($booking_detail['payment_status']==0){?>
             <h3 id="button_confirm"><strong>Check-in Confirmation : </strong>
             <a id="confirm_btn" class="yellow_btn" data-placement="top" data-toggle="confirmation" class="btn" data-original-title="" title="">Click Here</a>
             </h3>
           <span>*** please make sure for payment from customer ***</span>
           <?php }else{ ?>
           <h3 id="button_confirm"><strong>Payment Status : Paid</strong>
           <?php } ?>
           </div>
           <div class="four columns">
            <ul>
            <li class="yellow_btn">Booking Number : {{$booking_detail['bookingnumber']}}</li>
            
            <li><i class="icon-record"></i>Arrival Date : {{str_replace('00:00:00','',$booking_detail['checkin_date'])}}</li>
            <li><i class="icon-record"></i>Departure Date : {{str_replace('00:00:00','',$booking_detail['checkout_date'])}}</li>
            <li><i class="icon-record"></i>Breakfast:  <?php if($roomtypes['include_breakfast']==0){ echo "Excluded"; }else{ echo "Included";}?></li>
            <li><i class="icon-record"></i>Max Occupancy:  {{$roomtypes['roomtype_maxperson']}}</li>
            <li><i class="icon-record"></i>Room Type:  {{$roomtypes['roomtype_name']}}</li>
            <li><strong>Additional Msg :</strong> {{$booking_detail['detail']}} </li>
            </ul>
            <a href="javascript:printbooking();" class="yellow_btn">{{Lang::get('front.print')}}</a> 
           </div>
        </div>

    </div>
 @stop

@section('jssection')
<link rel="stylesheet" href="{{ URL::asset('asset/themes/alertify.core.css')}}" />
<link rel="stylesheet" href="{{ URL::asset('asset/themes/alertify.default.css')}}" id="toggleCSS" />
<script type="text/javascript" src="{{ URL::asset('asset/lib/alertify.min.js')}}"></script>

<script type="text/javascript">

function printbooking(){
  var id= "{{$booking_detail['id']}}";
  $.get("{{ URL::to('backoffice/updateprintstatus') }}/"+id, function( response ) {

    window.print(); 
    return false;

  });

}

function reset () {
      $("#toggleCSS").attr("href", "{{ URL::asset('asset/themes/alertify.default.css')}}");
      alertify.set({
        labels : {
          ok     : "Yes, I confirm",
          cancel : "No, I will recheck again"
        },
        delay : 5000,
        buttonReverse : false,
        buttonFocus   : "ok"
      });
    }
  $("#confirm_btn").on( 'click', function () {
      reset();
      alertify.confirm("Are you confirm to get money from customer ?", function (e) {
        if (e) {
          
          var id= "{{$booking_detail['id']}}";
          $.get("{{ URL::to('backoffice/confirmbooking/"+id+"') }}", function( response ) {
              console.log(response);
              $('#button_confirm').css('display','none');
            });
          
          alertify.success("You've clicked OK");
        }
      });
      return false;
    });
</script> 
@stop