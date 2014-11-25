@extends('backoffice.main')
@section('content')

<div class="row" id="content-wrap">
  <div class="twelve columns" id="content">
              <div class="region region-content">
        <div class="contact-items-wrap" id="block-system-main">
                
               <h4 class="lead">Customer Information</h4>
              
                  <div>
                    <label>{{Lang::get('admin.roomtype_image')}}</label>
                    <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add files...</span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="files[]" multiple>
                    </span>
                    <br>
                    <br>
                    <!-- The global progress bar -->
                    <div id="progress" class="progress">
                        <div class="progress-bar progress-bar-success"></div>
                    </div>
                    <!-- The container for the uploaded files -->
                    <div id="files" class="files"></div>
                  </div>
              
                <form action="{{ URL::to('/backoffice/settingaddroomtype')}}" method="post" accept-charset="UTF-8" id="roomstype_add" enctype="multipart/form-data">
                  <div>
                    <label>{{Lang::get('admin.roomtype_name')}}</label>
                    <input type="text" name="roomtype_name" id="roomtype_name" class="form-text" value="" />
                    <input id="roomtype_image" type="hidden" name="roomtype_image">
                  </div>

                  <div>
                    <label>{{Lang::get('admin.roomtype_price')}}</label>
                    <input type="text" name="roomtype_price" id="roomtype_price" class="form-text" value="" />
                  </div>
                  <div>
                    <label>{{Lang::get('admin.roomtype_maxperson')}}</label>
                    <input type="number" name="roomtype_maxperson" id="roomtype_maxperson" class="form-text" value="" />
                  </div>
                  <div>
                    <label>{{Lang::get('admin.roomtype_maxbedsupport')}}</label>
                    <input type="number" name="roomtype_maxbedsupport" id="roomtype_maxbedsupport" class="form-text" value="" />
                  </div>
                  <div>
                    <label>{{Lang::get('admin.include_breakfast')}}</label>
                    <input name="include_breakfast" type="checkbox" value="1">
                  </div>
                  <div class="form-actions form-wrapper" id="edit-actions">
                    <input type="button" id="addroom" value="Add Room Type" class="form-submit yellow_btn" />
                  </div>
              </form>
        </div>
      </div>
              <!-- /.region --> 
            </div>
            </div>
  
@stop
@section('jssection')

<link href="{{ URL::asset('asset/blueimp/css/jquery.fileupload.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ URL::asset('asset/blueimp/js/vendor/jquery.ui.widget.js') }}"></script>
<script src="{{ URL::asset('asset/blueimp/js/load-image.min.js') }}"></script>
<script src="{{ URL::asset('asset/blueimp/js/canvas-to-blob.min.js') }}"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<script src="{{ URL::asset('asset/blueimp/js/jquery.iframe-transport.js') }}"></script>
<script src="{{ URL::asset('asset/blueimp/js/jquery.fileupload.js') }}"></script>

<script src="{{ URL::asset('asset/blueimp/js/jquery.fileupload-process.js') }}"></script>
<script src="{{ URL::asset('asset/blueimp/js/jquery.fileupload-image.js') }}"></script>
<script src="{{ URL::asset('asset/blueimp/js/jquery.fileupload-audio.js') }}"></script>
<script src="{{ URL::asset('asset/blueimp/js/jquery.fileupload-video.js') }}"></script>
<script src="{{ URL::asset('asset/blueimp/js/jquery.fileupload-validate.js') }}"></script>
<script>
$(document).ready(function(){

    'use strict';
    var image_value = "";
    // Change this to the location of your server-side upload handler:
    var url = "{{URL::to('/server/php/index.php')}}",
        uploadButton = $('<button/>')
            .addClass('btn btn-primary')
            .prop('disabled', true)
            .prop('id', 'roomtype_upload')
            .css('display', 'none')
            .text('Processing...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });

    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: false,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|jpg|png)$/i,
        maxFileSize: 5000000, // 5 MB
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 200,
        previewMaxHeight: 200,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {
        data.context = $('<div/>').appendTo('#files');
        $.each(data.files, function (index, file) {
            var node = $('<p/>')
                    .append($('<span/>').text(file.name));
            if (!index) {
                node
                    .append('<br>')
                    .append(uploadButton.clone(true).data(data));
            }
            node.appendTo(data.context);
            image_value = file.name;
        });
    }).on('fileuploadprocessalways', function (e, data) {
        var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
        if (file.preview) {
            node
                .prepend('<br>')
                .prepend(file.preview);
        }
        if (file.error) {
            node
                .append('<br>')
                .append($('<span class="text-danger"/>').text(file.error));
        }
        if (index + 1 === data.files.length) {
            data.context.find('button')
                .text('Upload')
                .prop('disabled', !!data.files.error);
        }
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {
            if (file.url) {
                var link = $('<a>')
                    .attr('target', '_blank')
                    .prop('href', file.url);
                $(data.context.children()[index])
                    .wrap(link);
            } else if (file.error) {
                var error = $('<span class="text-danger"/>').text(file.error);
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            }
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index, file) {
            var error = $('<span class="text-danger"/>').text('File upload failed.');
            $(data.context.children()[index])
                .append('<br>')
                .append(error);
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');

        $('#addroom').click(function(){

           $('#roomtype_upload').click();

           if(image_value!=""){
                $('#roomtype_image').val('/server/php/files/'+image_value);
                $('#roomstype_add').submit();
           }

        });
  });
</script>
@stop