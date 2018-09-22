<?php

Route::get('/', [
    "as" => "index",
    "uses" => "DefaultController@index"
]);
Route::get('/ts', [
    "as" => "ts",
    "uses" => "DefaultController@ts"
]);
Route::get('/policy', [
    "as" => "policy",
    "uses" => "DefaultController@policy"
]);

Route::post('/auth/doLogin', [
    "as" => "auth.doLogin",
    "uses" => "DefaultController@doLogin"
]);

Route::get('/register', [
    "as" => "register",
    "uses" => "DefaultController@register"
]);
//==============================================
//Auth Page Routes
//==============================================
Route::post('/auth/doRegister', [
    "as" => "auth.doRegister",
    "uses" => "DefaultController@doRegister"
]);

Route::get('/auth/logout', [
    "as" => "auth.logout",
    "uses" => "DefaultController@doLogout"
]);

//==============================================
//Home Page Routes
//==============================================
Route::get('/home', [
    "as" => "home",
    "uses" => "DefaultController@homePage"
]);

Route::post('/home/createNewPost', [
    "as" => "home.createNewPost",
    "uses" => "DefaultController@homePageFormPost"
]);

//==============================================
//User Profile Page Routes
//==============================================
Route::get('/profile/{username}', [
    "as" => "userProfile",
    "uses" => "DefaultController@userProfilePage"
]);

Route::get('/profile/addfriend/{username}', [
    "as" => "userProfileAddFriend",
    "uses" => "DefaultController@userProfileAddFriendPage"
]);
Route::get('/profile/removeFriend/{username}', [
    "as" => "userProfileRemoveFriend",
    "uses" => "DefaultController@userProfileRemoveFriend"
]);
//==============================================
//My profile Page Routes
//==============================================
Route::get('/account/myProfile', [
    "as" => "account.myProfile",
    "uses" => "DefaultController@editMyProfilePage"
]);

Route::post('/account/myProfile/doEdit', [
    "as" => "account.myProfile.doEdit",
    "uses" => "DefaultController@doEditMyProfile"
]);

Route::post('/account/myProfile/doCover', [
    "as" => "account.myProfile.cover.doCover",
    "uses" => "DefaultController@doEditCoverMyProfile"
]);

Route::post('/account/myProfile/doProfile', [
    "as" => "account.myProfile.profile.doProfile",
    "uses" => "DefaultController@doEditProfileMyProfile"
]);

//==============================================
//Contact Page Routes
//==============================================
Route::get('/contact', [
    "as" => "contact",
    "uses" => "DefaultController@contactPage"
]);
Route::post('/contact/send', [
    "as" => "contact.send",
    "uses" => "DefaultController@contactPageSend"
]);
Route::get('/contact/sent', [
    "as" => "contact.sent",
    "uses" => "DefaultController@contactPageSent"
]);
//==============================================
//Discover Routes
//==============================================
Route::get('/discover', [
    "as" => "discover",
    "uses" => "DefaultController@discoverPage"
]);
//==============================================
//Discover Channel Routes
//==============================================
Route::get('/discover/channel', [
    "as" => "discover.channel",
    "uses" => "DefaultController@discoverChannelPage"
]);
//==============================================
//Discover Gif Routes
//==============================================
Route::get('/discover/gif', [
    "as" => "discover.gif",
    "uses" => "DefaultController@discoverGifPage"
]);
//==============================================
//Discover Group Routes
//==============================================
Route::get('/discover/group', [
    "as" => "discover.group",
    "uses" => "DefaultController@discoverGroupPage"
]);
//==============================================
//Discover Page Routes
//==============================================
Route::get('/discover/page', [
    "as" => "discover.page",
    "uses" => "DefaultController@discoverPagesPage"
]);
//==============================================
//Discover Photo Routes
//==============================================
Route::get('/discover/photo', [
    "as" => "discover.photo",
    "uses" => "DefaultController@discoverPhotoPage"
]);
Route::get('/discover/photo/{post_id}', [
    "as" => "discover.photoView",
    "uses" => "DefaultController@discoverPhotoViewPage"
]);
//==============================================
//Discover Video Routes
//==============================================
Route::get('/discover/video', [
    "as" => "discover.video",
    "uses" => "DefaultController@discoverVideoPage"
]);
Route::get('/discover/video/{post_id}', [
    "as" => "discover.videoView",
    "uses" => "DefaultController@discoverVideoViewPage"
]);
//==============================================
// Pages Routes
//==============================================


Route::get('/pages', [
    "as" => "pages.userpage",
    "uses" => "DefaultController@userPagesPage"
]);
Route::get('/pages/{unique_pagename}', [
    "as" => "pagesview",
    "uses" => "DefaultController@pagesviewPage"
]);
Route::post('/pages/userPagesNewPage', [
    "as" => "pages.userPagesNewPage",
    "uses" => "DefaultController@userPagesNewPage"
]);
Route::post('/pages/createNewPost', [
    "as" => "pages.createNewPost",
    "uses" => "DefaultController@pagesPageFormPost"
]);
//==============================================
// Groups Routes
//==============================================
Route::get('/groups', [
    "as" => "groups.usergroup",
    "uses" => "DefaultController@userGroupsPage"
]);
Route::get('/groups/{unique_groupname}', [
    "as" => "groupsview",
    "uses" => "DefaultController@groupsviewPage"
]);
Route::post('/groups/userGroupsNewPage', [
    "as" => "groups.userGroupsNewPage",
    "uses" => "DefaultController@userGroupsNewPage"
]);
//==============================================
// Events Routes
//==============================================
Route::get('/events', [
    "as" => "events.userevent",
    "uses" => "DefaultController@userEventsPage"
]);
Route::get('/events/{unique_eventname}', [
    "as" => "eventsview",
    "uses" => "DefaultController@eventsviewPage"
]);
Route::post('/events/userEventsNewPage', [
    "as" => "events.userEventsNewPage",
    "uses" => "DefaultController@userEventsNewPage"
]);
//==============================================
// channels Routes
//==============================================
Route::get('/channels', [
    "as" => "channels.userchannel",
    "uses" => "DefaultController@userChannelsPage"
]);
Route::get('/channels/{unique_channelname}', [
    "as" => "channelsview",
    "uses" => "DefaultController@channelsviewPage"
]);
Route::get('/youtube/{channel_id}', [
    "as" => "youtubeview",
    "uses" => "DefaultController@youtubeviewPage"
]);
Route::post('/channels/userChannelsNewPage', [
    "as" => "channels.userChannelsNewPage",
    "uses" => "DefaultController@userChannelsNewPage"
]);
Route::post('/channels/createNewPost', [
    "as" => "channels.createNewPost",
    "uses" => "DefaultController@channelsPageFormPost"
]);
//==============================================
// Pictures Routes
//==============================================
Route::get('/pictures', [
    "as" => "pictures.userpicture",
    "uses" => "DefaultController@userPicturesPage"
]);
Route::get('/pictures/{unique_picturename}', [
    "as" => "picturesview",
    "uses" => "DefaultController@picturesviewPage"
]);
Route::post('/pictures/userPicturesNewPage', [
    "as" => "pictures.userPicturesNewPage",
    "uses" => "DefaultController@userPicturesNewPage"
]);
//==============================================
// Videos Routes
//==============================================
Route::get('/videos', [
    "as" => "videos.uservideo",
    "uses" => "DefaultController@userVideosPage"
]);
Route::get('/videos/{unique_videoname}', [
    "as" => "videosview",
    "uses" => "DefaultController@videosviewPage"
]);
Route::post('/videos/userVideosNewPage', [
    "as" => "videos.userVideosNewPage",
    "uses" => "DefaultController@userVideosNewPage"
]);
//==============================================
//  Ajax content load
//==============================================
Route::get('/_partials.youtube/youtube/{channel_id}',[
    'as'=>'_partials.youtube',
    'uses'=>'DefaultController@youtubeViewSection'
]);
Route::get('/_partials.discover/discover',[
    'as'=>'_partials.discover',
    'uses'=>'DefaultController@discoverViewSection'
]);
Route::get('/_partials.home/feed',[
    'as'=>'_partials.home.feed',
    'uses'=>'DefaultController@homeViewSection'
]);

//==============================================
//  Search load
//==============================================
Route::post('/search',[
    'as'=>'search',
    'uses'=>'DefaultController@searchQuerySection'
]);
Route::post('/discover/search',[
    'as'=>'discover.search',
    'uses'=>'DefaultController@discoverSearchQuerySection'
]);
//==============================================
//  FAQ Page routes
//==============================================
Route::get('/faq',[
    'as'=>'faq',
    'uses'=>'DefaultController@faqPage'
]);
//==============================================
// Admin Routes
//==============================================
Route::get('/admin', [
    "as" => "admin.index",
    "uses" => "AdminController@index"
]);

Route::get('/admin/users', [
    "as" => "admin.users",
    "uses" => "AdminController@users"
]);
Route::get('/admin/user/{id}', [
    "as" => "admin.user",
    "uses" => "AdminController@user"
]);

Route::get('/admin/userEditGeneral/{id}', [
    "as" => "admin.userEditGeneral",
    "uses" => "AdminController@userEditGeneralPage"
]);
Route::post('/admin/userEditGeneral/{id}', [
    "as" => "admin.userEditGeneral.do",
    "uses" => "AdminController@doUserEditGeneralPage"
]);

Route::get('/admin/userSocialData/{id}', [
    "as" => "admin.userSocialData",
    "uses" => "AdminController@userSocialEditDataPage"
]);
Route::post('/admin/userEditGeneral/{id}', [
    "as" => "admin.userSocialData.do",
    "uses" => "AdminController@doSocialEditData"
]);

Route::post('/admin/createNewChannel', [
    "as" => "admin.createNewChannel",
    "uses" => "AdminController@newRodverChannelListing"
]);
Route::post('/admin/indexTumblrTags', [
    "as" => "admin.indexTumblrTags",
    "uses" => "AdminController@indexTumblrTags"
]);
Route::get('/admin/pages', [
    "as" => "admin.pages",
    "uses" => "AdminController@pages"
]);
Route::get('/admin/page/{id}', [
    "as" => "admin.page",
    "uses" => "AdminController@page"
]);
Route::get('/admin/groups', [
    "as" => "admin.groups",
    "uses" => "AdminController@groups"
]);
Route::get('/admin/group/{id}', [
    "as" => "admin.group",
    "uses" => "AdminController@group"
]);
Route::get('/admin/channels', [
    "as" => "admin.channels",
    "uses" => "AdminController@channels"
]);
Route::get('/admin/channel/{id}', [
    "as" => "admin.channel",
    "uses" => "AdminController@channel"
]);
Route::get('/admin/posts', [
    "as" => "admin.posts",
    "uses" => "AdminController@posts"
]);
Route::get('/admin/post/{id}', [
    "as" => "admin.post",
    "uses" => "AdminController@post"
]);
Route::get('/admin/flags', [
    "as" => "admin.flags",
    "uses" => "AdminController@flags"
]);
Route::get('/admin/flag/{id}', [
    "as" => "admin.flag",
    "uses" => "AdminController@flag"
]);
Route::get('/admin/contact', [
    "as" => "admin.contact",
    "uses" => "AdminController@contact"
]);
Route::get('/admin/groupview/{id}', [
    "as" => "admin.groupview",
    "uses" => "AdminController@groupview"
]);
Route::get('/admin/pageview/{id}', [
    "as" => "admin.pageview",
    "uses" => "AdminController@pageview"
]);
Route::get('/admin/channelview/{id}', [
    "as" => "admin.channelview",
    "uses" => "AdminController@channelview"
]);
Route::get('/admin/postview/{id}', [
    "as" => "admin.postview",
    "uses" => "AdminController@postview"
]);
//==============================================
// Flag Routes
//==============================================
Route::post('/flag', [
    "as" => "flag",
    "uses" => "DefaultController@flag"
]);
Route::post('/unflag', [
    "as" => "unflag",
    "uses" => "DefaultController@unflag"
]);
//==============================================
// API App Routes
//==============================================
Route::get('/app/auth/login', [
    "as" => "app.auth.login",
    "uses" => "AppApiController@login"
]);
Route::get('/app/discover', [
    "as" => "app.discover",
    "uses" => "AppApiController@discoverPage"
]);


//==============================================
// Casper Routes
//==============================================
Route::get('/casper', [
    "as" => "casper",
    "uses" => "CasperController@index"
]);
Route::get('/casper/blog', [
    "as" => "casper.blog",
    "uses" => "CasperController@blog"
]);
Route::post('/casper/post', [
    "as" => "casper.post",
    "uses" => "CasperController@post"
]);