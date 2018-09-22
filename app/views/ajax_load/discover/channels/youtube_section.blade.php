<?php
/**
 * Created by PhpStorm.
 * User: Casper
 * Date: 10/06/2018
 * Time: 18:31
 */

if(!isset($limit)) $limit = 4;

// Set up the base query. Order by ID DESC and set a limit (we always get a $limit int)
$query = YoutubeChannels::orderBy('id', 'desc')->limit($limit);

// If a $start_at_id is specified, set it. If no $start_at_id is specified, then we've been asked for the first page of results.
if(isset($start_at_id) and is_numeric($start_at_id)) $query = $query->where('id', '<', $start_at_id);

?>
@foreach($query->get() as $youtube)
    <div class="col-md-4 item" data-video-id="{{ $youtube->id }}">
        <a href="{{ URL::route("youtubeview", $youtube->channel_id) }}"><div class="card">
                <img class="card-img-top" src="{{ URL::to($youtube->channel_banner) }}" alt="Card image cap">
                <div class="card-body">
                    <center><p style="font-size:20px;font-weight:bold;color:black;" class="card-text">{{ $youtube->channel_title }}</p></center>
                </div>
            </div></a>
    </div>
@endforeach


