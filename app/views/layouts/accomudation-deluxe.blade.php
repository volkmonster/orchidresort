@extends('layouts.main')
@section('content')
<!--Content page-->
  <div id="content-wrap" class="row">
    <div id="content" class="nine columns">
      <div class="region region-content">
        <div id="block-system-main" class="block block-system">
          <div class="content">
            <div id="node-123" class="node node-unit-description node-promoted node-full clearfix">
              <div id="slider" class="flexslider hide_ul">
                <ul class="slides">
                  <li><img alt="" src="{{ URL::asset('asset/images/blog-preview/deluxe_room1.jpg')}}" width="840" height="420" /></li>
                  <li><img alt="" src="{{ URL::asset('asset/images/blog-preview/deluxe_room2.jpg')}}" width="840" height="420" /></li>
                  <li><img alt="" src="{{ URL::asset('asset/images/blog-preview/deluxe_room3.jpg')}}" width="840" height="420" /></li>
                  <li><img alt="" src="{{ URL::asset('asset/images/blog-preview/deluxe_room4.jpg')}}" width="840" height="420" /></li>
                  <li><img alt="" src="{{ URL::asset('asset/images/blog-preview/deluxe_room5.jpg')}}" width="840" height="420" /></li>
                  <li><img alt="" src="{{ URL::asset('asset/images/blog-preview/deluxe_room6.jpg')}}" width="840" height="420" /></li>
                </ul>
              </div>
              <div id="carousel" class="flexslider">
                <ul class="slides">
                  <li><img alt="" src="{{ URL::asset('asset/images/blog-preview/deluxe_room1.jpg')}}" width="840" height="420" /></li>
                  <li><img alt="" src="{{ URL::asset('asset/images/blog-preview/deluxe_room2.jpg')}}" width="840" height="420" /></li>
                  <li><img alt="" src="{{ URL::asset('asset/images/blog-preview/deluxe_room3.jpg')}}" width="840" height="420" /></li>
                  <li><img alt="" src="{{ URL::asset('asset/images/blog-preview/deluxe_room4.jpg')}}" width="840" height="420" /></li>
                  <li><img alt="" src="{{ URL::asset('asset/images/blog-preview/deluxe_room5.jpg')}}" width="840" height="420" /></li>
                  <li><img alt="" src="{{ URL::asset('asset/images/blog-preview/deluxe_room6.jpg')}}" width="840" height="420" /></li>
                </ul>
              </div>
              <div class="row" id="accomodation-room">
                <div class="seven columns" style="padding-right:10px;">
                  <h3>Deluxe Room </h3>
                  <div style="border-top:1px solid #EAEAEA; padding-bottom:7px; margin-top:10px;"></div>
                  <div class="field field-name-field-unit-description field-type-text-long field-label-above">
                    <div class="field-label">Description:&nbsp;</div>
                    <div class="field-items">
                      <div class="field-item even">ห้องดีลักซ์ จำนวน 10 ห้อง อยู่บริเวณชั้น 2 ของอาคารเท่านั้น ทันทีที่ก้าวเข้าไปในห้องท่านจะสัมผัสได้ถึงการตกแต่งที่เน้นสไตล์ความเป็นไทย ซึ่งดูเรียบง่ายแต่ยังคงความหรูหราเอาไว้ พร้อมด้วยสิ่งอำนวยความสะดวกที่ครบครันเช่นกัน ดังนี้
แอร์ เครื่องทำน้ำอุ่น ทีวี เครื่องเล่นดีวีดี ตู้เย็น กระติกน้ำร้อน มินิบาร์ โทรศัพท์ ไดร์เป่าผม รองเท้าแตะ ชุดคลุมอาบน้ำ ไฟฉาย อินเตอร์เน็ทไวไฟสัญญาณแรงสูง น้ำดื่ม ชาและกาแฟ
พร้อมแล้วสำหรับทุกท่านที่ต้องการที่พักใกล้สนามบินในบรรยากาศที่เงียบสงบ และบริการที่ยอดเยี่ยม<br>
                        <br>
                        <img alt="" src="{{ URL::asset('asset/images/hotel-facilities.png')}}" /></div>
                      <br>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
            <br />
          </div>
        </div>
        <!-- /.block --> 
        
      </div>
      <!-- /.region --> 
    </div>
    <div id="sidebar" class="three columns">
      <div class="region region-sidebar">
        <div id="block-block-12" class="block block-block contextual-links-region">
          <h2 ><span>Custom block</span></h2>
          <div class="content">
            <h6>Comis euismod facilisi loquor nutus obruo quis sino. Blandit jumentum jus luptatum molior saluto singularis tincidunt utrum. Dignissim exerci iriure nisl patria. Hos jumentum vel. Duis eligo eu euismod lobortis paratus populus ut </h6>
            <br>
            <div class="pretty medium default btn"><a href="#">Click here for more!</a></div>
          </div>
        </div>
        <!-- /.block -->
        <div class="block block-block" id="block-block-13">
          <h2><span>Media</span></h2> 
          <div class="content">
            <iframe style="width:100%; border:0px;" src="http://player.vimeo.com/video/9743165?title=0&amp;byline=0&amp;portrait=0"></iframe>
          </div>
        </div>
        
        <!-- /.block --> 
        
      </div>
      <!-- /.region --> 
    </div>
  </div>
  <!--End of content -->
@stop