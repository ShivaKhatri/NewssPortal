@extends('backend.layout.main')
@section('title','Dashboard')
@section('content')




<p><strong> THIS IS THE HOME PAGE</strong></p>
<div class="header">
    <a class="weatherwidget-io" href="https://forecast7.com/en/27d7285d32/kathmandu/" data-label_1="KATHMANDU" data-label_2="WEATHER" data-theme="original" >KATHMANDU WEATHER</a>
    <script>
        !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
    </script>
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