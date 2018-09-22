@extends('layouts.public', ["title" => "Videos", "sidebar" => false])

@section("content")
    @if (Auth::check())
        <div class="col-8" style="overflow-y:scroll;margin-top:60px;padding:10px;background:#efefef;height:100vh;">
            @endif
            <div class="col-md" style="overflow-y:scroll;margin-top:10px;padding:10px;background:#efefef;height:100vh;">
                @include("includes.discover-top")
                <div class="card-columns">
                    @foreach(Posts::where("media_type", "=", "mp4")->get() as $post)

                                                <div class="col-md">
                                                    <div class="card">
                                                        <video id="my-video" class="video-js" controls preload="auto" width="100%" height="auto" style="width:100%;height:auto;position: relative;"
                                                               poster="{{ URL::to('data_store/post_media/'.$post->post_id.'.jpg') }}" data-setup="{}">
                                                            <source src="{{ URL::to($post->file_path) }}" type='video/mp4'>
                                                            <source src="{{ URL::to($post->file_path) }}" type='video/webm'>
                                                            <p class="vjs-no-js">
                                                                To view this video please enable JavaScript, and consider upgrading to a web browser that
                                                            </p>
                                                        </video>
                                                        @if ($post->relation == 'channel')
                                                            <a href="{{ URL::route("channelsview",(Channels::where("id", "=", $post->relation_id)->limit(1)->pluck("unique_channelname"))) }}">
                                                                @endif
                                                                @if ($post->relation == 'page')
                                                                    <a href="{{ URL::route("pagesview",(Pages::where("id", "=", $post->relation_id)->limit(1)->pluck("unique_pagename"))) }}">
                                                                        @endif
                                                                        @if ($post->relation == 'feed')
                                                                            <a href="{{ URL::route("userProfile",(User::where("id", "=", $post->author_id)->limit(1)->pluck("username"))) }}">
                                                                                @endif
                                                        <div class="card-body" style="color: black">
                                                            @if ($post->relation == 'channel')
                                                                <img class="img" style="height:40px;width:40px;border-radius: 50px;" src="{{URL::to(Channels::where("id", "=", $post->relation_id)->limit(1)->pluck("channel_img_path"))}}"/>
                                                            @endif
                                                            @if ($post->relation == 'page')
                                                                <img class="img" style="height:40px;width:40px;border-radius: 50px;" src="{{URL::to(Pages::where("id", "=", $post->author_id)->limit(1)->pluck("page_img_path"))}}"/>
                                                            @endif
                                                            @if ($post->relation == 'feed')
                                                                <img class="img" style="height:40px;width:40px;border-radius: 50px;" src="{{URL::to(User::where("id", "=", $post->author_id)->limit(1)->pluck("profile_img_path"))}}"/>
                                                            @endif

                                                            @if ($post->relation == 'channel')
                                                                <span>{{Channels::where("id", "=", $post->relation_id)->pluck("unique_channelname");}} | {{{ $post->post_date }}}</span>
                                                            @endif
                                                            @if ($post->relation == 'page')
                                                                <span>{{Pages::where("id", "=", $post->relation_id)->pluck("unique_pagename");}} | {{{ $post->post_date }}}</span>
                                                            @endif
                                                            @if ($post->relation == 'feed')
                                                                <span>{{User::where("id", "=", $post->author_id)->pluck("username");}} | {{{ $post->post_date }}}</span>
                                                            @endif
                                                            <p class="card-text">{{{ $post->text }}}</p>
                                                        </div></a>
                                                    </div>
                                                </div>
                            @endforeach
                </div>
            </div>

            @if (Auth::check())
        </div>
    @endif
@stop