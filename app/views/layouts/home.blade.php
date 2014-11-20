@extends('layouts.main')
@section('content')
<!--Revolution Slider-->
  <div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
      <ul>
        <!--Slide 1-->
        <li data-transition="random" data-slotamount="7" data-masterspeed="300"> <img alt="" src='asset/images/revolution-slider/orchidresort-pool.jpg' />
          <div class="caption lfr auto " data-x="54" data-y="176" data-speed="11000" data-start="300" data-easing="easeOutExpo" style="z-index:1"> <img alt="" src="asset/images/revolution-slider/cloud-first.png" /> </div>
          <div class="caption lfr auto " data-x="568" data-y="48" data-speed="11000" data-start="100" data-easing="easeOutExpo" style="z-index:0"> <img alt="" src="asset/images/revolution-slider/cloud-second.png" /> </div>
          <div class="caption tp-caption green_title_text fade auto " data-x="600" data-y="121" data-speed="" data-start="700" data-easing="" style="z-index:3">{{Lang::get('front.slide_need')}}</div>
          <div class="caption tp-caption orange_title_text fade auto " data-x="558" data-y="187" data-speed="" data-start="1200" data-easing="" style="z-index:2">{{Lang::get('front.slide_vacation')}}</div>
        </li>
        <!--end of Slide 1--> 
        <!--Slide 2-->
        <li data-transition="random" data-slotamount="7" data-masterspeed="300"> <img alt="" src='asset/images/revolution-slider/orchidbed-thai.jpg' />
          <div class="caption tp-caption very_large_text sfb auto " data-x="217" data-y="98.99998474121094" data-speed="700" data-start="1400" data-easing="easeOutBack" style="z-index:0">{{Lang::get('front.slide_style')}}</div>
          
        </li>
        <!--end of Slide 2-->
      </ul>
      <div class='tp-bannertimer tp-bottom'></div>
    </div>
  </div>
  <!--End of Revolution Slider--> 
  <!--Availability search Block -->
  <div id="content-top">
    <div class="row">
      <div>
        <div class="region region-content-top">
          <div id="block-rooms-booking-manager-rooms-availability-search" class="block block-rooms-booking-manager contextual-links-region">
            <h2> <span>{{Lang::get('front.booking_search')}}</span> </h2>
            <div class="content">
              <form action="{{ URL::to('/booking/prebook')}}" method="post" id="rooms-booking-availability-search-form" accept-charset="UTF-8">
                <div>
                  <div class="start-date">
                    <div class="container-inline-date">
                      <div class="form-item form-type-date-popup form-item-rooms-start-date">
                        <label>{{Lang::get('front.booking_checkin_date')}}</label>
                        <div id="edit-rooms-start-date" class="date-padding">
                          <div class="form-item form-type-textfield form-item-rooms-start-date-date">
                            <label>Date</label>
                            <input type="text" name="checkin" id="rooms-start-date" class="form-text" />
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
                            <input type="text" name="checkout" id="rooms-end-date" class="form-text" />
                            <div class="description">E.g., 07/02/2014</div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <span class="text-danger">{{ $errors->first('checkout'); }}</span>
                  </div>
                  <div class="form-item form-type-select form-item-group-size-adults:1">
                      <label for="edit-group-size-adults1">{{Lang::get('front.booking_group')}}</label>
                      <select id="edit-group-size-adults1" name="amount_guest" class="form-select">
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                      </select>
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
  <!--Boxes-->
  <div id="boxes">
    <div class="row">
      <div class="six columns">
        <div class="region region-box1">
          <div id="block-block-16" class="block block-block contextual-links-region">
            <h2> <span>{{Lang::get('front.topic_welcome')}}</span> </h2>
            <div class="content"> <img alt="" src="asset/images/orchidresort-front.jpg" />
            {{Lang::get('front.content_welcome')}}
            </div>
          </div>
          <!-- /.block --> 
        </div>
        <!-- /.region --> 
      </div>
      <div class="three columns">
        <div class="region region-box2">
          <div id="block-block-13" class="block block-block contextual-links-region">
            <h2> <span>{{Lang::get('front.topic_ourservice')}}</span> </h2>
            {{Lang::get('front.content_ourservice')}}
            <br>
            {{Lang::get('front.content_ourservice_bullet')}}
          </div>
          <!-- /.block --> 
        </div>
        <!-- /.region --> 
      </div>
      <div class="three columns">
        <div class="region region-box3">
          <div id="block-block-17" class="block block-block contextual-links-region">
            <h2> <span>{{Lang::get('front.topic_feeling')}}</span> </h2>
            <div class="content"> <img alt="" src="asset/images/orchidresort-zone.jpg" />
              <div>{{Lang::get('front.content_feeling')}}</div>
            </div>
          </div>
          <!-- /.block --> 
        </div>
        <!-- /.region --> 
      </div>
    </div>
  </div>
  <!--End of boxes--> 
  <!--Carousel Slider
  <div id="content-bottom">
    <div class="row">
      <div>
        <div class="region region-content-bottom">
          <div id="block-views-aba6fc0651a70555fe194f16d93de3d1" class="block block-views contextual-links-region">
            <h2> <span>{{Lang::get('front.topic_accomodation')}}</span> </h2>
            <div class="content">
              <div id="accomodation-slider">
                <ul class="slides">
                  <li>
                    <div class="accomodation-carousel-item" style="margin-bottom:10px; position:relative;"> <a href="accomodation-deluxe-room.html"> <img alt="" src="asset/images/carousel_slider/41327b79.jpg" width="300" height="180" /> </a>
                      <div class="title"> <a href="accomodation-deluxe-room.html">Deluxe Room</a> </div>
                      <div class="price">900฿
                        <div class='starting-from'>Starting from</div>
                      </div>
                      <div class="title_bg"></div>
                    </div>
                  </li>
                  <li>
                    <div class="accomodation-carousel-item" style="margin-bottom:10px; position:relative;"> <a href="accomodation-elegant-room.html"> <img alt="" src="asset/images/carousel_slider/c32251713f.jpg" width="300" height="180" /> </a>
                      <div class="title"> <a href="accomodation-elegant-room.html">Elegant Room</a> </div>
                      <div class="price">900฿
                        <div class='starting-from'>Starting from</div>
                      </div>
                      <div class="title_bg"></div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>
  End of Carousel Slider --> 
  <!--Testimonial Block -->
  <div id="prefooter-first">
    <div class="row">
      <div id="prefooter-content">
        <div class="region region-prefooter-first">
          <div class="block block-views contextual-links-region">
            <div class="content">
              <div id="testimonials">
                <ul class="slides">
                  <!--Testimonial Slide 1 -->
                  <li>
                    <div class="block-testiomonial-text-bg">
                      <div class="quote-testimonial-left"> <i class="icon-quote quote-icon-left"></i> </div>
                      <div class="block-testiomonial-text">When you are walking alone the path in each floor, you will definitely amazed with our Thai contemporary styled decoration together with the flower aroma which make you feel comfortable and relax.
                        <div class="block-testiomonial-person">Ubonwan</div>
                        <div class="block-testiomonial-position">CEO & Founder</div>
                      </div>
                      <div class="quote-testimonial-right"> <i class="icon-quote quote-icon-right"></i> </div>
                    </div>
                  </li>
                  <!--End of Testimonial Slide 1 --> 
                  <!--Testimonial Slide 2 -->
                  <li>
                    <div class="block-testiomonial-text-bg">
                      <div class="quote-testimonial-left"> <i class="icon-quote quote-icon-left"></i> </div>
                      <div class="block-testiomonial-text">We are happy to stay here. due to the good service and nice environment. The room has complete facility and clean. and staff are friendly 
                        <div class="block-testiomonial-person">Jasmin</div>
                        <div class="block-testiomonial-position">Customer</div>
                      </div>
                      <div class="quote-testimonial-right"> <i class="icon-quote quote-icon-right"></i> </div>
                    </div>
                  </li>
                  <!--End of Testimonial Slide 2 -->
                </ul>
              </div>
            </div>
          </div>
          <!-- /.block --> 
        </div>
        <!-- /.region --> 
      </div>
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
          </script> 
<script type="text/javascript">

	jQuery(document).ready(function() {
		jQuery('#invite').ketchup().submit(function() {
			if (jQuery(this).ketchup('isValid')) {
				var action = jQuery(this).attr('action');
				jQuery.ajax({
					url: action,
					type: 'POST',
					data: {
						email: jQuery('#address').val()
	
					},
					success: function(data){
						jQuery('#result').html(data).css('color', 'green');
					},
					error: function() {
						jQuery('#result').html('Sorry, an error occurred.').css('color', 'red');
					}
				});
			}
			return false;
		});
	});
</script>

@stop