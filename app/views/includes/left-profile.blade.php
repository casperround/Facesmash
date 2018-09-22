<div class="col-2" style="margin-top:60px;padding-right:0px;background:#5d3bae;">
    <div class="Profile_Header" style="background:url({{ URL::to(Auth::user()->banner_img_path) }});background-size: cover;">
        <div class="P_Head">
            <center>
                <img style="margin-left: 5px" class="Profile_Img" src="{{ URL::to(Auth::user()->profile_img_path) }}">
                <br>
                <h4>{{{ Auth::user()->username }}}</h4>
            </center>
        </div>
    </div>
    <a href="{{ URL::route("userProfile", [Auth::user()->username]) }}">
        <div class="Tabets">
            <center><span>My Profile</span></center>
        </div>
    </a>
    <a href="{{ URL::route("home") }}">
        <div class="Tabets">
            <center><span>Home</span></center>
        </div>
    </a>
    <a href="{{ URL::route("pictures.userpicture") }}">
        <div class="Tabets">
            <center><span>Pictures</span></center>
        </div>
    </a>
    <a href="{{ URL::route("videos.uservideo") }}">
        <div class="Tabets">
            <center><span>Videos</span></center>
        </div>
    </a>
    <a href="{{ URL::route("pages.userpage") }}">
        <div class="Tabets">
            <center><span>My Pages</span></center>
        </div>
    </a>
    <a href="{{ URL::route("groups.usergroup") }}">
        <div class="Tabets">
            <center><span>My Groups</span></center>
        </div>
    </a>
    <a href="{{ URL::route("events.userevent") }}">
        <div class="Tabets">
            <center><span>My Events</span></center>
        </div>
    </a>
    <a href="{{ URL::route("channels.userchannel") }}">
        <div class="Tabets">
            <center><span>My Channels</span></center>
        </div>
    </a>
</div>