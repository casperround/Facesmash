<?php
/**
 * Created by PhpStorm.
 * User: Casper
 * Date: 10/06/2018
 * Time: 18:31
 */
if(!isset($limit)) $limit = 4;
$query = Posts::limit($limit);

// If a $start_at_id is specified, set it. If no $start_at_id is specified, then we've been asked for the first page of results.
if(isset($start_at_id) and is_numeric($start_at_id)) $query = $query->where('id', '<', $start_at_id);

?>
@foreach($query->get() as $post)

    @if ($post->media_type == 'jpg' OR $post->media_type == 'png' OR $post->media_type == 'PNG' OR $post->media_type == 'JPG')
        <div class="item" style="box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.75);color:black;border-radius: 5px;margin-top:20px;" data-video-id="{{ $post->post_id }}">
            <div class="row" style="width:100%;margin:0px;position: relative;">
                <div class="col-1">
                    {{--<img  class="img" style="height:40px;width:40px;border-radius: 50px;" src="{{ URL::to(Auth::user()->profile_img_path) }}"/>--}}
                </div>
                <div class="col-2">
                    {{--<span>{{Auth::user()->username}}</span>--}}
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

@endforeach