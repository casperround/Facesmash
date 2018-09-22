<?php

class DefaultController extends BaseController
{

    public function ts()
    {
        Mail::send('emails.welcome', array('key' => 'value'), function($message)
        {
            $message->to('64666cjr@gmail.com', 'Casper Round')->subject('Welcome!');
        });
        return View::make("ts");
    }
    public function policy()
    {
        return View::make("policy");
    }
    public function index()
    {

        if (Auth::check()) {
            return Redirect::route("home");
        }
        return View::make("auth.login");
    }
    public function flag()
    {
        $relation = Input::get("relation");
        $relation_id = Input::get("relation_id");
        $reporter_id = Auth::user()->id;
        $url = Input::get("url");
        $flags = Flags::where("relation_id", "=", $relation_id)->where("reporter_id","=",$reporter_id)->get();
        if ($flags->isEmpty()) {
            Flags::create([
                "relation" => $relation,
                "relation_id" => $relation_id,
                "reporter_id" => $reporter_id
            ]);
            return Redirect::back();
        }else{
            return Redirect::back();
        }

    }
    public function unflag()
    {
        $relation_id = Input::get("relation_id");
        Flags::where("relation_id", "=", $relation_id)->where("reporter_id","=",(Auth::user()->id))->delete();
        return Redirect::back();
    }

    public function doLogin()
    {
        $validator = Validator::make(Input::all(), [
            "username" => "required|min:2|max:16",
            "password" => "required"
        ]);

        if ($validator->fails()) {
            return Redirect::route("index")->withErrors($validator)->withInput();
        }

        if (Auth::attempt(["username" => Input::get('username'), "password" => Input::get('password')])) {
            return Redirect::intended("/home");
        }
        return Redirect::route("index")->withErrors($validator)->withInput();
    }

    public function register()
    {

        if (Auth::check()) {
            return Redirect::route("home");
        }

        return View::make("auth.register");
    }

    public function doRegister()
    {

        $validator = Validator::make(Input::all(), [
            "username" => "required|min:2|max:16|unique:users,username",
            "email" => "required",
            "password" => "required"
        ]);

        if ($validator->fails()) {
            return Redirect::route("register")->withErrors($validator)->withInput();
        }

        $username = Input::get("username");
        $email = Input::get("email");
        $password = Input::get("password");

        User::create([
            "username" => $username,
            "email" => $email,
            "password" => Hash::make($password)
        ]);

        Auth::attempt(["username" => $username, "password" => $password]);

        return Redirect::intended("/home");

    }

    public function doLogout()
    {
        Auth::logout();
        return Redirect::route("index");
    }

    public function homePage()
    {

        if (!Auth::check()) {
            return Redirect::route("index");
        }
        $friends = Friends::where("sender", "=", (Auth::user()->id))->orWhere("recipient", "=", (Auth::user()->id))->where("status", "=", 2)->get();

        return View::make("home", [
            "friends" => $friends
        ]);

    }

    public function userProfilePage($username)
    {
        $user = User::where("username", "=", $username)->first();
        return View::make("userProfile", [
            "user" => $user
        ]);
    }
    public function editMyProfilePage()
    {
        return View::make("account.editprofile");
    }

    public function doEditMyProfile()
    {

    }
    public function doEditCoverMyProfile()
    {
        if (Input::hasFile("file_upload_banner")) {

            //==============================================
            //Banner Img upload
            //==============================================
            $uidb = str_random(10);
            $savePath_banner = 'data_store/post_media/';
            $file_banner = Input::file('file_upload_banner');
            $filename_banner = $uidb . '.' . $file_banner->getClientOriginalExtension();
            $file_banner->move($savePath_banner, $filename_banner);
            $banner_img_path = $savePath_banner . $filename_banner;


            $user = User::where("id", "=", (Auth::user()->id))->get()->first();
            $user->update([
                "banner_img_path" => $banner_img_path
            ]);
            return Redirect::route("account.myProfile");
        } else {

            return Redirect::route("account.myProfile");
        }
    }
    public function doEditProfileMyProfile()
    {
        if (Input::hasFile("file_upload_profile")) {

            //==============================================
            //Banner Img upload
            //==============================================
            $uidb = str_random(10);
            $savePath_banner = 'data_store/post_media/';
            $file_banner = Input::file('file_upload_profile');
            $filename_banner = $uidb . '.' . $file_banner->getClientOriginalExtension();
            $file_banner->move($savePath_banner, $filename_banner);
            $banner_img_path = $savePath_banner . $filename_banner;


            $user = User::where("id", "=", (Auth::user()->id))->get()->first();
            $user->update([
                "profile_img_path" => $banner_img_path
            ]);
            return Redirect::route("account.myProfile");
        } else {

            return Redirect::route("account.myProfile");
        }
    }
    public function homePageFormPost()
    {

        if (Input::hasFile("file_upload")) {


            $uid = str_random(10);

            $savePath = 'data_store/post_media/';
            $file = Input::file('file_upload');
            $fileExtension = $file->getClientOriginalExtension();
            $filename = $uid . '.' . $file->getClientOriginalExtension();

            $file->move($savePath, $filename);
            $filePath = $savePath . $filename;

            if ($fileExtension == "mp4") {


                $ffmpeg = FFMpeg\FFMpeg::create();
                $video = $ffmpeg->open($savePath . $filename);
                $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(10))->save($savePath . $uid . '.jpg');
            }
            $media_type = $fileExtension;
            $home_post = Input::get("home_post");
            $author_id = Auth::user()->id;
            $post_time = date("H:i:s");
            $post_date = date("d-m-Y");
            $relation = "feed";
            $visibility = Input::get("visibility");


            Posts::create([
                "post_id" => $uid,
                "author_id" => $author_id,
                "text" => $home_post,
                "post_time" => $post_time,
                "post_date" => $post_date,
                "visibility" => $visibility,
                "file_path" => $filePath,
                "relation" => $relation,
                "file_extension" => $fileExtension,
                "media_type" => $media_type
            ]);

        } else {

            $home_post = Input::get("home_post");
            $author_id = Auth::user()->id;
            $post_id = str_random(10);
            $media_type = "text";
            $post_time = date("H:i:s");
            $post_date = date("d-m-Y");
            $relation = "feed";
            $visibility = Input::get("visibility");

            Posts::create([
                "post_id" => $post_id,
                "author_id" => $author_id,
                "text" => $home_post,
                "post_time" => $post_time,
                "post_date" => $post_date,
                "relation" => $relation,
                "visibility" => $visibility,
                "media_type" => $media_type
            ]);

        }

        return Redirect::route("home");

    }

    public function contactPage()
    {
        return View::make("contact");
    }
    public function contactPageSent()
    {
        return View::make("contactSent");
    }

    public function contactPageSend()
    {
        $subject = Input::get("subject");
        $message = Input::get("message");
        $sender = Auth::user()->id;
        $time = date("H:i:s");
        $date = date("d-m-Y");

        Contact::create([
            "subject" => $subject,
            "message" => $message,
            "sender" => $sender,
            "time" => $time,
            "date" => $date
        ]);
        return Redirect::route("contact.sent");

    }
//==============================================
//Discover Controller
//==============================================
    public function discoverPage()
    {

        if (Auth::check()) {
            $client_IP = $_SERVER['REMOTE_ADDR'];
            $time = date("H:i:s");
            $date = date("Y-m-d");
            $content_type = "discover";
            $content_id = "";
            $authed_user = 1;

            UserContentViews::create([
                "time" => $time,
                "date" => $date,
                "IP" => $client_IP,
                "content_type" => $content_type,
                "content_id" => $content_id,
                "authed_user" => $authed_user
            ]);
        } else {
            $client_IP = $_SERVER['REMOTE_ADDR'];
            $time = date("H:i:s");
            $date = date("Y-m-d");
            $content_type = "discover";
            $content_id = "";
            $authed_user = 0;

            UserContentViews::create([
                "time" => $time,
                "date" => $date,
                "IP" => $client_IP,
                "content_type" => $content_type,
                "content_id" => $content_id,
                "authed_user" => $authed_user
            ]);
        }
        $posts = Posts::where("visibility", "=", "1")->get()->first();
        $channels = Channels::where("visibility", "=", "1")->get()->first();
        $pages = Pages::where("visibility", "=", "1")->get()->first();

        return View::make("discover", [
            "youtube" => $posts,
            "channels" => $channels,
            "pages" => $pages
        ]);
    }

//==============================================
//Discover Channel Controller
//==============================================
    public function discoverChannelPage()
    {

        if (Auth::check()) {
            $client_IP = $_SERVER['REMOTE_ADDR'];
            $time = date("H:i:s");
            $date = date("Y-m-d");
            $content_type = "channels";
            $content_id = "";
            $authed_user = 1;

            UserContentViews::create([
                "time" => $time,
                "date" => $date,
                "IP" => $client_IP,
                "content_type" => $content_type,
                "content_id" => $content_id,
                "authed_user" => $authed_user
            ]);
        } else {
            $client_IP = $_SERVER['REMOTE_ADDR'];
            $time = date("H:i:s");
            $date = date("Y-m-d");
            $content_type = "channels";
            $content_id = "";
            $authed_user = 0;

            UserContentViews::create([
                "time" => $time,
                "date" => $date,
                "IP" => $client_IP,
                "content_type" => $content_type,
                "content_id" => $content_id,
                "authed_user" => $authed_user
            ]);
        }

        return View::make("discover.channel");
    }
//==============================================
//Discover Gif Controller
//==============================================
    public function discoverGifPage()
    {

        if (Auth::check()) {
            $client_IP = $_SERVER['REMOTE_ADDR'];
            $time = date("H:i:s");
            $date = date("Y-m-d");
            $content_type = "gifs";
            $content_id = "";
            $authed_user = 1;

            UserContentViews::create([
                "time" => $time,
                "date" => $date,
                "IP" => $client_IP,
                "content_type" => $content_type,
                "content_id" => $content_id,
                "authed_user" => $authed_user
            ]);
        } else {
            $client_IP = $_SERVER['REMOTE_ADDR'];
            $time = date("H:i:s");
            $date = date("Y-m-d");
            $content_type = "gifs";
            $content_id = "";
            $authed_user = 0;

            UserContentViews::create([
                "time" => $time,
                "date" => $date,
                "IP" => $client_IP,
                "content_type" => $content_type,
                "content_id" => $content_id,
                "authed_user" => $authed_user
            ]);
        }

        return View::make("discover.gif");
    }
//==============================================
//Discover Group Controller
//==============================================
    public function discoverGroupPage()
    {

        if (Auth::check()) {
            $client_IP = $_SERVER['REMOTE_ADDR'];
            $time = date("H:i:s");
            $date = date("Y-m-d");
            $content_type = "groups";
            $content_id = "";
            $authed_user = 1;

            UserContentViews::create([
                "time" => $time,
                "date" => $date,
                "IP" => $client_IP,
                "content_type" => $content_type,
                "content_id" => $content_id,
                "authed_user" => $authed_user
            ]);
        } else {
            $client_IP = $_SERVER['REMOTE_ADDR'];
            $time = date("H:i:s");
            $date = date("Y-m-d");
            $content_type = "groups";
            $content_id = "";
            $authed_user = 0;

            UserContentViews::create([
                "time" => $time,
                "date" => $date,
                "IP" => $client_IP,
                "content_type" => $content_type,
                "content_id" => $content_id,
                "authed_user" => $authed_user
            ]);
        }

        return View::make("discover.group");
    }
//==============================================
//Discover Page Controller
//==============================================
    public function discoverPagesPage()
    {

        if (Auth::check()) {
            $client_IP = $_SERVER['REMOTE_ADDR'];
            $time = date("H:i:s");
            $date = date("Y-m-d");
            $content_type = "pages";
            $content_id = "";
            $authed_user = 1;

            UserContentViews::create([
                "time" => $time,
                "date" => $date,
                "IP" => $client_IP,
                "content_type" => $content_type,
                "content_id" => $content_id,
                "authed_user" => $authed_user
            ]);
        } else {
            $client_IP = $_SERVER['REMOTE_ADDR'];
            $time = date("H:i:s");
            $date = date("Y-m-d");
            $content_type = "pages";
            $content_id = "";
            $authed_user = 0;

            UserContentViews::create([
                "time" => $time,
                "date" => $date,
                "IP" => $client_IP,
                "content_type" => $content_type,
                "content_id" => $content_id,
                "authed_user" => $authed_user
            ]);
        }

        return View::make("discover.page");
    }
//==============================================
//Discover Photo Controller
//==============================================
    public function discoverPhotoPage()
    {

        if (Auth::check()) {
            $client_IP = $_SERVER['REMOTE_ADDR'];
            $time = date("H:i:s");
            $date = date("Y-m-d");
            $content_type = "photos";
            $content_id = "";
            $authed_user = 1;

            UserContentViews::create([
                "time" => $time,
                "date" => $date,
                "IP" => $client_IP,
                "content_type" => $content_type,
                "content_id" => $content_id,
                "authed_user" => $authed_user
            ]);
        } else {
            $client_IP = $_SERVER['REMOTE_ADDR'];
            $time = date("H:i:s");
            $date = date("Y-m-d");
            $content_type = "photos";
            $content_id = "";
            $authed_user = 0;

            UserContentViews::create([
                "time" => $time,
                "date" => $date,
                "IP" => $client_IP,
                "content_type" => $content_type,
                "content_id" => $content_id,
                "authed_user" => $authed_user
            ]);
        }

        return View::make("discover.photo");
    }

    public function discoverPhotoViewPage($post_id)
    {

        $post = Posts::where("post_id", "=", $post_id)->get()->first();

        return View::make("discover.photoview", [
            "post" => $post
        ]);

    }
//==============================================
//Discover Video Controller
//==============================================
    public function discoverVideoPage()
    {

        if (Auth::check()) {
            $client_IP = $_SERVER['REMOTE_ADDR'];
            $time = date("H:i:s");
            $date = date("Y-m-d");
            $content_type = "videos";
            $content_id = "";
            $authed_user = 1;

            UserContentViews::create([
                "time" => $time,
                "date" => $date,
                "IP" => $client_IP,
                "content_type" => $content_type,
                "content_id" => $content_id,
                "authed_user" => $authed_user
            ]);
        } else {
            $client_IP = $_SERVER['REMOTE_ADDR'];
            $time = date("H:i:s");
            $date = date("Y-m-d");
            $content_type = "videos";
            $content_id = "";
            $authed_user = 0;

            UserContentViews::create([
                "time" => $time,
                "date" => $date,
                "IP" => $client_IP,
                "content_type" => $content_type,
                "content_id" => $content_id,
                "authed_user" => $authed_user
            ]);
        }

        return View::make("discover.video");
    }

    public function discoverVideoViewPage($post_id)
    {

        $post = Posts::where("post_id", "=", $post_id)->get()->first();

        return View::make("discover.videoview", [
            "post" => $post
        ]);

    }
//==============================================
// Pages Controller
//==============================================
    public function userPagesPage()
    {
        return View::make("pages.userpage");
    }

    public function userPagesNewPage()
    {

        if (Input::hasFile("file_upload_banner") OR Input::hasFile("file_upload_profile")) {
            $validator = Validator::make(Input::all(), [
                "unique_pagename" => "required|min:2|max:16|unique:pages,unique_pagename"
            ]);
            if ($validator->fails()) {
                return Redirect::route("pages.userpage")->withErrors($validator)->withInput();
            }
            $uid = str_random(10);
            //==============================================
            //Profile Img upload
            //==============================================
            $uidp = str_random(10);
            $savePath_profile = 'data_store/post_media/';
            $file_profile = Input::file('file_upload_profile');
            $fileExtension_profile = $file_profile->getClientOriginalExtension();
            $filename_profile = $uidp . '.' . $file_profile->getClientOriginalExtension();
            $file_profile->move($savePath_profile, $filename_profile);
            $page_img_path = $savePath_profile . $filename_profile;
            $file_extension_profile = $fileExtension_profile;
            //==============================================
            //Banner Img upload
            //==============================================
            $uidb = str_random(10);
            $savePath_banner = 'data_store/post_media/';
            $file_banner = Input::file('file_upload_banner');
            $fileExtension_banner = $file_banner->getClientOriginalExtension();
            $filename_banner = $uidb . '.' . $file_banner->getClientOriginalExtension();
            $file_banner->move($savePath_banner, $filename_banner);
            $banner_img_path = $savePath_banner . $filename_banner;
            $file_extension_banner = $fileExtension_banner;

            $unique_pagename = Input::get("unique_pagename");
            $owner_id = Auth::user()->id;
            $about = Input::get("about");
            $website = Input::get("website");
            $twitter = Input::get("twitter");
            $facebook = Input::get("facebook");
            $youtube = Input::get("youtube");
            $category = Input::get("category");
            $post_time = date("H:i:s");
            $post_date = date("d-m-Y");
            $visibility = Input::get("visibility");

            Pages::create([
                "unique_pagename" => $unique_pagename,
                "uid" => $uid,
                "owner_id" => $owner_id,
                "about" => $about,
                "website" => $website,
                "twitter" => $twitter,
                "facebook" => $facebook,
                "youtube" => $youtube,
                "category" => $category,
                "post_time" => $post_time,
                "visibility" => $visibility,
                "post_date" => $post_date,
                "page_img_path" => $page_img_path,
                "file_extension_profile" => $file_extension_profile,
                "banner_img_path" => $banner_img_path,
                "file_extension_banner" => $file_extension_banner
            ]);
            return Redirect::route("pages.userpage");
        } else {
            $validator = Validator::make(Input::all(), [
                "unique_pagename" => "required|min:2|max:16|unique:pages,unique_pagename"
            ]);
            if ($validator->fails()) {
                return Redirect::route("pages.userpage")->withErrors($validator)->withInput();
            }
            $unique_pagename = Input::get("unique_pagename");
            $uid = str_random(10);
            $owner_id = Auth::user()->id;
            $about = Input::get("about");
            $website = Input::get("website");
            $twitter = Input::get("twitter");
            $facebook = Input::get("facebook");
            $youtube = Input::get("youtube");
            $category = Input::get("category");
            $post_time = date("H:i:s");
            $post_date = date("d-m-Y");
            $visibility = Input::get("visibility");

            Pages::create([
                "unique_pagename" => $unique_pagename,
                "uid" => $uid,
                "owner_id" => $owner_id,
                "about" => $about,
                "website" => $website,
                "twitter" => $twitter,
                "facebook" => $facebook,
                "youtube" => $youtube,
                "category" => $category,
                "post_time" => $post_time,
                "visibility" => $visibility,
                "post_date" => $post_date
            ]);
            return Redirect::route("pages.userpage");
        }

    }

    public function pagesViewPage($unique_pagename)
    {

        $page = Pages::where("unique_pagename", "=", $unique_pagename)->get()->first();

        return View::make("pages.pageview", [
            "page" => $page
        ]);

    }


    public function pagesPageFormPost()
    {

        if (Input::hasFile("file_upload")) {

            $uid = str_random(10);

            $savePath = 'data_store/post_media/';
            $file = Input::file('file_upload');
            $fileExtension = $file->getClientOriginalExtension();
            $filename = $uid . '.' . $file->getClientOriginalExtension();

            $file->move($savePath, $filename);
            $filePath = $savePath . $filename;

            $media_type = $fileExtension;
            $home_post = Input::get("home_post");
            $author_id = Auth::user()->id;
            $post_time = date("H:i:s");
            $post_date = date("d-m-Y");
            $visibility = Input::get("visibility");
            $relation = "page";
            $relation_id = Input::get("relation_id");


            Posts::create([
                "post_id" => $uid,
                "author_id" => $author_id,
                "text" => $home_post,
                "post_time" => $post_time,
                "post_date" => $post_date,
                "visibility" => $visibility,
                "file_path" => $filePath,
                "file_extension" => $fileExtension,
                "relation" => $relation,
                "relation_id" => $relation_id,
                "media_type" => $media_type
            ]);

        } else {

            $home_post = Input::get("home_post");
            $author_id = Auth::user()->id;
            $post_id = str_random(10);
            $media_type = "text";
            $post_time = date("H:i:s");
            $post_date = date("d-m-Y");
            $visibility = Input::get("visibility");
            $relation = "page";
            $relation_id = Input::get("relation_id");

            Posts::create([
                "post_id" => $post_id,
                "author_id" => $author_id,
                "text" => $home_post,
                "post_time" => $post_time,
                "post_date" => $post_date,
                "visibility" => $visibility,
                "relation" => $relation,
                "relation_id" => $relation_id,
                "media_type" => $media_type
            ]);

        }

        return Redirect::route("pagesview", [
            "unique_pagename" => Input::get("unique_pagename")
        ]);
    }



//==============================================
// Events Controller
//==============================================
    public function userEventsPage()
    {
        return View::make("events.userevent");
    }

    public function userEventsNewPage()
    {

        $validator = Validator::make(Input::all(), [
            "unique_eventname" => "required|min:2|max:16|unique:events,unique_eventname"
        ]);
        if ($validator->fails()) {
            return Redirect::route("events.userevent")->withErrors($validator)->withInput();
        }
        $unique_eventname = Input::get("unique_eventname");
        $uid = str_random(10);
        $owner_id = Auth::user()->id;
        $about = Input::get("about");
        $website = Input::get("website");
        $twitter = Input::get("twitter");
        $facebook = Input::get("facebook");
        $youtube = Input::get("youtube");
        $category = Input::get("category");
        $post_time = date("H:i:s");
        $post_date = date("d-m-Y");
        $visibility = Input::get("visibility");

        Events::create([
            "unique_eventname" => $unique_eventname,
            "uid" => $uid,
            "owner_id" => $owner_id,
            "about" => $about,
            "website" => $website,
            "twitter" => $twitter,
            "facebook" => $facebook,
            "youtube" => $youtube,
            "category" => $category,
            "post_time" => $post_time,
            "visibility" => $visibility,
            "post_date" => $post_date
        ]);
        return Redirect::route("events.userevent");
    }

    public function eventsviewPage($unique_eventname)
    {
        return View::make("events.eventview", [
            "unique_eventname" => $unique_eventname
        ]);

    }

//==============================================
// Groups Controller
//==============================================
    public function userGroupsPage()
    {
        return View::make("groups.usergroup");
    }

    public function userGroupsNewPage()
    {

        $validator = Validator::make(Input::all(), [
            "unique_groupname" => "required|min:2|max:16|unique:groups,unique_groupname"
        ]);
        if ($validator->fails()) {
            return Redirect::route("groups.usergroup")->withErrors($validator)->withInput();
        }
        $unique_groupname = Input::get("unique_groupname");
        $uid = str_random(10);
        $owner_id = Auth::user()->id;
        $about = Input::get("about");
        $website = Input::get("website");
        $twitter = Input::get("twitter");
        $facebook = Input::get("facebook");
        $youtube = Input::get("youtube");
        $category = Input::get("category");
        $post_time = date("H:i:s");
        $post_date = date("d-m-Y");
        $visibility = Input::get("visibility");

        Groups::create([
            "unique_groupname" => $unique_groupname,
            "uid" => $uid,
            "owner_id" => $owner_id,
            "about" => $about,
            "website" => $website,
            "twitter" => $twitter,
            "facebook" => $facebook,
            "youtube" => $youtube,
            "category" => $category,
            "post_time" => $post_time,
            "visibility" => $visibility,
            "post_date" => $post_date
        ]);
        return Redirect::route("groups.usergroup");
    }

    public function groupsviewPage($unique_groupname)
    {
        return View::make("groups.groupview", [
            "unique_groupname" => $unique_groupname
        ]);

    }

//==============================================
// Channels Controller
//==============================================
    public function userChannelsPage()
    {
        return View::make("channels.userchannel");
    }

    public function userChannelsNewPage()
    {


        if (Input::hasFile("file_upload_banner") OR Input::hasFile("file_upload_profile")) {
            $validator = Validator::make(Input::all(), [
                "unique_channelname" => "required|min:2|max:16|unique:channels,unique_channelname"
            ]);
            if ($validator->fails()) {
                return Redirect::route("channels.userchannel")->withErrors($validator)->withInput();
            }
            $uid = str_random(10);
            //==============================================
            //Profile Img upload
            //==============================================
            $uidp = str_random(10);
            $savePath_profile = 'data_store/post_media/';
            $file_profile = Input::file('file_upload_profile');
            $fileExtension_profile = $file_profile->getClientOriginalExtension();
            $filename_profile = $uidp . '.' . $file_profile->getClientOriginalExtension();
            $file_profile->move($savePath_profile, $filename_profile);
            $page_img_path = $savePath_profile . $filename_profile;
            $file_extension_profile = $fileExtension_profile;
            //==============================================
            //Banner Img upload
            //==============================================
            $uidb = str_random(10);
            $savePath_banner = 'data_store/post_media/';
            $file_banner = Input::file('file_upload_banner');
            $fileExtension_banner = $file_banner->getClientOriginalExtension();
            $filename_banner = $uidb . '.' . $file_banner->getClientOriginalExtension();
            $file_banner->move($savePath_banner, $filename_banner);
            $banner_img_path = $savePath_banner . $filename_banner;
            $file_extension_banner = $fileExtension_banner;

            $unique_channelname = Input::get("unique_channelname");
            $owner_id = Auth::user()->id;
            $about = Input::get("about");
            $website = Input::get("website");
            $twitter = Input::get("twitter");
            $facebook = Input::get("facebook");
            $youtube = Input::get("youtube");
            $category = Input::get("category");
            $post_time = date("H:i:s");
            $channel_type = Input::get("channel_type");
            $post_date = date("d-m-Y");
            $visibility = Input::get("visibility");


            Channels::create([
                "unique_channelname" => $unique_channelname,
                "uid" => $uid,
                "owner_id" => $owner_id,
                "about" => $about,
                "website" => $website,
                "twitter" => $twitter,
                "facebook" => $facebook,
                "youtube" => $youtube,
                "category" => $category,
                "post_time" => $post_time,
                "visibility" => $visibility,
                "post_date" => $post_date,
                "channel_type" => $channel_type,
                "channel_img_path" => $page_img_path,
                "file_extension_profile" => $file_extension_profile,
                "banner_img_path" => $banner_img_path,
                "file_extension_banner" => $file_extension_banner
            ]);
            return Redirect::route("channels.userchannel");
        } else {
            $validator = Validator::make(Input::all(), [
                "unique_channelname" => "required|min:2|max:16|unique:channels,unique_channelname"
            ]);
            if ($validator->fails()) {
                return Redirect::route("channels.userchannel")->withErrors($validator)->withInput();
            }
            $unique_channelname = Input::get("unique_channelname");
            $uid = str_random(10);
            $owner_id = Auth::user()->id;
            $about = Input::get("about");
            $website = Input::get("website");
            $twitter = Input::get("twitter");
            $facebook = Input::get("facebook");
            $youtube = Input::get("youtube");
            $category = Input::get("category");
            $post_time = date("H:i:s");
            $post_date = date("d-m-Y");
            $visibility = Input::get("visibility");
            $channel_type = Input::get("channel_type");

            Channels::create([
                "unique_channelname" => $unique_channelname,
                "uid" => $uid,
                "owner_id" => $owner_id,
                "about" => $about,
                "website" => $website,
                "twitter" => $twitter,
                "facebook" => $facebook,
                "youtube" => $youtube,
                "category" => $category,
                "post_time" => $post_time,
                "visibility" => $visibility,
                "channel_type" => $channel_type,
                "post_date" => $post_date
            ]);
            return Redirect::route("channels.userchannel");
        }
    }

    public function channelsviewPage($unique_channelname)
    {
        $channel = Channels::where("unique_channelname", "=", $unique_channelname)->get()->first();

        return View::make("channels.channelview", [
            "channel" => $channel
        ]);

    }

//==============================================
// Youtube Channel View Controller
//==============================================
    public function youtubeviewPage($channel_id)
    {
        $youtube = YoutubeChannels::where("channel_id", "=", $channel_id)->get()->first();

        return View::make("youtube.youtubeview", [
            "youtube" => $youtube
        ]);

    }


//==============================================
// Ajax Channel View Section Controller
//==============================================
    public function youtubeViewSection($channel_id)
    {
        $youtube = YoutubeChannels::where("channel_id", "=", $channel_id)->get()->first();
        return View::make("ajax_load.discover.youtube.youtubeview_section", [
            "youtube" => $youtube,
            'start_at_id' => Input::get("start_at_id"),
            'limit' => Input::get("limit", 10)
        ]);

    }
    public function discoverViewSection()
    {
        return View::make("ajax_load.discover.discover_section", [
            'start_at_id' => Input::get("start_at_id"),
            'limit' => Input::get("limit", 4)
        ]);

    }
    public function homeViewSection()
    {
        return View::make("ajax_load.home.feed", [
            'start_at_id' => Input::get("start_at_id"),
            'limit' => Input::get("limit", 15)
        ]);

    }
//==============================================
// Search Section Controller
//==============================================
    public function searchQuerySection()
    {
        return View::make("search.searchview", [
            "users" => Input::get("query")
        ]);
    }
//==============================================
// Discover Section Controller
//==============================================
    public function discoverSearchQuerySection()
    {
        return View::make("discover.search", [
            "query" => Input::get("query")
        ]);
    }
//==============================================
// Add friend Controller
//==============================================
    public function userProfileAddFriendPage($username){

        $user = User::where("username", "=", $username)->first();
        $user_id = $user->id;
        Friends::create([
            "sender" => Auth::user()->id,
            "recipient" => $user_id,
            "status" => "1"
        ]);
        return Redirect::route("userProfile", [
            "username" => $user->username
        ]);
    }

    public function userProfileRemoveFriend($username){





        $user = User::where("username", "=", $username)->first();
        $user_id = $user->id;
        $friend = Friends::where("sender", "=", Auth::user()->id)->where("recipient", "=", "$user_id")->get()->first();

        $friend->update([
                "status" => 1
            ]);

        return Redirect::route("userProfile", [
            "username" => $user->username
        ]);


    }

//==============================================
// FAQ Page Controller
//==============================================
    public function faqPage()
    {
        return View::make("faq");
    }
//==============================================
// Channels Page form post Controller
//==============================================
    public function channelsPageFormPost()
    {

        if (Input::hasFile("file_upload")) {

            $uid = str_random(10);

            $savePath = 'data_store/post_media/';
            $file = Input::file('file_upload');
            $fileExtension = $file->getClientOriginalExtension();
            $filename = $uid . '.' . $file->getClientOriginalExtension();

            $file->move($savePath, $filename);
            $filePath = $savePath . $filename;
            if ($fileExtension == "mp4") {


                $ffmpeg = FFMpeg\FFMpeg::create();
                $video = $ffmpeg->open($savePath . $filename);
                $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(10))->save($savePath . $uid . '.jpg');
            }
            $media_type = $fileExtension;
            $home_post = Input::get("home_post");
            $author_id = Auth::user()->id;
            $post_time = date("H:i:s");
            $post_date = date("d-m-Y");
            $visibility = Input::get("visibility");
            $relation = "channel";
            $relation_id = Input::get("relation_id");


            Posts::create([
                "post_id" => $uid,
                "author_id" => $author_id,
                "text" => $home_post,
                "post_time" => $post_time,
                "post_date" => $post_date,
                "visibility" => $visibility,
                "file_path" => $filePath,
                "file_extension" => $fileExtension,
                "relation" => $relation,
                "relation_id" => $relation_id,
                "media_type" => $media_type
            ]);

        } else {

            $home_post = Input::get("home_post");
            $author_id = Auth::user()->id;
            $post_id = str_random(10);
            $media_type = "text";
            $post_time = date("H:i:s");
            $post_date = date("d-m-Y");
            $visibility = Input::get("visibility");
            $relation = "channel";
            $relation_id = Input::get("relation_id");

            Posts::create([
                "post_id" => $post_id,
                "author_id" => $author_id,
                "text" => $home_post,
                "post_time" => $post_time,
                "post_date" => $post_date,
                "visibility" => $visibility,
                "relation" => $relation,
                "relation_id" => $relation_id,
                "media_type" => $media_type
            ]);

        }
        return Redirect::route("channelsview", [
            "unique_channelname" => Input::get("unique_channelname")
        ]);
    }

//==============================================
// Pictures Controller
//==============================================
    public function userPicturesPage()
    {
        return View::make("pictures.userpicture");
    }

    public function picturesviewPage($unique_picturename)
    {
        return View::make("pictures.pictureview", [
            "unique_picturename" => $unique_picturename
        ]);


    }
//==============================================
// Videos Controller
//==============================================
    public function userVideosPage()
    {
        return View::make("videos.uservideo");
    }

    public function videosviewPage($unique_videoname)
    {
        return View::make("videos.videoview", [
            "unique_videoname" => $unique_videoname
        ]);


    }



//==============================================
// Search Controller
//==============================================
    public function ajaxYotuubeLoad($channel_id){

    }



}