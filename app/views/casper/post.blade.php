
@extends('layouts.casper.index', ["title" => "Home", "sidebar" => false])

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
        <form enctype="multipart/form-data" action="{{ URL::route("casper.post") }}" method="POST">
            <div class="row">
                <div class="col-8">
                    <textarea name="home_post" style="width:100%;height:50px;resize: none;border-radius: 5px;background:#efefef;border-color: #5d3bae;" placeholder="Write something about your day..."></textarea>
                    <div class="form-group">
                        <select class="form-control" name="relation">
                            <option value="casper" selected>blog</option>
                            <option value="work">work</option>
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