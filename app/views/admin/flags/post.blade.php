@extends('layouts.admin', ["title" => "Post", "sidebar" => false])

@section('content')
    <h1>Flagged Post</h1>
    @foreach($post as $post)

        @if ($post->media_type == 'text')
            <div class="col-md">
                <div class="card">
                    <div class="card-body" style="color: black">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="card-title">{{{ User::where("id", "=", $post->author_id)->pluck("username") }}} | {{{ $post->post_date }}}</h4>
                            </div>
                            <div class="col-md-2">

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

                                </div>
                            </div>
                            <center><i style="color:#48CFAD" class="far fa-image"></i></center>
                            <p class="card-text">{{{ $post->text }}}</p>
                        </div>
                    </div>
                </div></a>
        @endif
        @if ($post->media_type == 'mp4' OR $post->media_type == 'MP4')
            <div class="col-md-6" style="max-width:45%;height:100%;padding:0px;margin:10px;display:inline-block;background:white;box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.75);color:white;border-radius: 5px;margin-top:20px;">
                <div class="row" style="padding:5px;width:auto;margin:0px;border-radius:0px;background:#5d3bae;box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75);color:white;position: relative;">
                    <div class="col-4">
                                                                     </div>
                    <div class="col-4">
                        <i style="color:#AC92EC" class="fas fa-video"></i>

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
@stop