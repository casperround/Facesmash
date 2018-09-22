@extends('layouts.public', ["title" => $user->username, "sidebar" => false])

@section("onpagecss")
<style class="cp-pen-styles">

</style>
@stop

@section("content")
    @if (Auth::check())
        <div class="col-8" style="overflow-y:scroll;margin-top:60px;padding:10px;background:#efefef;height:100vh;">
            @else
                <div class="col-12" style="margin-top:60px;padding:10px;background:#efefef;height:100vh;">

                    <div class="container-fluid">
                        @endif
                        <div class="col-md" style="overflow-y:scroll;margin-top:10px;padding:10px;background:#efefef;height:100vh;">
                            <aside class="profile-card">
                                <header style="background: url('{{ URL::to($user->banner_img_path) }}');height:250px;-moz-background-size:100% 100%;
                                        -webkit-background-size:100% 100%;
                                        background-size:100% 100%;">
                                    <div class="user-profile">
                                        <img style="position:relative;margin:0px;" src="{{ URL::to($user->profile_img_path) }}">
                                        <div class="username">{{{ $user->username }}}</div>
                                        <div class="bio">
                                        </div>
                                        <div class="description">
                                        </div>
                                        <ul class="data">
                                            @if (Auth::check())
                                                @if(Auth::user()->id == $user->id)
                                                <a href="{{ URL::route("account.myProfile") }}"><i class="fas fa-edit"></i>

                                                </a>
                                                @endif
                                                @if(Auth::user()->id == $user->id)
                                                @else
                                                        @forelse(Friends::where("recipient", "=", $user->id)->where("sender", "=", (Auth::user()->id))->get() as $friend)
                                                            @if($friend->status == 2)
                                                                <a href="{{ URL::route("userProfileRemoveFriend", $user->username) }}"><i class="fas fa-user-minus"></i>

                                                                </a>
                                                            @endif
                                                        @empty
                                                            <a href="{{ URL::route("userProfileAddFriend", $user->username) }}"><i class="fas fa-user-plus"></i>

                                                            </a>
                                                        @endforelse
                                                @endif
                                            @endif

                                        </ul>
                                        <a href="{{ route('social-connect', array('facebook')) }}">
                                            Connect Your facebook Account
                                        </a>
                                    </div>


                                </header>
                                <ul class="profile-social-links" style="margin-bottom:0px;">
                                    <div class="social-btns">
                                            @if ($user->facebook != "")
                                        <a class="btn facebook" href="{{{ $user->facebook }}}"><i  class="fab fa-facebook-f"></i></a>
                                            @endif
                                            @if ($user->twitter != "")
                                        <a  class="btn twitter" href="{{{ $user->twitter }}}"><i class="fab fa-twitter"></i></a>
                                            @endif
                                             @if ($user->tumblr != "")
                                        <a class="btn facebook" href="{{{ $user->tumblr }}}"><i class="fab fa-tumblr"></i></a>
                                            @endif
                                            @if ($user->youtube != "")
                                        <a class="btn google" href="{{{ $user->youtube }}}"><i class="fab fa-youtube"></i></a>
                                                @endif

                                    </div>
                                </ul>
                                <br>
                            </aside>
                            <style>
                                .Post_Container {
                                    height:auto;
                                    width:90%;
                                    border-radius: 5px;
                                    margin:10px;
                                    padding:10px;
                                    background:#E6E9ED;
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
                        @if (Auth::check())
                        <div class="Post_Container">
                            <form enctype="multipart/form-data" action="{{ URL::route("home.createNewPost") }}" method="POST">
                                <div class="row">
                                    <div class="col-8">
                                        <textarea name="home_post" style="border:0px;width:100%;height:50px;resize: none;border-radius: 5px;background:#efefef;border-color: #5d3bae;" placeholder="Write something about your day..."></textarea>
                                        <div class="form-group">
                                            <select class="form-control" name="visibility">
                                                <option value="1">Public</option>
                                                <option value="2">Friends & Friends of friends</option>
                                                <option value="3">Friends</option>
                                                <option value="4" selected>Only me</option>
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
                        @endif

                        @foreach(Posts::where("author_id", "=", $user->id)->where("relation", "=", "feed")->orderBy('post_time', 'DESC')->orderBy('post_date', 'DESC')->get() as $post)
                            @if ($post->media_type == 'text')
                                <div style="box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.75);color:black;border-radius: 5px;margin-top:20px;">
                                    <div class="row" style="width:100%;margin:0px;position: relative;">
                                        <div class="col-1">
                                            <img class="img" style="height:40px;width:40px;border-radius: 50px;" src="{{ URL::to($user->profile_img_path) }}"/>
                                        </div>
                                        <div class="col-2">
                                            <span>{{{ User::where("id", "=", $post->author_id)->pluck("username") }}}</span>
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
                            @if ($post->media_type == 'jpg' OR $post->media_type == 'png' OR $post->media_type == 'PNG' OR $post->media_type == 'JPG')
                                <div style="box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.75);color:black;border-radius: 5px;margin-top:20px;">
                                    <div class="row" style="width:100%;margin:0px;position: relative;">
                                        <div class="col-1">
                                            <img  class="img" style="height:40px;width:40px;border-radius: 50px;" src="{{ URL::to($user->profile_img_path) }}"/>
                                        </div>
                                        <div class="col-2">
                                            <span>{{{ User::where("id", "=", $post->author_id)->pluck("username") }}}</span>
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
                                            <img style="width: 100%;height: auto;padding: 10px;" src="{{ URL::to($post->file_path) }}">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
    </div>
@stop