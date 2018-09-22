<?php
/**
 * Created by PhpStorm.
 * User: Casper
 * Date: 10/06/2018
 * Time: 18:31
 */

if(!isset($limit)) $limit = 15;

// Set up the base query. Order by ID DESC and set a limit (we always get a $limit int)
$query = TumblrPosts::orderBy('id', 'desc')->limit($limit);

// If a $start_at_id is specified, set it. If no $start_at_id is specified, then we've been asked for the first page of results.
if(isset($start_at_id) and is_numeric($start_at_id)) $query = $query->where('id', '<', $start_at_id);

?>
@foreach($query->get() as $tumblr)
    @if($tumblr->type == "photo")
        <div class="col-md-4 item" data-video-id="{{ $tumblr->id }}">
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
        <div class="col-md-4 item" data-video-id="{{ $tumblr->id }}">
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


