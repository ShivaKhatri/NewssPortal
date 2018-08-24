@extends('backend.layout.main')

@section('content')

    <div class="x_panel">
        <div class="x_title"
        >
            <h2>Voice Of People</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                <a href="{{route('testimonials.create')}}"><button class="btn btn-success"><li><i class="fa fa-plus">Add</i>
                        </li></button></a>
            </ul>
            <div class="clearfix"></div>
        </div>
        @if (session()->has('message'))
            <em>{!! session()->get('message') !!}</em>
        @endif
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <table id="datatable-keytable" class="table table-striped table-bordered">
                            <thead>
                    <tr>
                        <th class="text-center">SN <i class="fa fa-sort"></i></th>
                        <th> Title <i class="fa fa-sort"></i></th>
                        <th class="text-center">Social media <i class="fa fa-sort"></i></th>
                        <th class="text-center">Link <i class="fa fa-sort"></i></th>
                        <th class="text-center">Status <i class="fa fa-sort"></i></th>
                        <th class="text-center">order <i class="fa fa-sort"></i></th>
                        <th class="text-center">Action <i class="fa fa-sort"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach($data['rows'] as $row)
                            <tr>
                                <td align="center">{{$i++}}</td>
                                <td>{{$row->title}}</td>
                                <td align="center">{{$row->social}}</td>
                                <td align="center">{{$row->link}}</td>
                                <td align="center">@if($row->status == 1) {{'Published'}} @else{{'Drafted'}} @endif</td>
                                <td align="center">{{$row->order}}</td>

                                <td align="center">
                                    {!! Form::model($row,array('route'=>['testimonials.destroy',$row->id],'method'=>'delete','id'=>'form'.$row->id,'enctype'=>'multipart/form-data')) !!}

                                    {{--@if (AppHelper::isRouteAccessable('testimonials.edit'))--}}
                                    <a href="{{route('testimonials.edit',$row->id)}}" class="btn btn-primary"><i
                                                class="glyphicon glyphicon-edit"></i></a>

                                    {{--@endif--}}
                                    {{--                                    @if (AppHelper::isRouteAccessable('testimonials.destroy'))--}}
                                    <button type="submit" form="{{'form'.$row->id}}" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                                    {{--@endif--}}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
