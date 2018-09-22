@extends('layouts.admin', ["title" => "Dashboard", "sidebar" => false])

@section("content")

    <div class="m-portlet  m-portlet--unair">
        <div class="m-portlet__body  m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl">
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                Total Users
                            </h4>
                            <br>
                            <span class="m-widget24__desc">
                                Total Site Users
                            </span>
                            <span class="m-widget24__stats m--font-success">
                                {{ $totalSiteUsers }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                Total Posts
                            </h4>
                            <br>
                            <span class="m-widget24__desc">
                                Total Site Posts
                            </span>
                            <span class="m-widget24__stats m--font-success">
                                {{ $totalSitePosts }}
                            </span>
                            <div class="m--space-40"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                Total Groups
                            </h4>
                            <br>
                            <span class="m-widget24__desc">
                                Total Site Groups
                            </span>
                            <span class="m-widget24__stats m--font-success">
                                {{ $totalSiteGroups }}
                            </span>
                            <div class="m--space-40"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                Total Channels
                            </h4>
                            <br>
                            <span class="m-widget24__desc">
                                Total Site Channels
                            </span>
                            <span class="m-widget24__stats m--font-success">
                                {{ $totalSiteChannels }}
                            </span>
                            <div class="m--space-40"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="m-portlet  m-portlet--unair">
        <div class="m-portlet__body  m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl">
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                Total Discovery
                            </h4>
                            <br>
                            <span class="m-widget24__desc">
                                Logged in Discover Views
                            </span>
                            <span class="m-widget24__stats m--font-success">
                                {{ $totalDiscoveryLoggedIn }}
                            </span>
                            <div class="m--space-40"></div>
                            <span class="m-widget24__desc">
                                Public Discovery Views
                            </span>
                            <span class="m-widget24__stats m--font-success">
                                {{ $totalDiscovery }}
                            </span>
                            <div class="m--space-40"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                Total Channel
                            </h4>
                            <br>
                            <span class="m-widget24__desc">
                                Logged in Channel Views
                            </span>
                            <span class="m-widget24__stats m--font-success">
                                {{ $totalChannelsLoggedIn }}
                            </span>
                            <div class="m--space-40"></div>
                            <span class="m-widget24__desc">
                                Public Channel Views
                            </span>
                            <span class="m-widget24__stats m--font-success">
                                {{ $totalChannels }}
                            </span>
                            <div class="m--space-40"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                Total Group
                            </h4>
                            <br>
                            <span class="m-widget24__desc">
                                Logged in Group Views
                            </span>
                            <span class="m-widget24__stats m--font-success">
                                {{ $totalGroupsLoggedIn }}
                            </span>
                            <div class="m--space-40"></div>
                            <span class="m-widget24__desc">
                                Public Group Views
                            </span>
                            <span class="m-widget24__stats m--font-success">
                                {{ $totalGroups }}
                            </span>
                            <div class="m--space-40"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                Total Page
                            </h4>
                            <br>
                            <span class="m-widget24__desc">
                                Logged in Page Views
                            </span>
                            <span class="m-widget24__stats m--font-success">
                                {{ $totalPagesLoggedIn }}
                            </span>
                            <div class="m--space-40"></div>
                            <span class="m-widget24__desc">
                                Public Page Views
                            </span>
                            <span class="m-widget24__stats m--font-success">
                                {{ $totalPages }}
                            </span>
                            <div class="m--space-40"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="m-portlet  m-portlet--unair">
        <div class="m-portlet__body  m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl">
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                Total Pictures
                            </h4>
                            <br>
                            <span class="m-widget24__desc">
                                Logged in Picture Views
                            </span>
                            <span class="m-widget24__stats m--font-success">
                                {{ $totalPhotosLoggedIn }}
                            </span>
                            <div class="m--space-40"></div>
                            <span class="m-widget24__desc">
                                Public Picture Views
                            </span>
                            <span class="m-widget24__stats m--font-success">
                                {{ $totalPhotos }}
                            </span>
                            <div class="m--space-40"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                Total Videos
                            </h4>
                            <br>
                            <span class="m-widget24__desc">
                                Logged in Video Views
                            </span>
                            <span class="m-widget24__stats m--font-success">
                                {{ $totalVideosLoggedIn }}
                            </span>
                            <div class="m--space-40"></div>
                            <span class="m-widget24__desc">
                                Public Video Views
                            </span>
                            <span class="m-widget24__stats m--font-success">
                                {{ $totalVideos }}
                            </span>
                            <div class="m--space-40"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                Total Gifs
                            </h4>
                            <br>
                            <span class="m-widget24__desc">
                                Logged in Gif Views
                            </span>
                            <span class="m-widget24__stats m--font-success">
                                {{ $totalGifsLoggedIn }}
                            </span>
                            <div class="m--space-40"></div>
                            <span class="m-widget24__desc">
                                Public Gif Views
                            </span>
                            <span class="m-widget24__stats m--font-success">
                                {{ $totalGifs }}
                            </span>
                            <div class="m--space-40"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-6">
            <div class="m-portlet m-portlet--full-height  m-portlet--unair">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Logged In Content Views
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div style="width:100%;">
                        <canvas id="Loggedcanvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="m-portlet m-portlet--full-height  m-portlet--unair">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Non Logged In Content Views
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div style="width:100%;">
                        <canvas id="nonLoggedcanvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <form action="{{ URL::route("admin.createNewChannel") }}" method="POST">
        <input class="form-control mr-sm-2" type="text" name="channel" placeholder="Index youtube channel" aria-label="Index youtube channel">
        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
    </form>

    <form action="{{ URL::route("admin.indexTumblrTags") }}" method="POST">
        <input class="form-control mr-sm-2" type="text" name="tag" placeholder="Index Tumblr Posts by tags" aria-label="Index Tumblr Posts by tags">
        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
    </form>



@stop

@section("js")
    <script>
        var configloggedIn = {
            type: 'line',
            data: {
                labels: ['7 Days Ago', '6 Days Ago', '5 Days Ago', '4 Days Ago', '3 Days Ago', 'Yesterday', 'Today'],
                datasets: [{
                    label: 'Main Views',
                    backgroundColor: "#c60000",
                    borderColor: "#c60000",
                    data: [
                        {{{ $mainDiscoveryLoggedIn['7dayVisitors'] }}},
                        {{{ $mainDiscoveryLoggedIn['6dayVisitors'] }}},
                        {{{ $mainDiscoveryLoggedIn['5dayVisitors'] }}},
                        {{{ $mainDiscoveryLoggedIn['4dayVisitors'] }}},
                        {{{ $mainDiscoveryLoggedIn['3dayVisitors'] }}},
                        {{{ $mainDiscoveryLoggedIn['yesterdayVisitors'] }}},
                        {{{ $mainDiscoveryLoggedIn['todayVisitors'] }}}
                    ],
                    fill: false,
                }, {
                    label: 'Channel Views',
                    backgroundColor: "#c6008a",
                    borderColor: "#c6008a",
                    data: [
                        {{{ $channelsLoggedIn['7dayVisitors'] }}},
                        {{{ $channelsLoggedIn['6dayVisitors'] }}},
                        {{{ $channelsLoggedIn['5dayVisitors'] }}},
                        {{{ $channelsLoggedIn['4dayVisitors'] }}},
                        {{{ $channelsLoggedIn['3dayVisitors'] }}},
                        {{{ $channelsLoggedIn['yesterdayVisitors'] }}},
                        {{{ $channelsLoggedIn['todayVisitors'] }}}
                    ],
                    fill: false,
                }, {
                    label: 'Gif Views',
                    backgroundColor: "#5800c6",
                    borderColor: "#5800c6",
                    data: [
                        {{{ $gifsLoggedIn['7dayVisitors'] }}},
                        {{{ $gifsLoggedIn['6dayVisitors'] }}},
                        {{{ $gifsLoggedIn['5dayVisitors'] }}},
                        {{{ $gifsLoggedIn['4dayVisitors'] }}},
                        {{{ $gifsLoggedIn['3dayVisitors'] }}},
                        {{{ $gifsLoggedIn['yesterdayVisitors'] }}},
                        {{{ $gifsLoggedIn['todayVisitors'] }}}
                    ],
                    fill: false,
                }, {
                    label: 'Group Views',
                    backgroundColor: "#00a7c6",
                    borderColor: "#00a7c6",
                    data: [
                        {{{ $groupsLoggedIn['7dayVisitors'] }}},
                        {{{ $groupsLoggedIn['6dayVisitors'] }}},
                        {{{ $groupsLoggedIn['5dayVisitors'] }}},
                        {{{ $groupsLoggedIn['4dayVisitors'] }}},
                        {{{ $groupsLoggedIn['3dayVisitors'] }}},
                        {{{ $groupsLoggedIn['yesterdayVisitors'] }}},
                        {{{ $groupsLoggedIn['todayVisitors'] }}}
                    ],
                    fill: false,
                }, {
                    label: 'Page Views',
                    backgroundColor: "#00c605",
                    borderColor: "#00c605",
                    data: [
                        {{{ $pagesLoggedIn['7dayVisitors'] }}},
                        {{{ $pagesLoggedIn['6dayVisitors'] }}},
                        {{{ $pagesLoggedIn['5dayVisitors'] }}},
                        {{{ $pagesLoggedIn['4dayVisitors'] }}},
                        {{{ $pagesLoggedIn['3dayVisitors'] }}},
                        {{{ $pagesLoggedIn['yesterdayVisitors'] }}},
                        {{{ $pagesLoggedIn['todayVisitors'] }}}
                    ],
                    fill: false,
                }, {
                    label: 'Photo Views',
                    backgroundColor: "#00c605",
                    borderColor: "#00c605",
                    data: [
                        {{{ $photosLoggedIn['7dayVisitors'] }}},
                        {{{ $photosLoggedIn['6dayVisitors'] }}},
                        {{{ $photosLoggedIn['5dayVisitors'] }}},
                        {{{ $photosLoggedIn['4dayVisitors'] }}},
                        {{{ $photosLoggedIn['3dayVisitors'] }}},
                        {{{ $photosLoggedIn['yesterdayVisitors'] }}},
                        {{{ $photosLoggedIn['todayVisitors'] }}}
                    ],
                    fill: false,
                }, {
                    label: 'Video Views',
                    backgroundColor: "#c6ba00",
                    borderColor: "#c6ba00",
                    data: [
                        {{{ $videosLoggedIn['7dayVisitors'] }}},
                        {{{ $videosLoggedIn['6dayVisitors'] }}},
                        {{{ $videosLoggedIn['5dayVisitors'] }}},
                        {{{ $videosLoggedIn['4dayVisitors'] }}},
                        {{{ $videosLoggedIn['3dayVisitors'] }}},
                        {{{ $videosLoggedIn['yesterdayVisitors'] }}},
                        {{{ $videosLoggedIn['todayVisitors'] }}}
                    ],
                    fill: false,
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Content Views (Logged in Users)'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
            }
        };

        var confignonloggedin = {
            type: 'line',
            data: {
                labels: ['7 Days Ago', '6 Days Ago', '5 Days Ago', '4 Days Ago', '3 Days Ago', 'Yesterday', 'Today'],
                datasets: [{
                    label: 'Main Views',
                    backgroundColor: "#c60000",
                    borderColor: "#c60000",
                    data: [
                        {{{ $mainDiscoverynonLoggedIn['7dayVisitors'] }}},
                        {{{ $mainDiscoverynonLoggedIn['6dayVisitors'] }}},
                        {{{ $mainDiscoverynonLoggedIn['5dayVisitors'] }}},
                        {{{ $mainDiscoverynonLoggedIn['4dayVisitors'] }}},
                        {{{ $mainDiscoverynonLoggedIn['3dayVisitors'] }}},
                        {{{ $mainDiscoverynonLoggedIn['yesterdayVisitors'] }}},
                        {{{ $mainDiscoverynonLoggedIn['todayVisitors'] }}}
                    ],
                    fill: false,
                }, {
                    label: 'Channel Views',
                    backgroundColor: "#c6008a",
                    borderColor: "#c6008a",
                    data: [
                        {{{ $channelsnonLoggedIn['7dayVisitors'] }}},
                        {{{ $channelsnonLoggedIn['6dayVisitors'] }}},
                        {{{ $channelsnonLoggedIn['5dayVisitors'] }}},
                        {{{ $channelsnonLoggedIn['4dayVisitors'] }}},
                        {{{ $channelsnonLoggedIn['3dayVisitors'] }}},
                        {{{ $channelsnonLoggedIn['yesterdayVisitors'] }}},
                        {{{ $channelsnonLoggedIn['todayVisitors'] }}}
                    ],
                    fill: false,
                }, {
                    label: 'Gif Views',
                    backgroundColor: "#5800c6",
                    borderColor: "#5800c6",
                    data: [
                        {{{ $gifsnonLoggedIn['7dayVisitors'] }}},
                        {{{ $gifsnonLoggedIn['6dayVisitors'] }}},
                        {{{ $gifsnonLoggedIn['5dayVisitors'] }}},
                        {{{ $gifsnonLoggedIn['4dayVisitors'] }}},
                        {{{ $gifsnonLoggedIn['3dayVisitors'] }}},
                        {{{ $gifsnonLoggedIn['yesterdayVisitors'] }}},
                        {{{ $gifsnonLoggedIn['todayVisitors'] }}}
                    ],
                    fill: false,
                }, {
                    label: 'Group Views',
                    backgroundColor: "#00a7c6",
                    borderColor: "#00a7c6",
                    data: [
                        {{{ $groupsnonLoggedIn['7dayVisitors'] }}},
                        {{{ $groupsnonLoggedIn['6dayVisitors'] }}},
                        {{{ $groupsnonLoggedIn['5dayVisitors'] }}},
                        {{{ $groupsnonLoggedIn['4dayVisitors'] }}},
                        {{{ $groupsnonLoggedIn['3dayVisitors'] }}},
                        {{{ $groupsnonLoggedIn['yesterdayVisitors'] }}},
                        {{{ $groupsnonLoggedIn['todayVisitors'] }}}
                    ],
                    fill: false,
                }, {
                    label: 'Page Views',
                    backgroundColor: "#00c605",
                    borderColor: "#00c605",
                    data: [
                        {{{ $pagesnonLoggedIn['7dayVisitors'] }}},
                        {{{ $pagesnonLoggedIn['6dayVisitors'] }}},
                        {{{ $pagesnonLoggedIn['5dayVisitors'] }}},
                        {{{ $pagesnonLoggedIn['4dayVisitors'] }}},
                        {{{ $pagesnonLoggedIn['3dayVisitors'] }}},
                        {{{ $pagesnonLoggedIn['yesterdayVisitors'] }}},
                        {{{ $pagesnonLoggedIn['todayVisitors'] }}}
                    ],
                    fill: false,
                }, {
                    label: 'Photo Views',
                    backgroundColor: "#00c605",
                    borderColor: "#00c605",
                    data: [
                        {{{ $photosnonLoggedIn['7dayVisitors'] }}},
                        {{{ $photosnonLoggedIn['6dayVisitors'] }}},
                        {{{ $photosnonLoggedIn['5dayVisitors'] }}},
                        {{{ $photosnonLoggedIn['4dayVisitors'] }}},
                        {{{ $photosnonLoggedIn['3dayVisitors'] }}},
                        {{{ $photosnonLoggedIn['yesterdayVisitors'] }}},
                        {{{ $photosnonLoggedIn['todayVisitors'] }}}
                    ],
                    fill: false,
                }, {
                    label: 'Video Views',
                    backgroundColor: "#c6ba00",
                    borderColor: "#c6ba00",
                    data: [
                        {{{ $videosnonLoggedIn['7dayVisitors'] }}},
                        {{{ $videosnonLoggedIn['6dayVisitors'] }}},
                        {{{ $videosnonLoggedIn['5dayVisitors'] }}},
                        {{{ $videosnonLoggedIn['4dayVisitors'] }}},
                        {{{ $videosnonLoggedIn['3dayVisitors'] }}},
                        {{{ $videosnonLoggedIn['yesterdayVisitors'] }}},
                        {{{ $videosnonLoggedIn['todayVisitors'] }}}
                    ],
                    fill: false,
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Content Views (Non Logged in Users)'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
            }
        };

        window.onload = function() {
            var ctxnon = document.getElementById('Loggedcanvas').getContext('2d');
            window.myLine = new Chart(ctxnon, configloggedIn);

            var ctx = document.getElementById('nonLoggedcanvas').getContext('2d');
            window.myLine = new Chart(ctx, confignonloggedin);
        };
    </script>
@stop