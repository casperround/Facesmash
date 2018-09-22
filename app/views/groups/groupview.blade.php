@extends('layouts.public', ["title" => "My Groups", "sidebar" => false])

@section("content")
    @if (Auth::check())
        <div class="col-8" style="overflow-y:scroll;margin-top:60px;padding:10px;background:#efefef;height:100vh;">
            @endif


            @foreach(Groups::where("unique_groupname", "=", $unique_groupname)->get() as $groups)
                <div class="card">
                    <img class="card-img-top" src="{{ $groups->unique_groupname }}" alt="Card image cap">
                    <div class="card-body">

                        <center><p style="font-size:20px;font-weight:bold;color:black" class="card-text">{{ $groups->unique_groupname }}</p></center>
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