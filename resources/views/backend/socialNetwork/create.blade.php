@extends('backend.layout.main')
@section('title','News Category')
@section('subtitle','Add')
@section('content')
    <h2><a href="{{route('categories.index')}}"> News Category </a>≫ Add </h2>
    <br>
    <br>
    <div class="x_panel">
        <div class="x_title">
            <h2>Add News Category</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li>
                    <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>

    {!! Form::open([
     'route' => 'categories.store',
     'method' => 'post',
     'id' => 'demo-form2',
     'data-parsley-validate'=>'',
     'novalidate'=>'',
     'class' => 'form-horizontal form-label-left',
     'enctype' => "multipart/form-data"
   ]) !!}

    @include('backend.category.partials._general')
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