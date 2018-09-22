<?php
/**
 * Created by PhpStorm.
 * User: roddy
 * Date: 05/06/2018
 * Time: 22:17
 */

class AdminController extends BaseController
{

    public function index() {

        $mainDiscoveryLoggedIn = [
            "todayVisitors" => UserContentViews::whereDate("date", "=", date("Y-m-d"))->where("content_type", "=", "discover")->where("authed_user", "=", 1)->count(),
            "yesterdayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-1 days")))->where("content_type", "=", "discover")->where("authed_user", "=", 1)->count(),
            "3dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-2 days")))->where("content_type", "=", "discover")->where("authed_user", "=", 1)->count(),
            "4dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-3 days")))->where("content_type", "=", "discover")->where("authed_user", "=", 1)->count(),
            "5dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-4 days")))->where("content_type", "=", "discover")->where("authed_user", "=", 1)->count(),
            "6dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-5 days")))->where("content_type", "=", "discover")->where("authed_user", "=", 1)->count(),
            "7dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-6 days")))->where("content_type", "=", "discover")->where("authed_user", "=", 1)->count(),
        ];
        $channelsLoggedIn = [
            "todayVisitors" => UserContentViews::whereDate("date", "=", date("Y-m-d"))->where("content_type", "=", "channels")->where("authed_user", "=", 1)->count(),
            "yesterdayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-1 days")))->where("content_type", "=", "channels")->where("authed_user", "=", 1)->count(),
            "3dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-2 days")))->where("content_type", "=", "channels")->where("authed_user", "=", 1)->count(),
            "4dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-3 days")))->where("content_type", "=", "channels")->where("authed_user", "=", 1)->count(),
            "5dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-4 days")))->where("content_type", "=", "channels")->where("authed_user", "=", 1)->count(),
            "6dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-5 days")))->where("content_type", "=", "channels")->where("authed_user", "=", 1)->count(),
            "7dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-6 days")))->where("content_type", "=", "channels")->where("authed_user", "=", 1)->count(),
        ];
        $gifsLoggedIn = [
            "todayVisitors" => UserContentViews::whereDate("date", "=", date("Y-m-d"))->where("content_type", "=", "gifs")->where("authed_user", "=", 1)->count(),
            "yesterdayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-1 days")))->where("content_type", "=", "gifs")->where("authed_user", "=", 1)->count(),
            "3dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-2 days")))->where("content_type", "=", "gifs")->where("authed_user", "=", 1)->count(),
            "4dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-3 days")))->where("content_type", "=", "gifs")->where("authed_user", "=", 1)->count(),
            "5dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-4 days")))->where("content_type", "=", "gifs")->where("authed_user", "=", 1)->count(),
            "6dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-5 days")))->where("content_type", "=", "gifs")->where("authed_user", "=", 1)->count(),
            "7dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-6 days")))->where("content_type", "=", "gifs")->where("authed_user", "=", 1)->count(),
        ];
        $groupsLoggedIn = [
            "todayVisitors" => UserContentViews::whereDate("date", "=", date("Y-m-d"))->where("content_type", "=", "groups")->where("authed_user", "=", 1)->count(),
            "yesterdayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-1 days")))->where("content_type", "=", "groups")->where("authed_user", "=", 1)->count(),
            "3dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-2 days")))->where("content_type", "=", "groups")->where("authed_user", "=", 1)->count(),
            "4dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-3 days")))->where("content_type", "=", "groups")->where("authed_user", "=", 1)->count(),
            "5dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-4 days")))->where("content_type", "=", "groups")->where("authed_user", "=", 1)->count(),
            "6dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-5 days")))->where("content_type", "=", "groups")->where("authed_user", "=", 1)->count(),
            "7dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-6 days")))->where("content_type", "=", "groups")->where("authed_user", "=", 1)->count(),
        ];
        $pagesLoggedIn = [
            "todayVisitors" => UserContentViews::whereDate("date", "=", date("Y-m-d"))->where("content_type", "=", "pages")->where("authed_user", "=", 1)->count(),
            "yesterdayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-1 days")))->where("content_type", "=", "pages")->where("authed_user", "=", 1)->count(),
            "3dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-2 days")))->where("content_type", "=", "pages")->where("authed_user", "=", 1)->count(),
            "4dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-3 days")))->where("content_type", "=", "pages")->where("authed_user", "=", 1)->count(),
            "5dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-4 days")))->where("content_type", "=", "pages")->where("authed_user", "=", 1)->count(),
            "6dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-5 days")))->where("content_type", "=", "pages")->where("authed_user", "=", 1)->count(),
            "7dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-6 days")))->where("content_type", "=", "pages")->where("authed_user", "=", 1)->count(),
        ];
        $photosLoggedIn = [
            "todayVisitors" => UserContentViews::whereDate("date", "=", date("Y-m-d"))->where("content_type", "=", "photos")->where("authed_user", "=", 1)->count(),
            "yesterdayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-1 days")))->where("content_type", "=", "photos")->where("authed_user", "=", 1)->count(),
            "3dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-2 days")))->where("content_type", "=", "photos")->where("authed_user", "=", 1)->count(),
            "4dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-3 days")))->where("content_type", "=", "photos")->where("authed_user", "=", 1)->count(),
            "5dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-4 days")))->where("content_type", "=", "photos")->where("authed_user", "=", 1)->count(),
            "6dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-5 days")))->where("content_type", "=", "photos")->where("authed_user", "=", 1)->count(),
            "7dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-6 days")))->where("content_type", "=", "photos")->where("authed_user", "=", 1)->count(),
        ];
        $videosLoggedIn = [
            "todayVisitors" => UserContentViews::whereDate("date", "=", date("Y-m-d"))->where("content_type", "=", "videos")->where("authed_user", "=", 1)->count(),
            "yesterdayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-1 days")))->where("content_type", "=", "videos")->where("authed_user", "=", 1)->count(),
            "3dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-2 days")))->where("content_type", "=", "videos")->where("authed_user", "=", 1)->count(),
            "4dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-3 days")))->where("content_type", "=", "videos")->where("authed_user", "=", 1)->count(),
            "5dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-4 days")))->where("content_type", "=", "videos")->where("authed_user", "=", 1)->count(),
            "6dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-5 days")))->where("content_type", "=", "videos")->where("authed_user", "=", 1)->count(),
            "7dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-6 days")))->where("content_type", "=", "videos")->where("authed_user", "=", 1)->count(),
        ];

        $mainDiscoverynonLoggedIn = [
            "todayVisitors" => UserContentViews::whereDate("date", "=", date("Y-m-d"))->where("content_type", "=", "discover")->where("authed_user", "=", 0)->count(),
            "yesterdayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-1 days")))->where("content_type", "=", "discover")->where("authed_user", "=", 0)->count(),
            "3dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-2 days")))->where("content_type", "=", "discover")->where("authed_user", "=", 0)->count(),
            "4dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-3 days")))->where("content_type", "=", "discover")->where("authed_user", "=", 0)->count(),
            "5dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-4 days")))->where("content_type", "=", "discover")->where("authed_user", "=", 0)->count(),
            "6dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-5 days")))->where("content_type", "=", "discover")->where("authed_user", "=", 0)->count(),
            "7dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-6 days")))->where("content_type", "=", "discover")->where("authed_user", "=", 0)->count(),
        ];
        $channelsnonLoggedIn = [
            "todayVisitors" => UserContentViews::whereDate("date", "=", date("Y-m-d"))->where("content_type", "=", "channels")->where("authed_user", "=", 0)->count(),
            "yesterdayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-1 days")))->where("content_type", "=", "channels")->where("authed_user", "=", 0)->count(),
            "3dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-2 days")))->where("content_type", "=", "channels")->where("authed_user", "=", 0)->count(),
            "4dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-3 days")))->where("content_type", "=", "channels")->where("authed_user", "=", 0)->count(),
            "5dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-4 days")))->where("content_type", "=", "channels")->where("authed_user", "=", 0)->count(),
            "6dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-5 days")))->where("content_type", "=", "channels")->where("authed_user", "=", 0)->count(),
            "7dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-6 days")))->where("content_type", "=", "channels")->where("authed_user", "=", 0)->count(),
        ];
        $gifsnonLoggedIn = [
            "todayVisitors" => UserContentViews::whereDate("date", "=", date("Y-m-d"))->where("content_type", "=", "gifs")->where("authed_user", "=", 0)->count(),
            "yesterdayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-1 days")))->where("content_type", "=", "gifs")->where("authed_user", "=", 0)->count(),
            "3dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-2 days")))->where("content_type", "=", "gifs")->where("authed_user", "=", 0)->count(),
            "4dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-3 days")))->where("content_type", "=", "gifs")->where("authed_user", "=", 0)->count(),
            "5dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-4 days")))->where("content_type", "=", "gifs")->where("authed_user", "=", 0)->count(),
            "6dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-5 days")))->where("content_type", "=", "gifs")->where("authed_user", "=", 0)->count(),
            "7dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-6 days")))->where("content_type", "=", "gifs")->where("authed_user", "=", 0)->count(),
        ];
        $groupsnonLoggedIn = [
            "todayVisitors" => UserContentViews::whereDate("date", "=", date("Y-m-d"))->where("content_type", "=", "groups")->where("authed_user", "=", 0)->count(),
            "yesterdayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-1 days")))->where("content_type", "=", "groups")->where("authed_user", "=", 0)->count(),
            "3dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-2 days")))->where("content_type", "=", "groups")->where("authed_user", "=", 0)->count(),
            "4dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-3 days")))->where("content_type", "=", "groups")->where("authed_user", "=", 0)->count(),
            "5dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-4 days")))->where("content_type", "=", "groups")->where("authed_user", "=", 0)->count(),
            "6dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-5 days")))->where("content_type", "=", "groups")->where("authed_user", "=", 0)->count(),
            "7dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-6 days")))->where("content_type", "=", "groups")->where("authed_user", "=", 0)->count(),
        ];
        $pagesnonLoggedIn = [
            "todayVisitors" => UserContentViews::whereDate("date", "=", date("Y-m-d"))->where("content_type", "=", "pages")->where("authed_user", "=", 0)->count(),
            "yesterdayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-1 days")))->where("content_type", "=", "pages")->where("authed_user", "=", 0)->count(),
            "3dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-2 days")))->where("content_type", "=", "pages")->where("authed_user", "=", 0)->count(),
            "4dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-3 days")))->where("content_type", "=", "pages")->where("authed_user", "=", 0)->count(),
            "5dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-4 days")))->where("content_type", "=", "pages")->where("authed_user", "=", 0)->count(),
            "6dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-5 days")))->where("content_type", "=", "pages")->where("authed_user", "=", 0)->count(),
            "7dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-6 days")))->where("content_type", "=", "pages")->where("authed_user", "=", 0)->count(),
        ];
        $photosnonLoggedIn = [
            "todayVisitors" => UserContentViews::whereDate("date", "=", date("Y-m-d"))->where("content_type", "=", "photos")->where("authed_user", "=", 0)->count(),
            "yesterdayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-1 days")))->where("content_type", "=", "photos")->where("authed_user", "=", 0)->count(),
            "3dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-2 days")))->where("content_type", "=", "photos")->where("authed_user", "=", 0)->count(),
            "4dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-3 days")))->where("content_type", "=", "photos")->where("authed_user", "=", 0)->count(),
            "5dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-4 days")))->where("content_type", "=", "photos")->where("authed_user", "=", 0)->count(),
            "6dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-5 days")))->where("content_type", "=", "photos")->where("authed_user", "=", 0)->count(),
            "7dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-6 days")))->where("content_type", "=", "photos")->where("authed_user", "=", 0)->count(),
        ];
        $videosnonLoggedIn = [
            "todayVisitors" => UserContentViews::whereDate("date", "=", date("Y-m-d"))->where("content_type", "=", "videos")->where("authed_user", "=", 0)->count(),
            "yesterdayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-1 days")))->where("content_type", "=", "videos")->where("authed_user", "=", 0)->count(),
            "3dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-2 days")))->where("content_type", "=", "videos")->where("authed_user", "=", 0)->count(),
            "4dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-3 days")))->where("content_type", "=", "videos")->where("authed_user", "=", 0)->count(),
            "5dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-4 days")))->where("content_type", "=", "videos")->where("authed_user", "=", 0)->count(),
            "6dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-5 days")))->where("content_type", "=", "videos")->where("authed_user", "=", 0)->count(),
            "7dayVisitors" => UserContentViews::whereDate("date", "=", date('Y-m-d',strtotime("-6 days")))->where("content_type", "=", "videos")->where("authed_user", "=", 0)->count(),
        ];
        $totalDiscoveryLoggedIn = UserContentViews::where("content_type", "=", "discover")->where("authed_user", "=", 1)->count();
        $totalChannelsLoggedIn = UserContentViews::where("content_type", "=", "channels")->where("authed_user", "=", 1)->count();
        $totalGifsLoggedIn = UserContentViews::where("content_type", "=", "gifs")->where("authed_user", "=", 1)->count();
        $totalGroupsLoggedIn = UserContentViews::where("content_type", "=", "groups")->where("authed_user", "=", 1)->count();
        $totalPagesLoggedIn =  UserContentViews::where("content_type", "=", "pages")->where("authed_user", "=", 1)->count();
        $totalPhotosLoggedIn = UserContentViews::where("content_type", "=", "photos")->where("authed_user", "=", 1)->count();
        $totalVideosLoggedIn = UserContentViews::where("content_type", "=", "videos")->where("authed_user", "=", 1)->count();

        $totalDiscovery = UserContentViews::where("content_type", "=", "discover")->where("authed_user", "=", 0)->count();
        $totalChannels = UserContentViews::where("content_type", "=", "channels")->where("authed_user", "=", 0)->count();
        $totalGifs = UserContentViews::where("content_type", "=", "gifs")->where("authed_user", "=", 0)->count();
        $totalGroups = UserContentViews::where("content_type", "=", "groups")->where("authed_user", "=", 0)->count();
        $totalPages =  UserContentViews::where("content_type", "=", "pages")->where("authed_user", "=", 0)->count();
        $totalPhotos = UserContentViews::where("content_type", "=", "photos")->where("authed_user", "=", 0)->count();
        $totalVideos = UserContentViews::where("content_type", "=", "videos")->where("authed_user", "=", 0)->count();


        $totalSiteUsers = User::all()->count();
        $totalSitePosts = Posts::all()->count();
        $totalSiteGroups = Groups::all()->count();
        $totalSiteChannels = Channels::all()->count();


        return View::make("admin.index", [
            "totalSiteUsers" => $totalSiteUsers,
            "totalSitePosts" => $totalSitePosts,
            "totalSiteGroups" => $totalSiteGroups,
            "totalSiteChannels" => $totalSiteChannels,

            "totalDiscoveryLoggedIn" => $totalDiscoveryLoggedIn,
            "totalChannelsLoggedIn" => $totalChannelsLoggedIn,
            "totalGifsLoggedIn" => $totalGifsLoggedIn,
            "totalGroupsLoggedIn" => $totalGroupsLoggedIn,
            "totalPagesLoggedIn" => $totalPagesLoggedIn,
            "totalPhotosLoggedIn" => $totalPhotosLoggedIn,
            "totalVideosLoggedIn" => $totalVideosLoggedIn,

            "totalDiscovery" => $totalDiscovery,
            "totalChannels" => $totalChannels,
            "totalGifs" => $totalGifs,
            "totalGroups" => $totalGroups,
            "totalPages" => $totalPages,
            "totalPhotos" => $totalPhotos,
            "totalVideos" => $totalVideos,

            "mainDiscoveryLoggedIn" => $mainDiscoveryLoggedIn,
            "channelsLoggedIn" => $channelsLoggedIn,
            "gifsLoggedIn" => $gifsLoggedIn,
            "groupsLoggedIn" => $groupsLoggedIn,
            "pagesLoggedIn" => $pagesLoggedIn,
            "photosLoggedIn" => $photosLoggedIn,
            "videosLoggedIn" => $videosLoggedIn,

            "mainDiscoverynonLoggedIn" => $mainDiscoverynonLoggedIn,
            "channelsnonLoggedIn" => $channelsnonLoggedIn,
            "gifsnonLoggedIn" => $gifsnonLoggedIn,
            "groupsnonLoggedIn" => $groupsnonLoggedIn,
            "pagesnonLoggedIn" => $pagesnonLoggedIn,
            "photosnonLoggedIn" => $photosnonLoggedIn,
            "videosnonLoggedIn" => $videosnonLoggedIn,

        ]);
    }

    public function users() {

        $users = User::orderBy("id", "DESC")->limit(100)->get();

        return View::make("admin.users.users", [
            "users" => $users
        ]);

    }

    public function pageview($id) {

        $page = Pages::where("id","=",$id)->limit(1)->get();

        return View::make("admin.flags.page", [
            "page" => $page
        ]);

    }
    public function groupview($id) {

        $group = Groups::where("id","=",$id)->limit(1)->get();

        return View::make("admin.flags.group", [
            "group" => $group
        ]);

    }
    public function channelview($id) {

        $channel = Channels::where("id","=",$id)->limit(1)->get();

        return View::make("admin.flags.channel", [
            "channel" => $channel
        ]);

    }
    public function postview($id) {

        $post = Posts::where("id","=",$id)->limit(1)->get();

        return View::make("admin.flags.post", [
            "post" => $post
        ]);

    }


    public function pages() {

        $pages = Pages::orderBy("id", "DESC")->limit(100)->get();

        return View::make("admin.pages.pages", [
            "pages" => $pages
        ]);

    }

    public function page($id) {

        $pages = Pages::where("id","=",$id)->get();

        return View::make("admin.pages.page", [
            "pages" => $pages
        ]);

    }
    public function groups() {

        $groups = Groups::orderBy("id", "DESC")->limit(100)->get();

        return View::make("admin.groups.groups", [
            "groups" => $groups
        ]);

    }
    public function group($id) {

        $groups = Groups::where("id","=",$id)->get();

        return View::make("admin.groups.group", [
            "groups" => $groups
        ]);

    }
    public function channels() {

        $channels = Channels::orderBy("id", "DESC")->limit(100)->get();

        return View::make("admin.channels.channels", [
            "channels" => $channels
        ]);

    }
    public function channel($id) {

        $channels = Channels::where("id","=",$id)->get();

        return View::make("admin.channels.channel", [
            "channels" => $channels
        ]);

    }
    public function posts() {

        $posts = Posts::orderBy("id", "DESC")->limit(100)->get();


        return View::make("admin.posts.posts", [
            "posts" => $posts
        ]);

    }
    public function post($id) {

        $posts = Posts::where("id","=",$id)->get();


        return View::make("admin.posts.post", [
            "posts" => $posts
        ]);

    }
    public function flags() {
        $flags = Flags::orderBy("id", "DESC")->limit(100)->get();
        return View::make("admin.flags.flags", [
            "flags" => $flags
        ]);
    }
    public function contact() {

        $contact = Contact::get();

        return View::make("admin.contact.contact", [
            "contact" => $contact
        ]);

    }
    public function newRodverChannelListing() {

        // Define basic variables
        $channel = Input::get("channel");
        $apiKey = "AIzaSyAagrrdg_3FvJD7zr_tvsO7unYtSFSml7I";

        // Get basic channel info
        $channelDataURL = "https://www.googleapis.com/youtube/v3/channels?part=snippet&id=" . $channel . "&key=" . $apiKey;
        $recievedChannelDataURL = file_get_contents($channelDataURL);
        $decodedChannelData = json_decode($recievedChannelDataURL, true);

        // Get channel Branding data
        $channelBrandingURL = "https://www.googleapis.com/youtube/v3/channels?part=brandingSettings&id=" . $channel . "&key=" . $apiKey;
        $recievedChannelBrandingURL = file_get_contents($channelBrandingURL);
        $decodedBrandingData = json_decode($recievedChannelBrandingURL, true);

        // Create a youtube channel profile in our DB
        YoutubeChannels::create([
            "channel_title" => $decodedChannelData["items"][0]["snippet"]["title"],
            "channel_thumbnail" => $decodedChannelData["items"][0]["snippet"]["thumbnails"]["high"]["url"],
            "channel_banner" => $decodedBrandingData["items"][0]["brandingSettings"]["image"]["bannerImageUrl"],
            "channel_id" => $channel
        ]);

        // Get ALL videos for the channel and save them in a temp database for processing
        $baseUrl = 'https://www.googleapis.com/youtube/v3/';
        $channelId = $channel;
        $params = [
            'id'=> $channelId,
            'part'=> 'contentDetails',
            'key'=> $apiKey
        ];
        $url = $baseUrl . 'channels?' . http_build_query($params);
        $json = json_decode(file_get_contents($url), true);
        $playlist = $json['items'][0]['contentDetails']['relatedPlaylists']['uploads'];
        $params = [
            'part'=> 'snippet',
            'playlistId' => $playlist,
            'maxResults'=> '50',
            'key'=> $apiKey
        ];
        $url = $baseUrl . 'playlistItems?' . http_build_query($params);
        $json = json_decode(file_get_contents($url), true);
        $videos = [];
        foreach($json['items'] as $video)
            $videos[] = $video['snippet'];
        while(isset($json['nextPageToken'])){
            $nextUrl = $url . '&pageToken=' . $json['nextPageToken'];
            $json = json_decode(file_get_contents($nextUrl), true);
            foreach($json['items'] as $video)
                $videos[] = $video['snippet'];

        }

        foreach($videos as $video) {
            VideosToProcess::create([
                "video_id" => $video['resourceId']['videoId'],
                "title" => $video['title'],
                "thumbnail" => $video["thumbnails"]["high"]["url"],
                "description" => $video["description"],
                "channel_id" => $channelId
            ]);
        }
        return Redirect::route("admin.index");

        $videosToDo = VideosToProcess::all();
//
//        foreach ($videosToDo as $videoToProcess) {
//            $youtube_info_url = "https://www.googleapis.com/youtube/v3/videos?part=statistics,%20snippet&id=" . $videoToProcess->video_id . "&key=" . $apiKey;
//            $recieved_youtube_info = file_get_contents($youtube_info_url);
//            $parsed_youtube_info = json_decode($recieved_youtube_info, true);
//            $video_id = $parsed_youtube_info["items"][0]["id"]["title"];
//            $channel_id = $parsed_youtube_info["items"][0]["snippet"]["channelId"];
//
//            $title = $parsed_youtube_info["items"][0]["snippet"]["title"];
//            $description = $parsed_youtube_info["items"][0]["snippet"]["description"];
//            $thumbnail = $parsed_youtube_info["items"][0]["snippet"]["thumbnails"]["high"]["url"];
//
//            VideosToProcess::create([
//                "video_id" => $video_id,
//                "title" => $title,
//                "description" => $description,
//                "thumbnail" => $thumbnail,
//                "channel_id" => $channel_id
//            ]);
//        }



    }



    public function indexTumblrTags() {
        // Define basic variables
        $tag = Input::get("tag");
        $apiKey = "fuiKNFp9vQFvjLNvx4sUwti4Yb5yGutBN4Xh10LXZhhRKjWlV4";
        $video_list = json_decode(file_get_contents("https://api.tumblr.com/v2/tagged?tag=".$tag."&api_key=".$apiKey.""));
        foreach($video_list->response as $item) {
            if($item->type == "photo"){
                $img = $item->photos[0]->original_size->url;
                $blog_name = $item->blog_name;
                $type = $item->type;
                $date = $item->date;
                $summary = $item->summary;
                $id = $item->id;
                $post_url = $item->post_url;
                TumblrPosts::create([
                    "img_url" => $img,
                    "blog_name" => $blog_name,
                    "type" => $type,
                    "date" => $date,
                    "summary" => $summary,
                    "post_id" => $id,
                    "tag" => $tag,
                    "post_url" => $post_url
                ]);
            }
            if($item->type == "video"){
                $blog_name = $item->blog_name;
                $type = $item->type;
                $date = $item->date;
                $summary = $item->summary;
                $id = $item->id;
                $post_url = $item->post_url;
                if (!empty($item->video_url)) {
                    $vid = $item->video_url;
                    $thumbnail_url = $item->thumbnail_url;
                }else {
                    $vid = "err";
                    $thumbnail_url = "err";
                }
                TumblrPosts::create([
                    "blog_name" => $blog_name,
                    "type" => $type,
                    "date" => $date,
                    "summary" => $summary,
                    "post_id" => $id,
                    "tag" => $tag,
                    "video_url" => $vid,
                    "thumbnail_url" => $thumbnail_url,
                    "post_url" => $post_url
                ]);
            }
        }
        return Redirect::route("admin.index");
    }
    public function newChannelListing() {
//        $channel = Input::get("channel");
//        $channelId = $channel;
//        $maxResults = 20;
//        $API_key = 'AIzaSyDffmrVRndaSTp9e2NThyNAnPQh2VTkfDU';
//        $video_list = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelId.'&maxResults='.$maxResults.'&key='.$API_key.''));
//
//
//        foreach($video_list->items as $item) {
//            //Embed video
//            if (isset($item->id->videoId)) {
//                $uid = $item->id->videoId;
//                $thumbnail = $item->snippet->thumbnails->medium->url;
//                $title = $item->snippet->title;
//                $channelId = $item->snippet->channelId;
//                VideosToProcess::create([
//                    "thumbnail" => $thumbnail,
//                    "title" => $title,
//                    "video_id" => $uid,
//                    "channel_id" => $title
//                ]);
//            }
//        }
//        $json = file_get_contents($url);
//        $decode = json_decode($json);
//        $channel_banner = $decode->items[0]->brandingSettings->image->bannerImageUrl;;
//        $channel_title = $video_list->items[0]->snippet->channelTitle;
//        YoutubeChannels::create([
//            "channel_id" => $channel_id,
//            "channel_title" => $channel_title,
//            "channel_banner" => $channel_banner
//        ]);



    }

    public function user($id) {

        $user = User::where("id", "=", $id)->get()->first();

        return View::make("admin.users.user", [
            "user" => $user
        ]);

    }

    public function userPageUpdate($id) {

        $user = User::where("id", "=", $id)->get()->first();

        if (Input::has("username") OR Input::has("email")) {
            $username = Input::get("username");
            $email = Input::get("email");
            $first_name = Input::get("first_name");
            $last_name = Input::get("last_name");
            $date_birth = Input::get("date_birth");
            $country = Input::get("country");
            $theme = Input::get("theme");
            $gender = Input::get("gender");
            $about = Input::get("about");

            if (User::where("username", "=", $username)->count() > 0) {
                return Redirect::route("admin.user", [$user->id]);
            }

            $user->update([
                "username" => $username,
                "email" => $email,
                "first_name" => $first_name,
                "last_name" => $last_name,
                "date_birth" => $date_birth,
                "country" => $country,
                "theme" => $theme,
                "gender" => $gender,
                "about" => $about
            ]);

        }

        if (Input::has("role")) {
            $role = Input::get("role");

            $user->update([
               "role" => $role
            ]);
        }

        if (Input::has("twitter") OR Input::has("youtube") OR Input::has("tumblr") OR Input::has("twitter") OR Input::has("website")) {
            $youtube = Input::get("youtube");
            $facebook = Input::get("facebook");
            $tumblr = Input::get("tumblr");
            $twitter = Input::get("twitter");
            $website = Input::get("website");

            $user->update([
               "youtube" => $youtube,
               "facebook" => $facebook,
               "tumblr" => $tumblr,
               "twitter" => $twitter,
               "website" => $website
            ]);

        }

        return Redirect::route("admin.user", [$user->id]);
    }

    public function userEditGeneralPage($id) {

        $user = User::where("id", "=", $id)->get()->first() ;

        return View::make("admin.users.editGeneralData",[
            "user" => $user
        ]);
    }

    public function doUserEditGeneralPage($id) {
        $user = User::where("id", "=", $id)->get()->first();

        $username = Input::get("username");
        $email = Input::get("email");
        $first_name = Input::get("first_name");
        $last_name = Input::get("last_name");
        $date_birth = Input::get("date_birth");
        $country = Input::get("country");
        $theme = Input::get("theme");
        $gender = Input::get("gender");
        $about = Input::get("about");

        if (!$user->username == $username) {
            if (User::where("username", "=", $username)->count() > 0) {
                return Redirect::route("admin.user", [$user->id]);
            }
        }

        $user->update([
            "username" => $username,
            "email" => $email,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "date_birth" => $date_birth,
            "country" => $country,
            "theme" => $theme,
            "gender" => $gender,
            "about" => $about
        ]);
        return Redirect::route("admin.user", [$user->id]);
    }

    public function userSocialEditDataPage($id) {
        return View::make("admin.users.editSocialData", [
            "user" => User::where("id", "=", $id)->get()->first()
        ]);
    }

}