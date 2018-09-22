@extends('layouts.public', ["title" => $channel->unique_channelname, "sidebar" => false])
@section("in-head")
    <meta property="og:url" content="https://www.facesmash.co.uk/channel/{{ $channel->unique_channelname }}">
    {{--<meta property="og:type" content="website">--}}
    <meta property="og:title" content="{{ $channel->unique_channelname }}">
    <meta property="og:description" content="{{ $channel->about }}">
    <meta property="og:image" content="{{ URL::to($channel->banner_img_path) }}">
    {{--<meta name="theme-color" content="#ffffff">--}}
    {{--<meta content="Casper Round" name="author">--}}
@stop

@section("content")
    <style>
        .m-p-g {
            width:100%;
            max-width: 800px;
            margin: 0 auto;
        }
        .m-p-g__thumbs-img {
            margin: 0;
            float: left;
            vertical-align: bottom;
            cursor: pointer;
            z-index: 1;
            position: relative;
            opacity: 0;
            -webkit-filter: brightness(100%);
            filter: brightness(100%);
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            will-change: opacity, transform;
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        }
        .m-p-g__thumbs-img.active {
            z-index: 50;
        }
        .m-p-g__thumbs-img.layout-completed {
            opacity: 1;
        }
        .m-p-g__thumbs-img.hide {
            opacity: 0;
        }
        .m-p-g__thumbs-img:hover {
            -webkit-filter: brightness(110%);
            filter: brightness(110%);
        }
        .m-p-g__fullscreen {
            position: fixed;
            z-index: 10;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100vh;
            background: rgba(0, 0, 0, 0);
            visibility: hidden;
            transition: background 0.25s ease-out, visibility 0.01s 0.5s linear;
            will-change: background, visibility;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }
        .m-p-g__fullscreen.active {
            transition: background .25s ease-out, visibility .01s 0s linear;
            visibility: visible;
            background: rgba(0, 0, 0, 0.95);
        }
        .m-p-g__fullscreen-img {
            pointer-events: none;
            position: absolute;
            -webkit-transform-origin: left top;
            transform-origin: left top;
            top: 50%;
            left: 50%;
            max-height: 100vh;
            max-width: 100%;
            visibility: hidden;
            will-change: visibility;
            transition: opacity 0.5s ease-out;
        }
        .m-p-g__fullscreen-img.active {
            visibility: visible;
            opacity: 1 !important;
            transition: opacity 0.5s ease-out, -webkit-transform 0.5s cubic-bezier(0.23, 1, 0.32, 1);
            transition: transform 0.5s cubic-bezier(0.23, 1, 0.32, 1), opacity 0.5s ease-out;
            transition: transform 0.5s cubic-bezier(0.23, 1, 0.32, 1), opacity 0.5s ease-out, -webkit-transform 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        }
        .m-p-g__fullscreen-img.almost-active {
            opacity: 0;
            -webkit-transform: translate3d(0, 0, 0) !important;
            transform: translate3d(0, 0, 0) !important;
        }
        .m-p-g__controls {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 200;
            height: 20vh;
            background: linear-gradient(to top, transparent 0%, rgba(0, 0, 0, 0.55) 100%);
            opacity: 0;
            visibility: hidden;
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        }
        .m-p-g__controls.active {
            opacity: 1;
            visibility: visible;
        }
        .m-p-g__controls-close, .m-p-g__controls-arrow {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border: none;
            background: none;
        }
        .m-p-g__controls-close:focus, .m-p-g__controls-arrow:focus {
            outline: none;
        }
        .m-p-g__controls-arrow {
            position: absolute;
            z-index: 1;
            top: 0;
            width: 20%;
            height: 100vh;
            display: flex;
            align-items: center;
            cursor: pointer;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            opacity: 0;
        }
        .m-p-g__controls-arrow:hover {
            opacity: 1;
        }
        .m-p-g__controls-arrow--prev {
            left: 0;
            padding-left: 3vw;
            justify-content: flex-start;
        }
        .m-p-g__controls-arrow--next {
            right: 0;
            padding-right: 3vw;
            justify-content: flex-end;
        }
        .m-p-g__controls-close {
            position: absolute;
            top: 3vh;
            left: 3vw;
            z-index: 5;
            cursor: pointer;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }
        .m-p-g__btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.07);
            transition: all .25s ease-out;
        }
        .m-p-g__btn:hover {
            background: rgba(255, 255, 255, 0.15);
        }
        .m-p-g__alertBox {
            position: fixed;
            z-index: 999;
            max-width: 700px;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            background: white;
            padding: 25px;
            border-radius: 3px;
            text-align: center;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.23), 0 10px 40px rgba(0, 0, 0, 0.19);
            color: grey;
        }
        .m-p-g__alertBox h2 {
            color: red;
        }


        .demo-btn {
            display: inline-block;
            margin: 0 2.5px 4vh 2.5px;
            text-decoration: none;
            color: grey;
            padding: 15px;
            line-height: 1;
            min-width: 140px;
            background: rgba(0, 0, 0, 0.07);
            border-radius: 6px;
        }

        .demo-btn:hover {
            background: rgba(0, 0, 0, 0.12);
        }

        @media (max-width: 640px) {
            .demo-btn {
                min-width: 0;
                font-size: 14px;
            }
        }
    </style>
    @if (Auth::check())
        <div class="col-8" style="overflow-y:scroll;margin-top:60px;padding:10px;background:#efefef;height:100vh;">
            @else
                <div class="col-12" style="margin-top:60px;padding:10px;background:#efefef;height:100vh;">

                    <div class="container-fluid">
                        @endif
                        <div class="col-md" style="overflow-y:scroll;margin-top:10px;padding:10px;background:#efefef;height:100vh;">
                                <div class="card" style="max-width:800px;width:100%;margin-left:auto;margin-right:auto;border:0px;background:#5d3bae;">
                                    <div class="card-body" style="padding:0px;    background-position: 73%;
    background-repeat: no-repeat;
    background-size: cover;
    margin: 0 auto;
    max-height: 200px;
    max-width: 100%;
    overflow: hidden;">
                                        <img class="card-img-top" style="z-index:10;position: relative;height: 50px;width: 50px;" src="{{ URL::to($channel->channel_img_path) }}" alt="Card image cap">

                                        <center>

                                            <img style="top: -150px;position:relative;height: 400px!important;" class="card-img-top" src="{{ URL::to($channel->banner_img_path) }}" alt="Card image cap">

                                        </center>
                                    </div>
                                    <div class="card-body" style="padding:20px;background:white;">
                                        <i style="color:#A0D468" class="fas fa-tv"></i>
                                        <p style="font-size:20px;font-weight:bold;color:black" class="card-text">{{ $channel->unique_channelname }}</p>
                                    </div>
                                </div>
                                @if (Auth::check())

                                    <div class="Post_Container" style="max-width:800px;width:100%;margin-left:auto;margin-right:auto;">
                                        <form enctype="multipart/form-data" action="{{ URL::route("channels.createNewPost") }}" method="POST">
                                            <div class="row">
                                                <div class="col-8">
                                                    <textarea name="home_post" style="width:100%;height:50px;resize: none;border-radius: 5px;background:#efefef;border-color: #5d3bae;" placeholder="Write something about your day..."></textarea>
                                                    <button type="submit" class="btn purp-button">Post</button>
                                                </div>
                                                <div class="col">
                                                    <input name="file_upload" class="form-control" type="file" onchange="readURL(this);" >
                                                    <input name="relation_id" type="hidden" value="{{ $channel->id }}" >
                                                    <input name="unique_channelname" type="hidden" value="{{ $channel->unique_channelname }}" >
                                                    @if ($channel->channel_type == "1")
                                                    <video controls id="blah" src="#" style="box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.75);margin: 20px;" alt="your image"></video>
                                                    @endif
                                                    @if ($channel->channel_type == "2")
                                                        <img id="blah" src="#" style="box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.75);margin: 20px;" alt="your image"></img>

                                                    @endif
                                                    <script>
                                                        function readURL(input) {
                                                            if (input.files && input.files[0]) {
                                                                var reader = new FileReader();

                                                                reader.onload = function (e) {
                                                                    $('#blah')
                                                                        .attr('src', e.target.result)
                                                                        .width(150)
                                                                        .height(auto);
                                                                };
                                                                reader.readAsDataURL(input.files[0]);
                                                            }
                                                        }
                                                    </script>
                                                    {{ Form::token() }}
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                                <div class="row" style="max-width: 800px;margin-left:auto;margin-right:auto;width:100%;position: relative;">
                                    @if ($channel->channel_type == "1")
                                @foreach(Posts::where("relation_id", "=", $channel->id)->where("relation", "=", "channel")->orderBy('post_time', 'DESC')->orderBy('post_date', 'DESC')->get() as $post)
                                    @if ($post->media_type == 'mp4' OR $post->media_type == 'MP4')
                                        <div class="col-md-6" style="max-width:45%;height:100%;padding:0px;margin:10px;display:inline-block;background:white;box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.75);color:white;border-radius: 5px;margin-top:20px;">
                                            <div class="row" style="padding:5px;width:auto;margin:0px;border-radius:0px;background:#5d3bae;box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75);color:white;position: relative;">
                                                <div class="col-4">
                                                    @if ($post->author_id == $channel->owner_id)
                                                        <img class="img" style="height:40px;width:40px;border-radius: 50px;" src="{{ URL::to($channel->channel_img_path) }}"/>
                                                    @else
                                                        <img class="img" style="height:40px;width:40px;border-radius: 50px;" src="{{URL::to(User::where("id", "=", $post->author_id)->limit(1)->pluck("profile_img_path"))}}"/>
                                                    @endif                                                </div>
                                                <div class="col-4">
                                                    <i style="color:#AC92EC" class="fas fa-video"></i>
                                                    @if ($post->author_id == $channel->owner_id)
                                                        <span>{{ $channel->unique_channelname }}</span>
                                                    @else
                                                        <span>{{User::where("id", "=", $post->author_id)->pluck("username");}}</span>
                                                    @endif
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
                                    @endif
                                @endforeach
                                        @endif
                                        @if ($channel->channel_type == "2")

                                            <div class="m-p-g">
                                                <div class="m-p-g__thumbs" data-google-image-layout data-max-height="350">
                                                    <div class="row" style="background:#434A54">
                                                        @foreach(Posts::where("relation_id", "=", $channel->id)->where("relation", "=", "channel")->orderBy('post_date', 'DESC')->orderBy('post_time', 'DESC')->get() as $post)
                                                            @if ($post->media_type == 'jpg' OR $post->media_type == 'JPG')
                                                                <div class="col-md-4" style="max-height:300px;max-width:100%;overflow:hidden;">
                                                                    <div class="row" style="background:#434A54">
                                                                        <div class="col-10">
                                                                            @if ($post->author_id == $channel->owner_id)
                                                                                <span style="font-size:12px">{{ $channel->unique_channelname }}</span>
                                                                            @else
                                                                                <span>{{User::where("id", "=", $post->author_id)->pluck("username");}}</span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <form action="{{ URL::route("flag") }}" method="POST">
                                                                                <input type="hidden" name="relation_id" value="{{$post->post_id}}"/>
                                                                                <input type="hidden" name="relation" value="{{$post->relation}}"/>
                                                                                <input type="hidden" name="url" value="/channels/{{$channel->unique_channelname}}"/>
                                                                                <button><i style="color:red;font-size:8px;" class="fas fa-flag"></i></button>
                                                                            </form>
                                                                        </div>

                                                                    </div>
                                                                    <img src="{{ URL::to($post->file_path) }}" data-full="{{ URL::to($post->file_path) }}" class="m-p-g__thumbs-img" />
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="m-p-g__fullscreen">test</div>
                                            </div>
                                                <script>
                                                    var elem = document.querySelector('.m-p-g');

                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        var gallery = new MaterialPhotoGallery(elem);
                                                    });
                                                </script>
                                            <script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/45226/material-photo-gallery.min.js'></script>

                                        @endif
                                </div>

                        </div>

                        @if (Auth::check())
                    </div>
                    @else
                </div>
        </div>
    @endif
@stop