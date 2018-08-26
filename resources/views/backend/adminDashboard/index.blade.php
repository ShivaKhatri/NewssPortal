@extends('backend.layout.main')
@section('title','Dashboard')
@section('content')



    <div class="panel panel-default">
        <div class="panel-body">
            {{-- User Statistics Section --}}
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row tile_count text-center">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                            <span class="count_top"><i class="fa fa-2x fa-users green"></i>&nbsp; Main Stories </span>
                            <div class="count blue">{{$mainstories}}</div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                            <span class="count_top"><i class="fa fa-2x fa-users green"></i>&nbsp; Breaking News </span>
                            <div class="count blue">{{$breakingNews}}</div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                            <span class="count_top"><i class="fa fa-2x fa-home green"></i>&nbsp; Voice Of People </span>
                            <div class="count red">{{$voice}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row tile_count text-center">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                            <span class="count_top"><i class="fa fa-2x fa-users green"></i>&nbsp;Literature Reviews</span>
                            <div class="count blue">{{ $literature }}</div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                            <span class="count_top"><i class="fa fa-2x fa-inbox green"></i>&nbsp;Released Image Of Month</span>
                            <div class="count blue">{{ $imageOfMonth }}</div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                            <span class="count_top"><i class="fa fa-2x fa-send-o green"></i>&nbsp; Released Videos</span>
                            <div class="count red">{{ $videos }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
<div class="header">
    <h1><a href="{{ $data['permalink'] }}">{{ $data['title']  }}</a></h1>
</div>

@foreach ($data['items'] as $item)
    <div class="item">
        <h2><a href="{{ $item->get_permalink() }}">{{ $item->get_title() }}</a></h2>
        <p>{{ $item->get_description() }}</p>
        <p><small>Posted on {{ $item->get_date('j F Y | g:i a') }}</small></p>
    </div>

    @endforeach

@endsection