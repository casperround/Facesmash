<?php
/**
 * Created by PhpStorm.
 * User: Casper
 * Date: 10/06/2018
 * Time: 18:31
 */

if(!isset($limit)) $limit = 15;

// Set up the base query. Order by ID DESC and set a limit (we always get a $limit int)
$query = Posts::where("author_id", "=", Auth::user()->id)->where("relation", "=", "feed")->orderBy('id', 'desc')->limit($limit);






// If a $start_at_id is specified, set it. If no $start_at_id is specified, then we've been asked for the first page of results.
if(isset($start_at_id) and is_numeric($start_at_id)) $query = $query->where('id', '<', $start_at_id);

?>
@foreach($query->get() as $post)
    <div class="col-md-12 item" data-video-id="{{ $post->id }}">
        @if ($post->media_type == 'text')
            <div style="box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.75);color:black;border-radius: 5px;margin-top:20px;">
                <div class="row" style="width:100%;margin:0px;position: relative;">
                    <div class="col-1">
                        <img class="img" style="height:40px;width:40px;border-radius: 50px;" src="{{ URL::to(Auth::user()->profile_img_path) }}"/>
                    </div>
                    <div class="col-2">
                        <span>{{Auth::user()->username}}</span>
                    </div>
                    <div class="col-2">
                        <span>{{ $post->post_date }}</span>
                    </div>

                </div>
                <div class="card-group" style="color:black;">
                    <div class="card" style="padding:15px;">
                        {{ $post->text }}
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="col-md-12 item" data-video-id="{{ $post->id }}">
        @if ($post->media_type == 'jpg' OR $post->media_type == 'png' OR $post->media_type == 'PNG' OR $post->media_type == 'JPG')
            <div style="box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.75);color:black;border-radius: 5px;margin-top:20px;">
                <div class="row" style="width:100%;margin:0px;position: relative;">
                    <div class="col-1">
                        <img  class="img" style="height:40px;width:40px;border-radius: 50px;" src="{{ URL::to(Auth::user()->profile_img_path) }}"/>
                    </div>
                    <div class="col-2">
                        <span>{{Auth::user()->username}}</span>
                    </div>
                    <div class="col-2">
                        <span>{{ $post->post_date }}</span>
                    </div>

                </div>
                <div class="card-group" style="color:black;">
                    <div class="card" style="padding:15px;">
                        {{ $post->text }}
                    </div>
                </div>
                <div class="card-group" style="color:black;">
                    <div class="card">
                        <img style="width: 100%;height: auto;padding: 10px;" src="{{ $post->file_path }}">
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="col-md-12 item" data-video-id="{{ $post->id }}">
        @if ($post->media_type == 'mp4' OR $post->media_type == 'MP4')
            <div style="box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.75);color:black;border-radius: 5px;margin-top:20px;">
                <div class="row" style="width:100%;margin:0px;position: relative;">
                    <div class="col-1">
                        <img  class="img" style="height:40px;width:40px;border-radius: 50px;" src="{{ URL::to(Auth::user()->profile_img_path) }}"/>
                    </div>
                    <div class="col-2">
                        <span>{{Auth::user()->username}}</span>
                    </div>
                    <div class="col-2">
                        <span>{{ $post->post_date }}</span>
                    </div>

                </div>
                <div class="card-group" style="color:black;">
                    <div class="card" style="padding:15px;">
                        {{ $post->text }}
                    </div>
                </div>
                <div class="card-group" style="color:black;">
                    <div class="card">
                        <video id="my-video" class="video-js" controls preload="auto" width="100%" height="auto" style="width:100%;height:auto;position: relative;"
                               poster="{{ URL::to('data_store/post_media/'.$post->post_id.'.jpg') }}" data-setup="{}">
                            <source src="{{ URL::to($post->file_path) }}" type='video/mp4'>
                            <source src="{{ URL::to($post->file_path) }}" type='video/webm'>
                            <p class="vjs-no-js">
                                To view this video please enable JavaScript, and consider upgrading to a web browser that
                            </p>
                        </video>                            </div>
                </div>
            </div>
        @endif
    </div>
@endforeach


