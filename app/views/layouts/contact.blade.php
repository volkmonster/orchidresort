@extends('layouts.main')
@section('content')
<div id="#contact-map-wrap">
    <iframe width="100%" height="580" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.th/maps/ms?ie=UTF8&amp;hl=en&amp;msa=0&amp;msid=214734223062682296194.0004993f5ea433a6bfeb9&amp;ll=13.737384,100.785656&amp;spn=0.048358,0.051498&amp;z=14&amp;iwloc=0004993f67124b549c339&amp;output=embed"></iframe><br /><small>ดู <a href="http://maps.google.co.th/maps/ms?ie=UTF8&amp;hl=en&amp;msa=0&amp;msid=214734223062682296194.0004993f5ea433a6bfeb9&amp;ll=13.737384,100.785656&amp;spn=0.048358,0.051498&amp;z=14&amp;iwloc=0004993f67124b549c339&amp;source=embed" style="color:#0000FF;text-align:left">Thailand airport hotel (Orchid Resort)</a> ในแผนที่ขนาดใหญ่กว่า</small>
  </div>
  
    <div id="content-wrap" class="row">
    <div id="content" class="twelve columns">
              <div class="region region-content">
        <div class='contact-items-wrap'>
                  <h4 class='lead'>{{Lang::get('front.topic_contact')}}</h4>
                  <p>{{Lang::get('front.content_contact')}}</p>
                </div>
        <div id="block-system-main" class="block block-system">
                <div class="content">
            	 <h4 class='lead'>{{Lang::get('front.topic_office')}}</h4>
		         <ul class='contact-items'>
		            <li><i class='icon-location'></i> <strong>Address: </strong>{{Lang::get('front.content_contact_address')}}</li>
		            <li><i class='icon-phone'></i> <strong>Phone: </strong>{{Lang::get('front.content_contact_phone')}}</li>
		            <li><i class='icon-phone'></i> <strong>Fax: </strong>{{Lang::get('front.content_contact_fax')}}</li>
		            <li><i class='icon-mail'></i> <strong>Email: </strong><a href='mailto:theorchidresort@gmail.com'>theorchidresort@gmail.com</a></li>
		            <li><i class='icon-facebook'></i> <strong>Facebook: </strong><a target="_blank" href='http://www.facebook.com/theorchidresort'>theorchidresort</a></li>
		          </ul>
          		</div>
                </div>
      </div>
              <!-- /.region --> 
            </div>
  </div>
@stop