@extends('backend.layout.main')
@section('title','Edit Literature review')
@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-2 col-lg-10">
            <h2><a href="{{route('literature.index')}}"> Edit Voice Of People</a> ≫
                <small>@yield('title')</small>
            </h2>
            {!! Form::model($data['row'], [
             'route' => ['literature.update', $data['row']->id, 'class' =>"form-horizontal form-label-left"],
             'method' => 'PUT',
             'id' => 'demo-form2',
               'data-parsley-validate'=>'',
               'novalidate'=>'',
               'class' => 'form-horizontal form-label-left',
             'enctype' => "multipart/form-data",
            ])
            !!}
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="control-label">Order</label>
                            <input class="form-control" type="text" name="order" value="{{$data['row']->order}}"
                                   required/>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input class="form-control" type="text" name="title" value="{{$data['row']->title}}"
                                   required/>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="control-label">Link</label>
                            <input class="form-control" type="text" name="link" value="{{$data['row']->title}}"
                                   required/>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="control-label">Social Media</label>
                            {{ Form::select('social',[''=>'Select Social Networks','facebook'=>'Facebook','twitter'=>'Twitter','instagram'=>'Instagram'],null, array('class' => 'form-control col-md-7 col-xs-12')) }}

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="control-label">Image</label>
                            <input class="form-control" type="file" name="file" accept="image/*"/>
                        </div>
                        @if(!empty($data['row']->image))
                            <img src="{{asset('assets/uploads/testimonial/'.$data['row']->image)}}" height="200" width="200"/>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="control-label">Message</label>
                            <textarea rows="10" class="form-control" type="text"
                                      name="message">{{$data['row']->description}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="control-label">Status</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="status" id="optionsRadios1" value="1"
                                           @if($data['row']->status == 1)checked @endif>
                                    Publish
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="status" id="optionsRadios2" value="0"
                                           @if($data['row']->status == 0)checked @endif>
                                    Draft
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" form="demo-form2" class="btn btn-success">Submit</button>
                        <a class="btn btn-warning" href="{{route('literature.index')}}" type="button"> Cancel </a>

                    </div>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
    <script src="{{asset('backend/js/moment.js')}}"></script>
    <script src="{{asset('backend/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script>
        $('#start_date,#end_date').datetimepicker({
            format: 'DD/MM/YYYY'
        });
    </script>
    <script src="{{asset('backend/js/tinymce/tinymce.min.js')}}"></script>
    <script>
        var editor_config = {
            path_absolute: "{{ URL::to('/')}}/",
            selector: "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls : false,
            remove_script_host : false,
            document_base_url : "{{ config('app.url') }}",
            file_browser_callback: function (field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + "filemanager?field_name=" + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };

        tinymce.init(editor_config);

    </script>
@endsection