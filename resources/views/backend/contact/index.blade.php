@extends('backend.layout.main')
@section('title','Contact')
@section('content')

    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <h2>Contact</h2>
            @foreach(['success', 'danger', 'info', 'warning'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <p class="alert alert-{{$msg}}">{{Session::get('alert-' . $msg)}}<a href="#" class="close"
                                                                                        data-dismiss="alert"
                                                                                        aria-label="close">&times;</a>
                    </p>
                @endif
            @endforeach
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <p>
                        <a href="{{route('contacts.create')}}" class="btn btn-primary pull-right"><i
                                    class="fa fa-plus"> Add</i></a>
                    </p>
                </div>
            </div>
            <div class="clealfix"></div>
            <div class="table-responsive">
                <table class="table table-hover table-striped tablesorter">
                    <thead>
                    <tr>
                        <th width="5%">SN <i class="fa fa-sort"></i></th>
                        <th width="25%">Email <i class="fa fa-sort"></i></th>
                        <th width="25%">Address <i class="fa fa-sort"></i></th>
                        <th width="25%">Contact No. <i class="fa fa-sort"></i></th>
                        <th width="15%">Action <i class="fa fa-sort"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!$data['rows']->isEmpty())
                        <?php $i = 1; ?>
                        @foreach($data['rows'] as $row)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->address}}</td>
                                <td>{{$row->contact_no}}</td>
                                <td>
                                    <a class="btn btn-default btn-xs"
                                       href="{{route('contacts.edit',['id' => $row->id])}}"><i
                                                class="fa fa-pencil"></i>
                                        Edit</a>
                                    <a class="btn btn-danger btn-xs"
                                       href="{{route('contacts.destroy',['id'=> $row->id])}}"><i
                                                class="fa fa-trash-o"></i>
                                        Delete</a>
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
