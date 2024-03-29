    <div class="jumbotron jumbotron-fluid" style="height:20%;background-color: #efefef">
        <div class="container" style="height:40%;color:black;">
            <h1 class="display-3">Discover</h1>
            <p class="lead">Discover more content from people around the world!</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <form class="form-inline" style="width:100%" action="{{ URL::route("discover.search") }}" method="post">
                <input class="form-control" style="width:100%;" type="text" name="query" placeholder="Search hashtags" aria-label="Search">
            </form>
        </div>
        <div class="col-md-2">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-4">
            <a href="{{ URL::route("discover.photo") }}"><button class="btn btn-outline-info" style="width:100%;">Pictures<center><i style="color:#48CFAD" class="far fa-image"></i></center></button></a>
        </div>
        <div class="col-4">
            <a href="{{ URL::route("discover.video") }}"><button class="btn btn-outline-info" style="width:100%;">Videos<center><i style="color:#AC92EC" class="fas fa-video"></i></center></button></a>
        </div>
        <div class="col-4">
            <a href="{{ URL::route("discover.gif") }}"><button class="btn btn-outline-info" style="width:100%;">Gif's<center><i style="color:#48CFAD" class="far fa-image"></i></center></button></a>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-4">
            <a href="{{ URL::route("discover.page") }}"><button class="btn btn-outline-info" style="width:100%;">Pages<center><i style="color:#ED5565" class="far fa-file-alt"></i></center></button></a>
        </div>
        <div class="col-4">
            <a href="{{ URL::route("discover.group") }}"><button class="btn btn-outline-info" style="width:100%;">Groups<center><i style="color:#5D9CEC" class="fas fa-users"></i></center></button></a>
        </div>
        <div class="col-4">
            <a href="{{ URL::route("discover.channel") }}"><button class="btn btn-outline-info" style="width:100%;">Channels<center><i style="color:#A0D468" class="fas fa-tv"></i></center></button></a>
        </div>
    </div>
    <br>