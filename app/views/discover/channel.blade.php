@extends('layouts.public', ["title" => "Channels", "sidebar" => false])

@section("content")
    @if (Auth::check())
        <div class="col-8" style="overflow-y:scroll;margin-top:60px;padding:10px;background:#efefef;height:100vh;">
            @endif
            <div class="col-md" style="overflow-y:scroll;margin-top:10px;padding:10px;background:#efefef;height:100vh;">
                @include("includes.discover-top")
                <div class="card-columns">
                    @foreach(YoutubeChannels::groupby("channel_id")->get() as $youtube)
                        <div class="col-md">
                            <a href="{{ URL::route("youtubeview", $youtube->channel_id) }}"><div class="card">
                                    <img class="card-img-top" src="{{ URL::to($youtube->channel_banner) }}" alt="Card image cap">
                                    <div class="card-body">
                                        <center><p style="font-size:20px;font-weight:bold;color:black;" class="card-text">{{ $youtube->channel_title }}</p></center>
                                    </div>
                                </div></a>
                        </div>
                    @endforeach
                    @foreach(Channels::where("visibility", "=", "1")->get() as $channels)
                        <div class="col-md">
                            <a href="{{ URL::route("channelsview", $channels->unique_channelname) }}"><div class="card">
                                    <img class="card-img-top" src="{{ URL::to($channels->banner_img_path) }}" alt="Card image cap">
                                    <div class="card-body">
                                        <center><p style="font-size:20px;font-weight:bold;color:black;" class="card-text">{{ $channels->unique_channelname }}</p></center>
                                    </div>
                                </div></a>
                        </div>
                    @endforeach
                </div>
            </div>

            @if (Auth::check())
        </div>
    @endif
@stop
