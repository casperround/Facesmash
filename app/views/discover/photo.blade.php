@extends('layouts.public', ["title" => "Photos", "sidebar" => false])

@section("content")
    @if (Auth::check())
        <div class="col-8" style="overflow-y:scroll;margin-top:60px;padding:10px;background:#efefef;height:100vh;">
    @endif
            <div class="col-md" style="overflow-y:scroll;margin-top:10px;padding:10px;background:#efefef;height:100vh;">
                @include("includes.discover-top")
                <div class="card-columns">
                    @foreach(Posts::where("media_type", "=", "jpg")->get() as $post)
                        @if ($post->relation == 'channel')
                            <a href="{{ URL::route("channelsview",(Channels::where("id", "=", $post->relation_id)->limit(1)->pluck("unique_channelname"))) }}">
                        @endif
                        @if ($post->relation == 'page')
                            <a href="{{ URL::route("pagesview",(Pages::where("id", "=", $post->relation_id)->limit(1)->pluck("unique_pagename"))) }}">
                        @endif
                        @if ($post->relation == 'feed')
                            <a href="{{ URL::route("userProfile",(User::where("id", "=", $post->author_id)->limit(1)->pluck("username"))) }}">
                        @endif
                            <div class="col-md">
                            <div class="card">
                                <img class="card-img-top" src="{{ URL::to($post->file_path) }}" alt="Card image cap">
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
                                </div>
                            </div>
                            </div></a>
                    @endforeach
                </div>
            </div>

    @if (Auth::check())
        </div>
    @endif
@stop