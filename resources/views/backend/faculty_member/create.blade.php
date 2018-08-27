@extends('backend.layout.main')
@section('title','Add Member')
@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-2 col-lg-10">
            <h2><a href="{{route('dashboard')}}"> Faculty Members </a> ≫
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
            <form action="{{route('members.store')}}" method="POST" enctype="multipart/form-data"
                  data-parsley-validate="">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="control-label">Name <span class="required">*</span></label>
                            <input class="form-control" type="text" name="name" required/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="control-label">Designation <span class="required">*</span></label>
                            <input class="form-control" type="text" name="designation" required/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="control-label">Image <span class="required">*</span></label>
                            <input class="form-control" type="file" name="file" accept="image/*" required/>
                        </div>
                    </div>
                </div>
                <fieldset>
                    <legend>Add Faculty Member Message</legend>
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="control-label">Title <span class="required">*</span></label>
                                <input class="form-control" type="text" name="title" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="control-label">Message </label>
                                <textarea rows="5" class="form-control" type="text" name="message"></textarea>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="btn btn-success" type="submit" value="Save"/>
                            <a class="btn btn-primary" href="{{route('members.index')}}" type="button">
                                Cancel </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
    <script src="{{asset('backend/js/tinymce/tinymce.min.js')}}"></script>
    <script>
        tinymce.init({selector: 'textarea'});
    </script>