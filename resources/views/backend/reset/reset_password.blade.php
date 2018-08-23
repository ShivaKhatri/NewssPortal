@extends('backend.layout.main')
@section('title','ResetPassword')
@section('content')
    <div class="x_title">
        <h2><a href="{{ route('dashboard') }}"> Home </a> ≫ Change Password </h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li> &nbsp;
            <li><a class="close-link" href="{{route('dashboard')}}"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>

    <div class="x_panel">
        <div class="x_content">

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    {!! Form::model($data['user'], [
                      'route' => ['password.change', $data['user']->id],
                      'method' => 'post',
                      'id' => 'form',
                      'class' => 'form-horizontal',
                      'role' => "form",
                      'enctype' => "multipart/form-data"
                      ]) !!}
                    <input type="hidden" name="id" value="{{ $data['user']->id }}">
                    @if (session()->has('message'))
                        <em>{!! session()->get('message') !!}</em>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="password">
                            Old Password </label>
                        <div class="col-md-6">
                            {!! Form::password('current_password', [
                               "'kl_virtual_keyboard_secure_input" => "on",
                               'id' => 'current_password',
                               "placeholder" => 'Enter New Password',
                               "class" => "form-control",
                            ]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="password">
                            New Password</label>
                        <div class="col-md-6">
                            {!! Form::password('password', [
                               "'kl_virtual_keyboard_secure_input" => "on",
                               'id' => 'password',
                               "placeholder" => 'Enter New Password',
                               "class" => "form-control",
                            ]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="confirmation_password">
                            Confirm Password </label>
                        <div class="col-md-6">
                            {!! Form::password('confirm_password', [
                               "'kl_virtual_keyboard_secure_input" => "on",
                               'id' => 'confirm_password',
                               "placeholder" =>"Confirmed Password",
                               "class" => "form-control",
                            ]) !!}
                        </div>
                    </div>

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-2 col-md-9">
                            <button class="btn btn-success" type="submit">
                                <i class="icon-ok bigger-110"></i>
                                Submit
                            </button>
                            &nbsp; &nbsp; &nbsp;
                            <button class="btn btn-primary" type="reset">
                                <i class="icon-undo bigger-110"></i>
                                Reset
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /.user -->
        </div>
    </div>
@endsection