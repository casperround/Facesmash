@extends('layouts.public', ["title" => $youtube->channel_title, "sidebar" => false])
@section("in-head")
    <meta property="og:url" content="https://www.facesmash.co.uk/channel/{{ $youtube->channel_id }}">
    {{--<meta property="og:type" content="website">--}}
    <meta property="og:title" content="{{ $youtube->channel_title }}">
    <meta property="og:image" content="{{ URL::to($youtube->channel_banner) }}">
    <meta property="og:description" content="{{ $youtube->channel_title }}'s Youtube">
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
                        <div class="col-md" id="div" style="overflow-y:scroll;margin-top:10px;padding:10px;background:#efefef;height:100vh;">
                            <div class="card" style="max-width:800px;width:100%;margin-left:auto;margin-right:auto;border:0px;background:#5d3bae;">
                                <div class="card-body" style="padding:0px;    background-position: 73%;
    background-repeat: no-repeat;
    background-size: cover;
    margin: 0 auto;
    max-height: 200px;
    max-width: 100%;
    overflow: hidden;">

                                    <center>

                                        <img style="top: -150px;position:relative;height: 400px!important;" class="card-img-top" src="{{ URL::to($youtube->channel_banner) }}" alt="Card image cap">

                                    </center>
                                </div>
                                <div class="card-body" style="padding:20px;background:white;">
                                    <i style="color:#A0D468" class="fas fa-tv"></i>
                                    <p style="font-size:20px;font-weight:bold;color:black" class="card-text">{{ $youtube->channel_title }}</p>
                                </div>
                            </div>

                            <div class="row" style="max-width: 800px;margin-left:auto;margin-right:auto;width:100%;position: relative;" id="grid" data-channel-id="{{$youtube->channel_id}}">
                                {{--Assuming you're using grid as an ID in your CSS, so I'll add another id rather than overwRIteOk--}}
                                @include('ajax_load.discover.youtube.youtubeview_section', array('youtube' => $youtube))
                            </div>

                        </div>
                        <script type="text/javascript">
                            $(document).ready(function() {

                                $(document).ready(function () {
                                    let $grid = $('#grid');
                                    let $channel_id = $grid.attr('data-channel-id');
                                    var $loading_more_content = false;
                                    $('div').bind('scroll', chk_scroll);
                                });

                                function chk_scroll(e) {
                                    var elem = $(e.currentTarget);
                                    if (elem[0].scrollHeight - elem.scrollTop() == elem.outerHeight()) {


                                        var position = $(window).scrollTop();
                                        var bottom = $(document).height() - $(window).height();
                                        console.log(position, bottom);
                                        let $grid = $('#grid');
                                        let $channel_id = $grid.attr('data-channel-id');
                                        var $loading_more_content = false;
                                        // Very simplistic: if we've hit the bottom of the page, load more stuff.
                                        if( position == 0 ) {

                                            // A flag to prevent this from being called more than once per scroll event
                                            if($loading_more_content) return;
                                            $loading_more_content = true;

                                            // Find the DB ID of the last item in #grid
                                            let $last_id = $('#grid > div.item:last-child').attr('data-video-id');
                                            console.log($last_id);
                                            // Request the next bunch of items
                                            $.get('/_partials.youtube/youtube/' + $channel_id, {
                                                start_at_id: $last_id
                                            }, function (data) {
                                                // Load them in
                                                $grid.append(data);
                                                $loading_more_content = false;
                                            })

                                            // TODO: Handle last 'page' of items, so we don't keep calling for more items when there aren't any left
                                        }
                                    }
                                }
                            });
                        </script>
                        @if (Auth::check())
                    </div>
                    @else
                </div>
        </div>
    @endif
@stop