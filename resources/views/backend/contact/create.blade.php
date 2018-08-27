@extends('backend.layout.main')
@section('title','Create Contact')
@section('content')

    <div class="row">
        <div class="col-sm-10 col-sm-offset-2 col-lg-10">
            <h2><a href="{{route('dashboard')}}"> Conatct </a> ≫
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
            <form action="{{route('contacts.store')}}" method="POST" enctype="multipart/form-data"
                  data-parsley-validate="">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="control-label">Email <span class="required">*</span> </label>
                            <input class="form-control" type="email" name="email" required/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="control-label">Address <span class="required">*</span></label>
                            <input class="form-control" type="text" name="address" required/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="control-label">Contact No. <span class="required">*</span></label>
                            <input class="form-control" type="text" name="contact_no" required/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="btn btn-success" type="submit" value="Save"/>
                            <a class="btn btn-primary" href="{{route('contacts.index')}}" type="button"> Cancel </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
