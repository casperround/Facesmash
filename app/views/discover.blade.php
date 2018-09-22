@extends('layouts.public', ["title" => "Discover", "sidebar" => false])

@section("content")
    @if (Auth::check())
        <div class="col-8" style="overflow-y:scroll;margin-top:60px;padding:10px;background:#efefef;height:100vh;">
            @else
            <div class="container-fluid">
            @endif
            <div class="col-md" style="overflow-y:none;margin-top:10px;padding:10px;background:#efefef;height:100vh;">
                @include("includes.discover-top")
                    <div class="row" style="overflow-y:scroll;margin-left:auto;margin-right:auto;width:100%;position: relative;" id="grid">
                        {{--Assuming you're using grid as an ID in your CSS, so I'll add another id rather than overwRIteOk--}}
                        @include('ajax_load.discover.discover_section')
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function() {

                            $(document).ready(function () {
                                let $grid = $('#grid');
                                var $loading_more_content = false;
                                $('div').bind('scroll', chk_scroll);
                            });

                            function chk_scroll(e) {
                                var elem = $(e.currentTarget);
                                if (elem[0].scrollHeight - elem.scrollTop() == elem.outerHeight()) {


                                    var position = $(window).scrollTop();
                                    var bottom = $(document).height() - $(window).height();
                                    let $grid = $('#grid');
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
                                        $.get('/_partials.discover/discover', {
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
            </div>

    @if (Auth::check())
        </div>
    @else

        </div>
    @endif
@stop