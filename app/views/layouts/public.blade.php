<!DOCTYPE html>
<html>
<head>
    <title>{{{ (empty($title) ? "" : $title . " | ") }}}Facesmash</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://facesmash.co.uk/assets/css/style.css">

    @include("includes.sitewidemeta")

    @yield("in-head")
</head>

<body>
<div class="Navbar">
    <nav class="navbar navbar-expand-lg" style="height:60px">
        <a class="navbar-brand" href="#">
            <img src="{{ URL::to("assets/img/logo_small.png") }}" width="30" height="30" class="d-inline-block align-top" alt="">
            Facesmash
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ URL::route("home") }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL::route("discover") }}">Discover</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::route("userProfile", [Auth::user()->username]) }}">My Profile</a>
                    </li>
                @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::route("contact") }}">Contact</a>
                    </li>
                @if (Auth::check() && Auth::user()->role == "admin")
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::route("admin.index") }}">Admin</a>
                    </li>
                @endif
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::route("auth.logout") }}">Logout</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::route("index") }}">Login</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL::route("faq") }}">FAQ</a>
                </li>
            </ul>
            <form class="form-inline" action="{{ URL::route("search") }}" method="post">
                <input class="form-control mr-sm-2" type="text" name="query" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</div>

@yield("onpagecss")

<style>
    .Profile_Header {
        height:100px;
        width:100%;
        background: url({{ URL::to("assets/img/cover.jpg") }}) no-repeat center;

        background-size: cover;
    }
    .Tabets {
        height:40px;
        width:100%;
        transition: background 0.2s;
    }
    .Tabets:hover {
        background: #656D78;
        transition: background 0.2s;
    }
    .P_Head {
        height:50%;
        padding:10px;
        position: relative;

    }
    .Profile_Img {
        border-radius: 50px;
        height:50px;
        width:50px;
        margin-left: auto;
        margin-right:auto;
    }
</style>


<div class="row">
    @if (Auth::check())
        @include("includes.left-profile")
    @endif

    @yield("content")
        @if (Auth::check())
            <div class="col-2 Back" style="margin-top:60px;padding-top:10px;overflow-y:scroll;height:100vh;padding:0px;box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.75);">
                @include("includes.chat-container")
            </div>
        @endif
</div>





<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>