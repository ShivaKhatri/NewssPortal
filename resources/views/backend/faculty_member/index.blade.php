@extends('backend.layout.main')
@section('title','Faculty Members')
@section('content')

    <div class="x_panel">
        <div class="x_title"
        >
            <h2>Members</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                <a href="{{route('members.create')}}"><button class="btn btn-success"><li><i class="fa fa-plus">Add</i>
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
                       <th class="text-center">Name<i class="fa fa-sort"></i></th>
                       <th class="text-center">Designation <i class="fa fa-sort"></i></th>
                       <th class="text-center">Picture <i class="fa fa-sort"></i></th>
                       <th class="text-center">Message <i class="fa fa-sort"></i></th>
                       <th class="text-center">Action <i class="fa fa-sort"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!$data['rows']->isEmpty())
                        <?php $i = 1; ?>
                        @foreach($data['rows'] as $row)
                            <tr>
                                <td  align="center">{{$i++}}</td>
                                <td  align="center">{{$row->name}}</td>
                                <td  align="center">{{$row->designation}}</td>
                                <td  align="center"> <img src="{{asset('assets/uploads/members/'.$row->image)}}" height="100" width="100"/></td>
                                <td  align="center">@if($row->message != null){{$row->message}} @else N/A @endif</td>
                                <td align="center">
                                    {!! Form::model($row,array('route'=>['members.destroy',$row->id],'method'=>'delete','id'=>'form'.$row->id,'enctype'=>'multipart/form-data')) !!}

                                    {{--@if (AppHelper::isRouteAccessable('article.edit'))--}}
                                    <a href="{{route('members.edit',$row->id)}}" class="btn btn-primary"><i
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
                            <td colspan="6" class="text-center">No Data Available</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection