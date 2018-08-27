@extends('backend.layout.main')
@section('title','Edit Contact')

@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-2 col-lg-10">
            <h2><a href="{{route('dashboard')}}"> Contact </a> ≫
                <small>@yield('title')</small>
            </h2>
            <form action="{{route('contacts.update',['id' => $data['row']->id])}}" method="POST"
                  enctype="multipart/form-data" data-parsley-validate = "">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="control-label">Email <span class="required">*</span></label>
                            <input class="form-control" type="email" name="email" value="{{$data['row']->email}}"
                                   required/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="control-label">Address <span class="required">*</span></label>
                            <input class="form-control" type="text" name="address" value="{{$data['row']->address}}"
                                   required/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="control-label">Contact No. <span class="required">*</span></label>
                            <input class="form-control" type="text" name="contact_no" value="{{$data['row']->contact_no}}"
                                   required/>
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