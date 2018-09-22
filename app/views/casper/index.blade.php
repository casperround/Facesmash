
@extends('layouts.casper.index', ["title" => "Home", "sidebar" => false])

@section("content")
<div class="w3-top">
    <ul class="w3-navbar" id="myNavbar">
        <li><a href="#" class="w3-padding-large">Casper</a></li>

    </ul>
</div>

<!-- First Parallax Image with Logo Text -->
<div class="bgimg-1 w3-opacity w3-display-container">
    <div class="w3-display-middle" style="white-space:nowrap;">
        <h1 class="w3-center w3-padding-xlarge w3-black w3-xlarge w3-wide w3-animate-opacity">Casper <span class="w3-hide-small">Round</span></h1>
    </div>
</div>

{{--<!-- Container (About Section) -->--}}
{{--<div class="w3-content w3-container w3-padding-64" id="about">--}}
    {{--<h2 class="w3-center">ABOUT ME</h2>--}}
    {{--<p class="w3-center"><em>I love Programming</em></p>--}}
    {{--<p>I am Christian Pecson. I am a dreamer whose dream is to build awesome things in the future and to contribute something useful to the world.But hey this website symbolizes that I contribute something in the world.</p>--}}
    {{--<!--  Profile Picture and Description  -->--}}
    {{--<div class="w3-row">--}}
        {{--<div class="w3-col m6 w3-center w3-section">--}}
            {{--<img src="https://www.dropbox.com/s/mm2bb2xyftqn6am/profile%20%281%29.jpg?raw=1" id="profile" class="w3-circle" alt="Photo of Me">--}}
        {{--</div>--}}

        {{--<!-- Hide this text on small devices -->--}}
        {{--<div class="w3-col m6 w3-hide-small w3-section">--}}
            {{--<p>By the help of FreeCodeCamp I will be a Full Stack Web Developer soon!</p>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

<!-- Second Parallax Image with Portfolio Text -->
<div class="bgimg-2 w3-display-container" id="portfolio">
    <div class="w3-display-middle">
        <span class="w3-xxlarge w3-text-light-grey w3-wide">PORTFOLIO</span>
    </div>
</div>

<!-- Container (Portfolio Section) -->
<div class="w3-content w3-container w3-padding-64">
    <h2 class="w3-center">MY WORK</h2>

    <!-- Responsive Grid. Four columns on tablets, laptops and desktops. Will stack on mobile devices/small screens (100% width) -->
    <div class="w3-row-padding w3-center">

        @foreach(Posts::where("relation","=","work")->orderBy('post_date', 'DESC')->orderBy('post_time', 'DESC')->get() as $post)


            @if ($post->media_type == 'text')
                <div class="w12-col m12">
                    <div class="row">
                        <div class="col-md-6">
                            <span>{{$post->post_date}}</span>
                        </div>
                        <div class="col-md-6">
                            <span>{{$post->post_time}}</span>
                        </div>
                    </div>
                    <span>{{ $post->text }}</span>
                </div>
            @endif
            @if ($post->media_type == 'jpg' OR $post->media_type == 'png' OR $post->media_type == 'PNG' OR $post->media_type == 'JPG' OR $post->media_type == 'gif' OR $post->media_type == 'GIF')
                <div class="w3-col m3">
                    <div class="row">
                        <div class="col-md-6">
                            <span>{{$post->post_date}}</span>
                        </div>
                        <div class="col-md-6">
                            <span>{{$post->post_time}}</span>
                        </div>
                    </div>
                    <img src="{{ $post->file_path }}" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity">
                    <span>{{ $post->text }}</span>
                </div>
            @endif
            @if ($post->media_type == 'mp4' OR $post->media_type == 'MP4')
                <div class="w3-col m3">
                    <div class="row">
                        <div class="col-md-6">
                            <span>{{$post->post_date}}</span>
                        </div>
                        <div class="col-md-6">
                            <span>{{$post->post_time}}</span>
                        </div>
                    </div>
                    <video id="my-video" class="w3-hover-opacity video-js" controls preload="auto" width="100%" height="auto" style="width:100%;height:auto;position: relative;"
                           poster="{{ URL::to('data_store/post_media/'.$post->post_id.'.jpg') }}" data-setup="{}">
                        <source src="{{ URL::to($post->file_path) }}" type='video/mp4'>
                        <source src="{{ URL::to($post->file_path) }}" type='video/webm'>
                        <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a web browser that
                        </p>
                    </video>
                    <span>{{ $post->text }}</span>
                </div>

            @endif
        @endforeach
    </div>


</div>

<!-- Modal for full size images on click-->
<div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
    <span class="w3-closebtn w3-hover-red w3-text-white w3-xxxlarge w3-container w3-display-topright">×</span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
        <img id="img01" style="max-width:100%">
    </div>
</div>

<!-- Third Parallax Image with Portfolio Text -->
<div class="bgimg-3 w3-display-container" id="contact">
    <div class="w3-display-middle">
    </div>
</div>


<!-- Container (Portfolio Section) -->
<div class="w3-content w3-container w3-padding-64">
    <h2 class="w3-center">Diary</h2>

    <!-- Responsive Grid. Four columns on tablets, laptops and desktops. Will stack on mobile devices/small screens (100% width) -->
    <div class="w3-row-padding w3-center">

        @foreach(Posts::where("relation","=","casper")->orderBy('post_date', 'DESC')->orderBy('post_time', 'DESC')->get() as $post)


            @if ($post->media_type == 'text')
                <div class="w12-col m12">
                    <div class="row">
                        <div class="col-md-6">
                            <span style="font-weight:bold;">{{$post->post_date}}</span>
                        </div>
                        <div class="col-md-6">
                            <span style="font-weight:bold;">{{$post->post_time}}</span>
                        </div>
                    </div>
                    <span>{{ $post->text }}</span>
                </div>
            @endif
            @if ($post->media_type == 'jpg' OR $post->media_type == 'png' OR $post->media_type == 'PNG' OR $post->media_type == 'JPG' OR $post->media_type == 'gif' OR $post->media_type == 'GIF')
                    <div class="w3-col m3">
                        <div class="row">
                            <div class="col-md-6">
                                <span style="font-weight:bold;">{{$post->post_date}}</span>
                            </div>
                            <div class="col-md-6">
                                <span style="font-weight:bold;">{{$post->post_time}}</span>
                            </div>
                        </div>
                        <img src="{{ $post->file_path }}" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity">
                        <span>{{ $post->text }}</span>
                    </div>
            @endif
            @if ($post->media_type == 'mp4' OR $post->media_type == 'MP4')
                    <div class="w3-col m3">
                        <div class="row">
                            <div class="col-md-6">
                                <span style="font-weight:bold;">{{$post->post_date}}</span>
                            </div>
                            <div class="col-md-6">
                                <span style="font-weight:bold;">{{$post->post_time}}</span>
                            </div>
                        </div>
                        <video id="my-video" class="w3-hover-opacity video-js" controls preload="auto" width="100%" height="auto" style="width:100%;height:auto;position: relative;"
                               poster="{{ URL::to('data_store/post_media/'.$post->post_id.'.jpg') }}" data-setup="{}">
                            <source src="{{ URL::to($post->file_path) }}" type='video/mp4'>
                            <source src="{{ URL::to($post->file_path) }}" type='video/webm'>
                            <p class="vjs-no-js">
                                To view this video please enable JavaScript, and consider upgrading to a web browser that
                            </p>
                        </video>
                        <span>{{ $post->text }}</span>
                    </div>

            @endif
        @endforeach

    </div>


</div>