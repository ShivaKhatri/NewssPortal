@extends('backend.layout.main')

@section('content')
    @if (session()->has('message'))
        {!! session()->get('message') !!}
    @endif
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <h2> Voice Of People</h2>
<hr>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <p>
                        <a href="{{route('testimonials.create')}}" class="btn btn-primary pull-right"><i
                                    class="fa fa-plus"> Add</i></a>
                    </p>
                </div>
            </div>
            <div class="clealfix"></div>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-sorter table-responsive">
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
