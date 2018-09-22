@extends('layouts.public', ["title" => "Discover", "sidebar" => false])

@section("content")
    @if (Auth::check())
        <div class="col-8" style="overflow-y:scroll;margin-top:60px;padding:10px;background:#efefef;height:100vh;">
            @else
                <div class="container-fluid">
                    @endif
                    <div class="col-md" style="overflow-y:scroll;margin-top:10px;padding:10px;background:#efefef;height:100vh;">
                        @include("includes.discover-top")
                        <div class="card-columns">

                            @foreach(TumblrPosts::where("tag", "like", "%" . $query . "%")->get() as $tumblr)
                                @if($tumblr->type == "photo")
                                    <div class="col-md">
                                        <div class="card">
                                            <img class="card-img-top" src="{{$tumblr->img_url}}" alt="Card image cap">
                                            <div class="card-body" style="color: black">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <h4 class="card-title"> <a href="{{$tumblr->post_url}}" style="word-wrap: normal;">{{$tumblr->blog_name}}</a> | {{{ $tumblr->date }}}</h4>
                                                    </div>
                                                    <div class="col-md-2">
                                                        @if (Auth::check())
                                                            @forelse(Flags::where("reporter_id", "=", Auth::user()->id)->where("relation_id","=",$tumblr->post_id)->limit(1)->get() as $flag_check)
                                                                <form action="{{ URL::route("unflag") }}" method="POST">
                                                                    <input type="hidden" name="relation_id" value="{{$tumblr->post_id}}"/>
                                                                    <button style="width:auto;height:auto;border:0px;"><i style="color:blue;font-size:12px;" class="fas fa-flag"></i></button>
                                                                </form>
                                                            @empty
                                                                <form action="{{ URL::route("flag") }}" method="POST">
                                                                    <input type="hidden" name="relation_id" value="{{$tumblr->post_id}}"/>
                                                                    <input type="hidden" name="relation" value="post"/>
                                                                    <button style="width:auto;height:auto;border:0px;"><i style="color:#ED5565;font-size:12px;" class="fas fa-flag"></i></button>
                                                                </form>
                                                            @endforelse

                                                        @endif
                                                    </div>
                                                </div>
                                                <center><i style="color:#48CFAD" class="far fa-image"></i></center>
                                                <p class="card-text">{{{ $tumblr->summary }}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($tumblr->type == "video")
                                    <div class="col-md">
                                        <div class="card">
                                            <video id="my-video" class="video-js" controls preload="auto" width="100%" height="auto" style="width:100%;height:auto;position: relative;"
                                                   poster="{{ URL::to('data_store/post_media/'.$tumblr->post_id.'.jpg') }}" data-setup="{}">
                                                <source src="{{ URL::to($tumblr->video_url) }}" type='video/mp4'>
                                                <source src="{{ URL::to($tumblr->thumbnail_url) }}" type='video/webm'>
                                                <p class="vjs-no-js">
                                                    To view this video please enable JavaScript, and consider upgrading to a web browser that
                                                </p>
                                            </video>
                                            <div class="card-body" style="color: black">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <h4 class="card-title"> <a href="{{$tumblr->post_url}}" style="word-wrap: normal;">{{$tumblr->blog_name}}</a> | {{{ $tumblr->date }}}</h4>
                                                    </div>
                                                    <div class="col-md-2">
                                                        @if (Auth::check())
                                                            @forelse(Flags::where("reporter_id", "=", Auth::user()->id)->where("relation_id","=",$tumblr->post_id)->limit(1)->get() as $flag_check)
                                                                <form action="{{ URL::route("unflag") }}" method="POST">
                                                                    <input type="hidden" name="relation_id" value="{{$tumblr->post_id}}"/>
                                                                    <button style="width:auto;height:auto;border:0px;"><i style="color:blue;font-size:12px;" class="fas fa-flag"></i></button>
                                                                </form>
                                                            @empty
                                                                <form action="{{ URL::route("flag") }}" method="POST">
                                                                    <input type="hidden" name="relation_id" value="{{$tumblr->post_id}}"/>
                                                                    <input type="hidden" name="relation" value="post"/>
                                                                    <button style="width:auto;height:auto;border:0px;"><i style="color:#ED5565;font-size:12px;" class="fas fa-flag"></i></button>
                                                                </form>
                                                            @endforelse

                                                        @endif
                                                    </div>
                                                </div>
                                                <center><i style="color:#48CFAD" class="far fa-image"></i></center>
                                                <p class="card-text">{{{ $tumblr->summary }}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @foreach(Pages::where("visibility", "=", "1")->where("unique_pagename", "like", "%" . $query . "%")->get() as $pages)
                                <div class="col-md">
                                    <a href="{{ URL::route("pagesview", $pages->unique_pagename) }}"><div class="card">
                                            <img class="card-img-top" src="{{ URL::to($pages->banner_img_path) }}" alt="Card image cap">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-2">

                                                    </div>
                                                    <div class="col-md-8">
                                                        <center><i style="color:#ED5565" class="far fa-file-alt"></i><p style="font-size:20px;font-weight:bold;color:black;" class="card-text">{{ $pages->unique_pagename }}</p></center>
                                                    </div>
                                                    <div class="col-md-2">
                                                        @if (Auth::check())
                                                            @forelse(Flags::where("reporter_id", "=", Auth::user()->id)->where("relation_id","=",$pages->id)->limit(1)->get() as $flag_check)
                                                                <form action="{{ URL::route("unflag") }}" method="POST">
                                                                    <input type="hidden" name="relation_id" value="{{$pages->id}}"/>
                                                                    <button style="width:auto;height:auto;border:0px;"><i style="color:blue;font-size:12px;" class="fas fa-flag"></i></button>
                                                                </form>
                                                            @empty
                                                                <form action="{{ URL::route("flag") }}" method="POST">
                                                                    <input type="hidden" name="relation_id" value="{{$pages->id}}"/>
                                                                    <input type="hidden" name="relation" value="page"/>
                                                                    <button style="width:auto;height:auto;border:0px;"><i style="color:#ED5565;font-size:12px;" class="fas fa-flag"></i></button>
                                                                </form>
                                                            @endforelse

                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div></a>
                                </div>
                            @endforeach
                            @foreach(Channels::where("visibility", "=", "1")->where("unique_channelname", "like", "%" . $query . "%")->get() as $channels)
                                <div class="col-md">
                                    <a href="{{ URL::route("channelsview", $channels->unique_channelname) }}"><div class="card">
                                            <img class="card-img-top" src="{{ URL::to($channels->banner_img_path) }}" alt="Card image cap">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-2">

                                                    </div>
                                                    <div class="col-md-8">
                                                        <center><i style="color:#A0D468" class="fas fa-tv"></i><p style="font-size:20px;font-weight:bold;color:black;" class="card-text">{{ $channels->unique_channelname }}</p></center>
                                                    </div>
                                                    <div class="col-md-2">
                                                        @if (Auth::check())
                                                            @forelse(Flags::where("reporter_id", "=", Auth::user()->id)->where("relation_id","=",$channels->id)->limit(1)->get() as $flag_check)
                                                                <form action="{{ URL::route("unflag") }}" method="POST">
                                                                    <input type="hidden" name="relation_id" value="{{$channels->id}}"/>
                                                                    <button style="width:auto;height:auto;border:0px;"><i style="color:blue;font-size:12px;" class="fas fa-flag"></i></button>
                                                                </form>
                                                            @empty
                                                                <form action="{{ URL::route("flag") }}" method="POST">
                                                                    <input type="hidden" name="relation_id" value="{{$channels->id}}"/>
                                                                    <input type="hidden" name="relation" value="channel"/>
                                                                    <button style="width:auto;height:auto;border:0px;"><i style="color:#ED5565;font-size:12px;" class="fas fa-flag"></i></button>
                                                                </form>
                                                            @endforelse

                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div></a>
                                </div>
                            @endforeach
                            @foreach(Posts::where("visibility", "=", "1")->where("text", "like", "%" . $query . "%")->orderBy('post_time', 'DESC')->orderBy('post_date', 'DESC')->get() as $post)

                                @if ($post->media_type == 'text')
                                    <div class="col-md">
                                        <div class="card">
                                            <div class="card-body" style="color: black">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <h4 class="card-title">{{{ User::where("id", "=", $post->author_id)->pluck("username") }}} | {{{ $post->post_date }}}</h4>
                                                    </div>
                                                    <div class="col-md-2">
                                                        @if (Auth::check())
                                                            @forelse(Flags::where("reporter_id", "=", Auth::user()->id)->where("relation_id","=",$post->post_id)->limit(1)->get() as $flag_check)
                                                                <form action="{{ URL::route("unflag") }}" method="POST">
                                                                    <input type="hidden" name="relation_id" value="{{$post->post_id}}"/>
                                                                    <button style="width:auto;height:auto;border:0px;"><i style="color:blue;font-size:12px;" class="fas fa-flag"></i></button>
                                                                </form>
                                                            @empty
                                                                <form action="{{ URL::route("flag") }}" method="POST">
                                                                    <input type="hidden" name="relation_id" value="{{$post->post_id}}"/>
                                                                    <input type="hidden" name="relation" value="post"/>
                                                                    <button style="width:auto;height:auto;border:0px;"><i style="color:#ED5565;font-size:12px;" class="fas fa-flag"></i></button>
                                                                </form>
                                                            @endforelse

                                                        @endif
                                                    </div>
                                                </div>
                                                <i style="color:#FFCE54" class="fas fa-pencil-alt"></i>
                                                <p class="card-text">{{{ $post->text }}}</p>
                                            </div>

                                        </div>
                                    </div>
                                @endif
                                @if ($post->media_type == 'jpg' OR $post->media_type == 'png' OR $post->media_type == 'PNG' OR $post->media_type == 'JPG')
                                    <a href="{{ URL::route("discover.photoView", $post->post_id) }}"><div class="col-md">
                                            <div class="card">
                                                <img class="card-img-top" src="{{ URL::to($post->file_path) }}" alt="Card image cap">
                                                <div class="card-body" style="color: black">
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <h4 class="card-title">{{{ User::where("id", "=", $post->author_id)->pluck("username") }}} | {{{ $post->post_date }}}</h4>
                                                        </div>
                                                        <div class="col-md-2">
                                                            @if (Auth::check())
                                                                @forelse(Flags::where("reporter_id", "=", Auth::user()->id)->where("relation_id","=",$post->post_id)->limit(1)->get() as $flag_check)
                                                                    <form action="{{ URL::route("unflag") }}" method="POST">
                                                                        <input type="hidden" name="relation_id" value="{{$post->post_id}}"/>
                                                                        <button style="width:auto;height:auto;border:0px;"><i style="color:blue;font-size:12px;" class="fas fa-flag"></i></button>
                                                                    </form>
                                                                @empty
                                                                    <form action="{{ URL::route("flag") }}" method="POST">
                                                                        <input type="hidden" name="relation_id" value="{{$post->post_id}}"/>
                                                                        <input type="hidden" name="relation" value="post"/>
                                                                        <button style="width:auto;height:auto;border:0px;"><i style="color:#ED5565;font-size:12px;" class="fas fa-flag"></i></button>
                                                                    </form>
                                                                @endforelse

                                                            @endif
                                                        </div>
                                                    </div>
                                                    <center><i style="color:#48CFAD" class="far fa-image"></i></center>
                                                    <p class="card-text">{{{ $post->text }}}</p>
                                                </div>
                                            </div>
                                        </div></a>
                                @endif
                                @if ($post->media_type == 'mp4' OR $post->media_type == 'MP4')
                                    <div class="col-md">
                                        <div class="card">
                                            <div class="row" style="padding:5px;width:auto;margin:0px;border-radius:0px;background:#5d3bae;box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75);color:white;position: relative;">
                                                <div class="col-md-2">
                                                    @if (Auth::check())
                                                        @forelse(Flags::where("reporter_id", "=", Auth::user()->id)->where("relation_id","=",$post->post_id)->limit(1)->get() as $flag_check)
                                                            <form action="{{ URL::route("unflag") }}" method="POST">
                                                                <input type="hidden" name="relation_id" value="{{$post->post_id}}"/>
                                                                <button style="width:auto;height:auto;border:0px;"><i style="color:blue;font-size:12px;" class="fas fa-flag"></i></button>
                                                            </form>
                                                        @empty
                                                            <form action="{{ URL::route("flag") }}" method="POST">
                                                                <input type="hidden" name="relation_id" value="{{$post->post_id}}"/>
                                                                <input type="hidden" name="relation" value="post"/>
                                                                <button style="width:auto;height:auto;border:0px;"><i style="color:#ED5565;font-size:12px;" class="fas fa-flag"></i></button>
                                                            </form>
                                                        @endforelse

                                                    @endif
                                                </div>
                                                <div class="col-4">
                                                    <i style="color:#AC92EC" class="fas fa-video"></i>
                                                    <span>{{{ User::where("id", "=", $post->author_id)->pluck("username") }}}</span>
                                                </div>
                                                <div class="col-4">
                                                    <span>{{ $post->post_date }}</span>
                                                </div>

                                            </div>
                                            <div class="card-group" style="color:black;">
                                                <div class="card" style="background:#efefef;border:0px;padding:15px;color:black;">
                                                    {{ $post->text }}
                                                </div>
                                            </div>
                                            <div class="card-group" style="background:#efefef;border:0px;color:black;">
                                                <div class="card" style="background:#efefef;border:0px;">
                                                    <video id="my-video" class="video-js" controls preload="auto" width="100%" height="auto" style="width:100%;height:auto;position: relative;"
                                                           poster="{{ URL::to('data_store/post_media/'.$post->post_id.'.jpg') }}" data-setup="{}">
                                                        <source src="{{ URL::to($post->file_path) }}" type='video/mp4'>
                                                        <source src="{{ URL::to($post->file_path) }}" type='video/webm'>
                                                        <p class="vjs-no-js">
                                                            To view this video please enable JavaScript, and consider upgrading to a web browser that
                                                        </p>
                                                    </video>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    @if (Auth::check())
                </div>
                @else

        </div>
    @endif
@stop