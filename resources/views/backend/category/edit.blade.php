@extends('backend.layout.main')
@section('title','News Category')
@section('subtitle','Update')
@section('content')
    <h2><a href="{{route('categories.index')}}"> News Category </a>≫ Edit </h2>
    <br>
    <br>
    <div class="x_panel">
        <div class="x_title">
            <h2>Edit News Category</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li>
                    <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>

    {!! Form::model($categories, [
       'route' => ['categories.update', $categories->id, 'class' =>"form-horizontal form-label-left"],
       'method' => 'PUT',
       'id' => 'demo-form2',
         'data-parsley-validate'=>'',
         'novalidate'=>'',
         'class' => 'form-horizontal form-label-left',
       'enctype' => "multipart/form-data",
   ])
   !!}
    @include('backend.category.partials._general')

                <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"> Status
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="control-group">
                            <div class="radio">
                                <label>
                                    {!! Form::radio('status', 1, true, [
                                         'class' => 'ace'
                                         ]) !!}
                                    <span class="lbl"> Active </span>
                                </label>
                                <label>
                                    {!! Form::radio('status', 0, false, [
                                        'class' => 'ace'
                                        ]) !!}
                                    <span class="lbl">  Deactive  </span>
                                </label>
                                @if ($errors->has('status'))
                                    <span class="help-block">
                            <strong>{{ $errors->first('status') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
    <div class="ln_solid"></div>


    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" form="demo-form2" class="btn btn-success">Submit</button>

            <button class="btn btn-warning" type="reset">Reset</button>
        </div>
    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection