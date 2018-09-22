@extends('layouts.public', ["title" => "Discover", "sidebar" => false])

@section("content")
    @if (Auth::check())
        <div class="col-8" style="overflow-y:scroll;margin-top:60px;padding:10px;background:#efefef;height:100vh;">
            @else
                <div class="container-fluid">
                    @endif
                    <div class="col-md" style="overflow-y:scroll;margin-top:10px;padding:10px;background:#efefef;height:100vh;">
                        @foreach(User::where("username", "like", "%" . $users . "%")->get() as $user)
                            <div class="col-md">
                                <aside class="profile-card">
                                    <header style="">
                                        <a href="{{ URL::route("userProfile", $user->username) }}"><div class="user-profile" style="background: url('{{ URL::to($user->banner_img_path) }}');height:250px;-moz-background-size:100% 100%;
                                            -webkit-background-size:100% 100%;
                                            background-size:100% 100%;padding:50px;width:100%;">
                                            <img style="position:relative;margin:10px;" src="{{ URL::to($user->profile_img_path) }}">
                                            <div class="username" style="background: #efefef;
    padding: 5px;">{{{ $user->username }}}<br/><span style="font-size:10px;color:inherit">{{{ $user->about }}}</span></div><br/>
                                            <ul class="data" style="padding:10px;">
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
                                        </div></a>


                                    </header>
                                </aside>
                                </div>
                        @endforeach
                    </div>
                    @if (Auth::check())
                 </div>
            @else
        </div>
    @endif
@stop