<?php
/**
 * Created by PhpStorm.
 * User: Casper
 * Date: 10/06/2018
 * Time: 18:31
 */
if(!isset($limit)) $limit = 8;
$query = Posts::where("visibility", "=", "1")->orderBy('id', 'DESC')->limit($limit);

// If a $start_at_id is specified, set it. If no $start_at_id is specified, then we've been asked for the first page of results.
if(isset($start_at_id) and is_numeric($start_at_id)) $query = $query->where('id', '<', $start_at_id);

?>
@foreach($query->get() as $post)
    <div class="col-md-12 item"
         style="max-width:45%;height:100%;padding:0px;margin:10px;display:inline-block;background:white;box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.75);
         color:white;border-radius: 5px;margin-top:20px;" data-video-id="{{ $post->post_id }}">
        <div class="row" style="padding:5px;width:auto;margin:0px;border-radius:0px;background:#5d3bae;box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75);color:white;position: relative;">
            <div class="col-6">
                <span>{{ $post->title }}</span>
            </div>
            <div class="col-6">
                <i style="color:#AC92EC" class="fas fa-video"></i>
            </div>
        </div>
        <div class="card-group" style="color:black;">
            <div class="card" style="max-height: 200px;
    overflow: scroll;;background:#efefef;border:0px;padding:15px;color:black;">
                {{ $post->description }}
            </div>
        </div>
        <div class="card-group" style="background:#efefef;border:0px;color:black;">
            <div class="card" style="background:#efefef;border:0px;">
                <iframe width="100%" height="200px" src="https://www.youtube.com/embed/{{ $post->video_id }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div>
    </div>
@endforeach