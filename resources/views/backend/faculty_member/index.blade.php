@extends('backend.layout.main')
@section('title','Faculty Members')
@section('content')

    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <h2>Faculty Members</h2>
            @foreach(['success', 'danger', 'info', 'warning'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <p class="alert alert-{{$msg}}">{{Session::get('alert-' . $msg)}}
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </p>
                @endif
            @endforeach
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <p>
                        <a href="{{route('members.create')}}" class="btn btn-primary pull-right"><i
                                    class="fa fa-plus"> Add</i></a>
                    </p>
                </div>
            </div>
            <div class="clealfix"></div>
            <div class="table-responsive">
                <table class="table table-hover table-striped tablesorter">
                    <thead>
                    <tr>
                        <th>SN <i class="fa fa-sort"></i></th>
                        <th>Name<i class="fa fa-sort"></i></th>
                        <th>Designation <i class="fa fa-sort"></i></th>
                        <th>Picture <i class="fa fa-sort"></i></th>
                        <th>Message Title <i class="fa fa-sort"></i></th>
                        <th>Action <i class="fa fa-sort"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!$data['rows']->isEmpty())
                        <?php $i = 1; ?>
                        @foreach($data['rows'] as $row)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->designation}}</td>
                                <td><img src="{{asset('uploads/members/'.$row->image)}}" height="100" width="100"/>
                                <td>@if($row->title != null){{$row->title}} @else N/A @endif</td>
                                <td>
                                    <a class="btn btn-default btn-xs"
                                       href="{{route('members.edit',['id' => $row->id])}}"><i
                                                class="fa fa-pencil"></i>
                                        Edit</a>
                                    <a class="btn btn-danger btn-xs"
                                       href="{{route('members.destroy',['id'=> $row->id])}}"><i
                                                class="fa fa-trash-o"></i>
                                        Delete</a>
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