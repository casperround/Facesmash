
@extends('layouts.public', ["title" => "Home", "sidebar" => false])

@section("content")
    <div class="col-8" style="overflow-y:scroll;margin-top:60px;padding:10px;background:#efefef;height:100vh;">
        <style>


            .Post_Container {
                height:150px;
                width:90%;
                border-radius: 5px;
                margin:10px;
                padding:5px;
            }
            body ::-webkit-input-placeholder {
                /* WebKit browsers */
                font-family: 'Source Sans Pro', sans-serif;
                color: black;
                font-weight: 300;
            }
            body :-moz-placeholder {
                /* Mozilla Firefox 4 to 18 */
                font-family: 'Source Sans Pro', sans-serif;
                color: black;
                opacity: 1;
                font-weight: 300;
            }
            body ::-moz-placeholder {
                /* Mozilla Firefox 19+ */
                font-family: 'Source Sans Pro', sans-serif;
                color: black;
                opacity: 1;
                font-weight: 300;
            }
            body :-ms-input-placeholder {
                /* Internet Explorer 10+ */
                font-family: 'Source Sans Pro', sans-serif;
                color: black;
                font-weight: 300;
            }
            .purp-button {
                background-color: #5d3bae;
                color: white;
            }
            .purp-button:hover {
                background-color: #423385;
                color: white;
            }
        </style>
        <div class="Post_Container">
            <form enctype="multipart/form-data" action="{{ URL::route("home.createNewPost") }}" method="POST">
            <div class="row">
                <div class="col-8">
                    <textarea name="home_post" style="width:100%;height:50px;resize: none;border-radius: 5px;background:#efefef;border-color: #5d3bae;" placeholder="Write something about your day..."></textarea>
                    <div class="form-group">
                        <select class="form-control" name="visibility">
                            <option value="1" selected>Public</option>
                            <option value="2">Friends & Friends of friends</option>
                            <option value="3">Friends</option>
                            <option value="4">Only me</option>
                        </select>
                    </div>
                    <button type="submit" class="btn purp-button">Post</button>
                </div>
                <div class="col">
                    <input name="file_upload" class="form-control" type="file" onchange="readURL(this);" >
                    <img id="blah" src="#" style="margin: 20px;" alt="your image">
                    <script>
                        function readURL(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    $('#blah')
                                        .attr('src', e.target.result)
                                        .width(150)
                                        .display(block)
                                        .height(auto);
                                };
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>
                    {{ Form::token() }}
                </div>
            </div>
            </form>
        </div>
        <div class="col-md" style="overflow-y:none;margin-top:10px;padding:10px;background:#efefef;height:100vh;">
            <div class="row" style="overflow-y:scroll;margin-left:auto;margin-right:auto;width:100%;position: relative;" id="grid">
                {{--Assuming you're using grid as an ID in your CSS, so I'll add another id rather than overwRIteOk--}}
                @include('ajax_load.home.feed')
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
                                $.get('/_partials.home/feed', {
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
        </div>
@stop