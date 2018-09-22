@extends('layouts.public', ["title" => Auth::user()->username, "sidebar" => false])

@section("onpagecss")
    <style class="cp-pen-styles">

    </style>
@stop

@section("content")
    <div class="col-8" style="overflow-y:scroll;margin-top:60px;padding:10px;background:#efefef;height:100vh;color:black;">
        <aside class="profile-card">
            <header style="background: url('{{ URL::to(Auth::user()->banner_img_path) }}');height:250px;-moz-background-size:100% 100%;
                    -webkit-background-size:100% 100%;
                    background-size:100% 100%;">
                <div class="user-profile">
                    <img style="position:relative;margin:0px;" src="{{ URL::to(Auth::user()->profile_img_path) }}">
                    <div class="username">{{{ Auth::user()->username }}}</div>
                    <div class="bio">
                    </div>
                    <div class="description">
                    </div>
                    <ul class="data">
                        @if (Auth::check())
                            @forelse(Friends::where("recipient", "=", Auth::user()->id)->where("sender", "=", (Auth::user()->id))->get() as $friend)
                                @if($friend->status == 2)
                                    <a href="{{ URL::route("userProfileRemoveFriend", Auth::user()->username) }}"><button type="button" class="btn btn-primary" data-toggle="modal">
                                            Remove friend request?
                                        </button</a>
                                @endif
                            @empty
                                <a href="{{ URL::route("userProfileAddFriend", Auth::user()->username) }}"><button type="button" class="btn btn-primary" data-toggle="modal">
                                        Send friend request?
                                    </button</a>
                            @endforelse


                        @endif

                    </ul>
                    {{--<a href="{{ route('social-connect', array('facebook')) }}">--}}
                    {{--Connect Your facebook Account--}}
                    {{--</a>--}}
                </div>


            </header>
            <ul class="profile-social-links">
                <div class="social-btns">
                    @if (Auth::user()->facebook != "")
                        <a class="btn facebook" href="{{{ Auth::user()->facebook }}}"><i  class="fab fa-facebook-f"></i></a>
                    @endif
                    @if (Auth::user()->twitter != "")
                        <a  class="btn twitter" href="{{{ Auth::user()->twitter }}}"><i class="fab fa-twitter"></i></a>
                    @endif
                    @if (Auth::user()->tumblr != "")
                        <a class="btn facebook" href="{{{ Auth::user()->tumblr }}}"><i class="fab fa-tumblr"></i></a>
                    @endif
                    @if (Auth::user()->youtube != "")
                        <a class="btn google" href="{{{ Auth::user()->youtube }}}"><i class="fab fa-youtube"></i></a>
                    @endif

                </div>
            </ul>
            <br>
        </aside>
        <form style="margin-bottom:150px;" action="{{{ URL::route('account.myProfile.doEdit') }}}" method="post">
            <label>Account details</label>
            <div class="form-group" style="margin:20px;">
                <label>About me</label>
                <textarea class="form-control" name="about" value="{{{ Auth::user()->about }}}"></textarea>

                <label>Firstname</label>
                <input class="form-control" name="first_name" value="{{{ Auth::user()->first_name }}}">

                <label>Lastname</label>
                <input class="form-control" name="last_name" value="{{{ Auth::user()->last_name }}}">

                <label>Gender</label>
                <input class="form-control" name="gender" value="{{{ Auth::user()->gender }}}">

                <label>Youtube</label>
                <input class="form-control" name="youtube" value="{{{ Auth::user()->youtube }}}">

                <label>Tumblr</label>
                <input class="form-control" name="tumblr" value="{{{ Auth::user()->tumblr }}}">

                <label>Twitter</label>
                <input class="form-control" name="twitter" value="{{{ Auth::user()->twitter }}}">

                <label>Facebook</label>
                <input class="form-control" name="facebook" value="{{{ Auth::user()->facebook }}}">

                <label>Website URL</label>
                <input class="form-control" name="website" value="{{{ Auth::user()->website }}}">
                <button type="submit" class="btn purp-button">Update Profile</button>
            </div>
            {{ Form::token() }}
        </form>
        <form enctype="multipart/form-data" style="margin-bottom:50px;" action="{{{ URL::route('account.myProfile.cover.doCover') }}}" method="post">
            <label>Cover Photo</label>
            <div class="form-group" style="margin:20px;">
                <input name="file_upload_banner" class="form-control" type="file" onchange="readURL(this);" >
                <img id="cover" src="#" style="box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.75);margin: 20px;" alt="your image">
                <script>
                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function (e) {
                                $('#cover')
                                    .attr('src', e.target.result)
                                    .width(150)
                                    .height(auto);
                            };
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                </script>
                <button type="submit" class="btn purp-button">Update Profile</button>
            </div>
            {{ Form::token() }}
        </form>
        <form enctype="multipart/form-data" style="margin-bottom:50px;" action="{{{ URL::route('account.myProfile.profile.doProfile') }}}" method="post">
            <label>Profile Photo</label>
            <div class="form-group" style="margin:20px;">
                <input name="file_upload_profile" class="form-control" type="file" onchange="readURLL(this);" >
                <img id="profile" src="#" style="box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.75);margin: 20px;" alt="your image">
                <script>
                    function readURLL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function (e) {
                                $('#profile')
                                    .attr('src', e.target.result)
                                    .width(150)
                                    .height(auto);
                            };
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                </script>
                <button type="submit" class="btn purp-button">Update Profile</button>
            </div>
            {{ Form::token() }}
        </form>
    </div>

@stop