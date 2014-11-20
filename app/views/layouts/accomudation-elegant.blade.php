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
                  <li><img alt="" src="{{ URL::asset('asset/images/blog-preview/413287cf.jpg')}}" width="840" height="420" /></li>
                  <li><img alt="" src="{{ URL::asset('asset/images/blog-preview/C32295_0c823.jpg')}}" width="840" height="420" /></li>
                  <li><img alt="" src="{{ URL::asset('asset/images/blog-preview/IMG_7691026a.jpg')}}" width="840" height="420" /></li>
                  <li><img alt="" src="{{ URL::asset('asset/images/blog-preview/DSC_9975_172ef.jpg')}}" width="840" height="420" /></li>
                  <li><img alt="" src="{{ URL::asset('asset/images/blog-preview/IMG_9684fa36.jpg')}}" width="840" height="420" /></li>
                  <li><img alt="" src="{{ URL::asset('asset/images/blog-preview/DSC_4363d483.jpg')}}" width="840" height="420" /></li>
                </ul>
              </div>
              <div id="carousel" class="flexslider">
                <ul class="slides">
                  <li><img alt="" src="{{ URL::asset('asset/images/blog-preview/413287cf.jpg')}}" width="840" height="420" /></li>
                  <li><img alt="" src="{{ URL::asset('asset/images/blog-preview/C32295_0c823.jpg')}}" width="840" height="420" /></li>
                  <li><img alt="" src="{{ URL::asset('asset/images/blog-preview/IMG_7691026a.jpg')}}" width="840" height="420" /></li>
                  <li><img alt="" src="{{ URL::asset('asset/images/blog-preview/DSC_9975_172ef.jpg')}}" width="840" height="420" /></li>
                  <li><img alt="" src="{{ URL::asset('asset/images/blog-preview/IMG_9684fa36.jpg')}}" width="840" height="420" /></li>
                  <li><img alt="" src="{{ URL::asset('asset/images/blog-preview/DSC_4363d483.jpg')}}" width="840" height="420" /></li>
                </ul>
              </div>
              <div class="row" id="accomodation-room">
                <div class="seven columns" style="padding-right:10px;">
                  <h3>Standard Room </h3>
                  <div style="border-top:1px solid #EAEAEA; padding-bottom:7px; margin-top:10px;"></div>
                  <div class="field field-name-field-unit-description field-type-text-long field-label-above">
                    <div class="field-label">Description:&nbsp;</div>
                    <div class="field-items">
                      <div class="field-item even">Proin enim felis, auctor nec venenatis quis, bibendum iaculis enim. Aenean sit amet leo in nisi lobortis accumsan nec eget ante. Praesent hendrerit blandit dignissim.  Auctor nec venenatis quis, bibendum iaculis enim. Aenean sit amet leo in nisi lobortis accumsan nec eget ante. Praesent hendrerit blandit dignissim. <br>
                        <br>
                        <img alt="" src="{{ URL::asset('asset/images/hotel-facilities.png')}}" /></div>
                      <br>
                    </div>
                  </div>
                </div>
                <div id="split" class="five columns split"> 
                  <!-- room calendar -->
                  <div class="cal">
                    <table class="cal-table">
                      <caption class="cal-caption">
                      <a href="index.html" class="prev">&laquo;</a> <a href="index.html" class="next">&raquo;</a> May 2012
                      </caption>
                      <tbody class="cal-body">
                        <tr>
                          <td class="cal-off"><a href="index.html">30</a></td>
                          <td><a href="index.html">1</a></td>
                          <td><a href="index.html">2</a></td>
                          <td class="cal-today"><a href="index.html">3</a></td>
                          <td><a href="index.html">4</a></td>
                          <td><a href="index.html">5</a></td>
                          <td><a href="index.html">6</a></td>
                        </tr>
                        <tr>
                          <td><a href="index.html">7</a></td>
                          <td class="cal-selected"><a href="index.html">8</a></td>
                          <td><a href="index.html">9</a></td>
                          <td><a href="index.html">10</a></td>
                          <td><a href="index.html">11</a></td>
                          <td class="cal-check"><a href="index.html">12</a></td>
                          <td><a href="index.html">13</a></td>
                        </tr>
                        <tr>
                          <td><a href="index.html">14</a></td>
                          <td><a href="index.html">15</a></td>
                          <td><a href="index.html">16</a></td>
                          <td class="cal-check"><a href="index.html">17</a></td>
                          <td><a href="index.html">18</a></td>
                          <td><a href="index.html">19</a></td>
                          <td><a href="index.html">20</a></td>
                        </tr>
                        <tr>
                          <td><a href="index.html">21</a></td>
                          <td><a href="index.html">22</a></td>
                          <td><a href="index.html">23</a></td>
                          <td><a href="index.html">24</a></td>
                          <td><a href="index.html">25</a></td>
                          <td><a href="index.html">26</a></td>
                          <td><a href="index.html">27</a></td>
                        </tr>
                        <tr>
                          <td><a href="index.html">28</a></td>
                          <td><a href="index.html">29</a></td>
                          <td><a href="index.html">30</a></td>
                          <td><a href="index.html">31</a></td>
                          <td class="cal-off"><a href="index.html">1</a></td>
                          <td class="cal-off"><a href="index.html">2</a></td>
                          <td class="cal-off"><a href="index.html">3</a></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- end of room calendar --> 
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