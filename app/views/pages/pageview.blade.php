@extends('layouts.public', ["title" => $page->unique_pagename, "sidebar" => false])
@section("in-head")
    <meta property="og:url" content="https://www.facesmash.co.uk/page/{{ $page->unique_pagename }}">
    {{--<meta property="og:type" content="website">--}}
    <meta property="og:title" content="{{ $page->unique_pagename }}">
    <meta property="og:description" content="{{ $page->about }}">
    <meta property="og:image" content="{{ URL::to($page->banner_img_path) }}">
    {{--<meta name="theme-color" content="#ffffff">--}}
    {{--<meta content="Casper Round" name="author">--}}
@stop
@section("content")
    @if (Auth::check())
        <div class="col-8" style="overflow-y:scroll;margin-top:60px;padding:10px;background:#efefef;height:100vh;">
            @else
                <div class="col-12" style="margin-top:60px;padding:10px;background:#efefef;height:100vh;">

                    <div class="container-fluid">
                        @endif
                        <div class="col-md" style="overflow-y:scroll;margin-top:10px;padding:10px;background:#efefef;height:100vh;">
                                    <div class="card">
                                        <img class="card-img-top" style="height: 50px;width: 50px;" src="{{ URL::to($page->page_img_path) }}" alt="Card image cap">
                                        <div class="card-body">
                                            <center>
                                                <img style="height: 400px!important;" class="card-img-top" src="{{ URL::to($page->banner_img_path) }}" alt="Card image cap">
                                                <i style="color:#ED5565" class="far fa-file-alt"></i>
                                                <p style="font-size:20px;font-weight:bold;color:black" class="card-text">{{ $page->unique_pagename }}</p>
                                            </center>
                                        </div>
                                    </div>
                                @if (Auth::check())

                                <div class="Post_Container">
                                        <form enctype="multipart/form-data" action="{{ URL::route("pages.createNewPost") }}" method="POST">
                                            <div class="row">
                                                <div class="col-8">
                                                    <textarea name="home_post" style="width:100%;height:50px;resize: none;border-radius: 5px;background:#efefef;border-color: #5d3bae;" placeholder="Write something about your day..."></textarea>
                                                    <button type="submit" class="btn purp-button">Post</button>
                                                </div>
                                                <div class="col">
                                                    <input name="file_upload" class="form-control" type="file" onchange="readURL(this);" >
                                                    <input name="relation_id" type="hidden" value="{{ $page->id }}" >
                                                    <input name="unique_pagename" type="hidden" value="{{ $page->unique_pagename }}" >

                                                    <img id="blah" src="#" style="box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.75);margin: 20px;" alt="your image">
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
                                @foreach(Posts::where("relation_id", "=", $page->id)->where("relation", "=", "page")->orderBy('post_time', 'DESC')->orderBy('post_date', 'DESC')->get() as $post)
                                    @if ($post->media_type == 'text')
                                        <div style="box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.75);color:black;border-radius: 5px;margin-top:20px;">
                                            <div class="row" style="width:100%;margin:0px;position: relative;">
                                                <div class="col-1">
                                                    @if ($post->author_id == $page->owner_id)
                                                    <img class="img" style="height:40px;width:40px;border-radius: 50px;" src="{{ URL::to($page->page_img_path) }}"/>
                                                    @else
                                                        <img class="img" style="height:40px;width:40px;border-radius: 50px;" src="{{URL::to(User::where("id", "=", $page->author_id)->limit(1)->pluck("profile_img_path"))}}"/>
                                                    @endif
                                                </div>
                                                <div class="col-2">
                                                    <i style="color:#FFCE54" class="fas fa-pencil-alt"></i>
                                                    @if ($post->author_id == $page->owner_id)
                                                        <span>{{ $page->unique_pagename }}</span>
                                                    @else
                                                        <span>{{User::where("id", "=", $post->author_id)->pluck("username");}}</span>
                                                    @endif
                                                </div>
                                                <div class="col-2">
                                                    <span>{{ $post->post_date }}</span>
                                                </div>
                                                <div class="col-md-2">
                                                    <form action="{{ URL::route("flag") }}" method="POST">
                                                        <input type="hidden" name="relation_id" value="{{$post->post_id}}"/>
                                                        <input type="hidden" name="relation" value="{{$post->relation}}"/>
                                                        <input type="hidden" name="url" value="/channels/{{$page->unique_channelname}}"/>
                                                        <button><i style="color:red;font-size:8px;" class="fas fa-flag"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="card-group" style="color:black;">
                                                <div class="card" style="padding:15px;">
                                                    {{ $post->text }}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($post->media_type == 'jpg' OR $post->media_type == 'png' OR $post->media_type == 'PNG' OR $post->media_type == 'JPG')
                                        <div style="box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.75);color:black;border-radius: 5px;margin-top:20px;">
                                            <div class="row" style="width:100%;margin:0px;position: relative;">
                                                <div class="col-1">
                                                    @if ($post->author_id == $page->owner_id)
                                                        <img class="img" style="height:40px;width:40px;border-radius: 50px;" src="{{ URL::to($page->page_img_path) }}"/>
                                                    @else
                                                        <img class="img" style="height:40px;width:40px;border-radius: 50px;" src="{{URL::to(User::where("id", "=", $post->author_id)->limit(1)->pluck("profile_img_path"))}}"/>
                                                    @endif                                                </div>
                                                <div class="col-2">
                                                    <i style="color:#48CFAD" class="far fa-image"></i>
                                                    @if ($post->author_id == $page->owner_id)
                                                        <span>{{ $page->unique_pagename }}</span>
                                                    @else
                                                        <span>{{User::where("id", "=", $post->author_id)->pluck("username");}}</span>
                                                    @endif
                                                </div>
                                                <div class="col-2">
                                                    <span>{{ $post->post_date }}</span>
                                                </div>
                                                <div class="col-md-2">
                                                    <form action="{{ URL::route("flag") }}" method="POST">
                                                        <input type="hidden" name="relation_id" value="{{$post->post_id}}"/>
                                                        <input type="hidden" name="relation" value="{{$post->relation}}"/>
                                                        <input type="hidden" name="url" value="/channels/{{$page->unique_channelname}}"/>
                                                        <button><i style="color:red;font-size:8px;" class="fas fa-flag"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="card-group" style="color:black;">
                                                <div class="card" style="padding:15px;">
                                                    {{ $post->text }}
                                                </div>
                                            </div>
                                            <div class="card-group" style="color:black;">
                                                <div class="card">
                                                    <img style="width: 100%;height: auto;padding: 10px;" src="{{ URL::to($post->file_path) }}">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                        </div>

                        @if (Auth::check())
                    </div>
                    @else
                </div>
        </div>
    @endif
@stop