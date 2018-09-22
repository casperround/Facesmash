@extends('layouts.public', ["title" => "My Events", "sidebar" => false])

@section("content")
    @if (Auth::check())
        <div class="col-8" style="overflow-y:scroll;margin-top:60px;padding:10px;background:#efefef;height:100vh;">
            @endif


            @foreach(Events::where("unique_eventname", "=", $unique_eventname)->get() as $events)
                <div class="card">
                    <img class="card-img-top" src="{{ $events->unique_eventname }}" alt="Card image cap">
                    <div class="card-body">

                        <center><p style="font-size:20px;font-weight:bold;color:black" class="card-text">{{ $events->unique_eventname }}</p></center>
                    </div>
                </div>
            @endforeach
            <div class="col-md" style="overflow-y:scroll;margin-top:10px;padding:10px;background:#efefef;height:100vh;">
                <div class="card-columns">

                    {{--<a href="#'. $youtube_load['uid'] .'" title="'. $youtube_load['title'] .'">--}}
                    {{--<img style="width:100%;height:auto;" src="'. $youtube_load['thumbnail'] .'" alt="'. $youtube_load['title'] .'" class="img-responsive" height="130px" />--}}
                    {{--<h2>'. $youtube_load['title'] .'</h2>--}}
                    {{--<span class="glyphicon glyphicon-play-circle"></span>--}}
                    {{--</a>--}}
                    {{--</li><br/>--}}
                    {{----}}

                </div>

            </div>


            @if (Auth::check())
        </div>
    @endif
@stop