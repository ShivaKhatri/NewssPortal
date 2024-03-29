@extends('backend.layout.main')
@section('title','Create  Main Stories')
@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-2 col-lg-10">
            <h2><a href="{{route('article.index')}}">  Main Stories </a> ≫
                <small>@yield('title')</small>
            </h2>
            @if (session()->has('message'))
                {!! session()->get('message') !!}
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <a href="#" class="close"
                       data-dismiss="alert"
                       aria-label="close">&times;</a>
                </div>
            @endif
            <form action="{{route('article.store')}}" method="POST" enctype="multipart/form-data"  data-parsley-validate = "" >
                {{csrf_field()}}
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="control-label">News Category</label>
                            {{ Form::select('category_id',[''=>'Select News Category']+$category,null, array('class' => 'form-control col-md-7 col-xs-12')) }}

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="control-label">Title</label>
                            <input class="form-control" type="text" name="title" required/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="control-label">Image</label>
                            <input class="form-control" type="file" name="file" accept="image/*" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="control-label">Description</label>
                            <textarea rows="10" class="form-control" type="text" name="article"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="control-label">Status</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="status" id="optionsRadios1" value="1" checked>
                                    Publish
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="status" id="optionsRadios2" value="0">
                                    Draft
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="btn btn-success" type="submit" value="Save"/>
                            <a class="btn btn-primary" href="{{route('article.index')}}" type="button"> Cancel </a>
                        </div>
                    </div>
                </div>
            </form>
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

                var cmsURL = editor_config.path_absolute + 'filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }
                tinyMCE.activeEditor.windowManager.open({
                    file:  cmsURL,
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