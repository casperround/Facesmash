@extends('layouts.public', ["title" => $post->text, "sidebar" => false])
@section("in-head")
    <meta property="og:url" content="https://www.facesmash.co.uk/page/{{ $post->post_id }}">
    {{--<meta property="og:type" content="website">--}}
    <meta property="og:title" content="{{User::where("id", "=", $post->author_id)->limit(1)->pluck("username")}}">
    <meta property="og:description" content="{{ $post->text }}">
    <meta property="og:image" content="{{ URL::to($post->file_path) }}">
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
                                <div class="card-body">
                                    <center>
                                        <video style="height:auto;width:70%;" class="card-img-top" controls src="{{ URL::to($post->file_path) }}" alt="Card image cap"></video><br/>
                                        <i style="color:#AC92EC" class="fas fa-video"></i>
                                        <p style="font-size:20px;font-weight:bold;color:black" class="card-text">{{ $post->text }}</p>
                                    </center>
                                </div>
                            </div>

                        </div>

                        @if (Auth::check())
                    </div>
                    @else
                </div>
        </div>
    @endif
@stop