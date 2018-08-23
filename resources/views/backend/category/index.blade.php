@extends('backend.layout.main')
@section('title','News Category')
@section('content')

    <div class="x_panel">
        <div class="x_title"
        >
            <h2>News Category</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                <a href="{{route('categories.create')}}"><button class="btn btn-success"><li><i class="fa fa-plus">Add</i>
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
                            @php
                                    $i=0;
                                    @endphp
                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Created By</th>
                                <th>Actions</th>

                            </tr>
                            </thead>


                            <tbody>
                            @foreach($categories as $row)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->description}}</td>
                                <td>
                                    @if($row->status==1)
                                        <a href="" class="status" data-id="{{ $row->id }}"><span
                                                    class="label label-success"> Active
                                                                    &nbsp;&nbsp;</span></a>
                                    @else
                                        <a href="" class="status" data-id="{{ $row->id  }}">
                                            <span class="label label-warning"> Deactive </span></a>
                                    @endif
                                </td>
                                <td>{{$row->name}}

                                    </td>
                                <td>
                                    {!! Form::model($row,array('route'=>['categories.destroy',$row->id],'method'=>'delete','id'=>'form'.$row->id,'enctype'=>'multipart/form-data')) !!}

                                        <a href="{{route('categories.edit',$row->id)}}" class="btn btn-primary"><i
                                                    class="glyphicon glyphicon-edit"></i></a>

                                            <button type="submit" form="{{'form'.$row->id}}" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                                    {!! Form::close() !!}

                                </td>

                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.status').click(function (e) {

                e.preventDefault();
                var $this = $(this);
                var id = $this.attr('data-id');
                console.log(id);
                $.ajax({
                    method: 'GET',
                    url: '{{ route('categories.status') }}',
                    data: {
                        'url': id,
                    },

                    success: function (response) {
                        var data = jQuery.parseJSON(response);
                        console.log(data);

                        if (data.status == '1')
                            $this.html('').html('<span class="label label-success">Active&emsp;</span>');
                        else
                            $this.html('').html('<span class="label label-warning">Deactive</span>');
                    }
                });
            });
        });
    </script>
  @endsection