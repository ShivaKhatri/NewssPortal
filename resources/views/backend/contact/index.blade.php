@extends('backend.layout.main')
@section('title','Contact')
@section('content')

    <div class="x_panel">
        <div class="x_title"
        >
            <h2>Contact Information</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                <a href="{{route('contacts.create')}}"><button class="btn btn-success"><li><i class="fa fa-plus">Add</i>
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
                       <th class="text-center">Email <i class="fa fa-sort"></i></th>
                       <th class="text-center">Address <i class="fa fa-sort"></i></th>
                       <th class="text-center">Contact No. <i class="fa fa-sort"></i></th>
                       <th class="text-center">Action <i class="fa fa-sort"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!$data['rows']->isEmpty())
                        <?php $i = 1; ?>
                        @foreach($data['rows'] as $row)
                            <tr>
                                <td align="center">{{$i++}}</td>
                                <td align="center">{{$row->email}}</td>
                                <td align="center">{{$row->address}}</td>
                                <td align="center">{{$row->contact_no}}</td>
                                <td align="center">
                                    {!! Form::model($row,array('route'=>['contacts.destroy',$row->id],'method'=>'delete','id'=>'form'.$row->id,'enctype'=>'multipart/form-data')) !!}

                                    {{--@if (AppHelper::isRouteAccessable('article.edit'))--}}
                                    <a href="{{route('contacts.edit',$row->id)}}" class="btn btn-primary"><i
                                                class="glyphicon glyphicon-edit"></i></a>

                                    {{--@endif--}}
                                    {{--                                    @if (AppHelper::isRouteAccessable('article.destroy'))--}}
                                    <button type="submit" form="{{'form'.$row->id}}" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                                    {{--@endif--}}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center">No Data Available</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
