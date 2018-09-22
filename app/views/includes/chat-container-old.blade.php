<style>

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }
    .Chat_Notification_Container {
        width:450px;
        right:0px;
        float:right;
        top:40px;
        margin:0px;
        position: fixed;


        height:100%;
    }

    .Notification_selects {
        width:100%;
        height:60px;

        padding:10px;
        background:;
        color:gray;
        margin-top:5px;
        position: relative;
        transition:background 0.2s, color 0.2s;
    }

    .Notification_selects:hover {
        background:#4A89DC;
        transition:background 0.2s, color 0.2s;
        color:white;
        -moz-box-shadow: inset 0 3px 8px rgba(0,0,0,.4);
        -webkit-box-shadow: inset 0 3px 8px rgba(0,0,0,.4);
        box-shadow: inset 0 3px 8px rgba(0,0,0,.24);
    }

    .Noti_Green {
        background-color:rgba(55,188,155,1);
        font-size: 20px;
        color: transparent;
        text-shadow: 0px 2px 3px rgba(255,255,255,0.5);
        -webkit-background-clip: text;
        -moz-background-clip: text;
        background-clip: text;
    }
    .Noti_Red {
        background-color:rgba(218,68,83,1);
        font-size: 20px;
        color: transparent;
        text-shadow: 0px 2px 3px rgba(255,255,255,0.5);
        -webkit-background-clip: text;
        -moz-background-clip: text;
        background-clip: text;
    }
    .Noti_Blue {
        background-color:rgba(74,137,220,1);
        font-size: 20px;
        color: transparent;
        text-shadow: 0px 2px 3px rgba(255,255,255,0.5);
        -webkit-background-clip: text;
        -moz-background-clip: text;
        background-clip: text;
    }
    .Noti_Yellow {
        background-color:rgba(255,206,84,1);
        font-size: 20px;
        color: transparent;
        text-shadow: 0px 2px 3px rgba(255,255,255,0.5);
        -webkit-background-clip: text;
        -moz-background-clip: text;
        background-clip: text;

    }
    .Notification_selects h5 {
        padding:3px;
        margin:0px;
        font-size: 12px;
        color:inherit;
        text-align: left;
    }
    .New_Content_Noti {
        border-radius: 5px;
        background:#EC87C0;
        color:white;
        width:50px;
        height:100%;
        position: relative;

    }
    .Notification_selects h6 {
        padding:0px;
        margin:0px;
        color:darkgray;
        font-size: 10px;
        text-align: center;
    }
    .Notification_Container_Fab {
        width:250px;
        margin
        -webkit-box-shadow: 0px 0px 37px -5px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 37px -5px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 37px -5px rgba(0,0,0,0.75);
        display: inline-block;

        float:left;
        position: relative;


    }
    .Notification_load_containers {
        height:40vh;
        width:100%;
        position: relative;
    }
    .Feed_toggle {
        width:90%;
        display: inline-block;
        float:left;
        margin-left:auto;
        margin-right: auto;
        position: relative;
        height:50vh;

    }







    .Chat_Notification_Container h4 {
        color:gray;
    }

    .Chat_Container_Fab {
        width:200px;
        display: inline-block;
        position: relative;
        float:right;

        height:100%;

    }
    .Chat_Container_Fab_Head {
        position: relative;
        height:40px;
        display: inline-block;
        width:100%;

    }
    .Chat_Usr_Loop_Fab {
        width:100%;
        height:40px;
        padding:10px;
        color:gray;
        margin-top:5px;
        position: relative;
        transition:background 0.2s, color 0.2s;


    }
    .Chat_Usr_Loop_Fab:hover {
        background:rgba(0,0,0,0.3);
        transition:background 0.2s, color 0.2s;
        color:white;
        -moz-box-shadow: inset 0 3px 8px rgba(0,0,0,.4);
        -webkit-box-shadow: inset 0 3px 8px rgba(0,0,0,.4);
        box-shadow: inset 0 3px 8px rgba(0,0,0,.24);
    }
    .Chat_Usr_Loop_Fab img {
        height:40px;
        width:40px;
        display: inline-block;
        margin-left: auto;
        margin-right: auto;
        position: relative;
        border-radius: 50px;
    }
    .Chat_Live_Gray {
        font-size: 20px;
        background-color: #565656;
        color: transparent;
        display: inline-block;
        margin:3px;
        text-shadow: 0px 2px 3px rgba(255,255,255,0.5);
        -webkit-background-clip: text;
        -moz-background-clip: text;
        background-clip: text;

    }
    .Chat_Usr_Loop h5 {
        display: inline-block;
        color:inherit;

    }





    .Chat_Notification_Container_span {
        margin:2px;
        font-size: 20px;
        background-color: #565656;
        margin-top:5px;
        color: transparent;
        text-shadow: 0px 2px 3px rgba(255,255,255,0.5);
        -webkit-background-clip: text;
        -moz-background-clip: text;
        background-clip: text;
    }
    .Chat_Live {
        font-size: 20px;
        background-color: gray ;
        color: transparent;
        display: inline-block;
        margin:3px;
        text-shadow: 0px 2px 3px rgba(255,255,255,0.5);
        -webkit-background-clip: text;
        -moz-background-clip: text;
        background-clip: text;
    }
    .Chat_Ofline {
        font-size: 20px;
        background-color: black ;
        color: transparent;
        display: inline-block;
        margin:3px;
        text-shadow: 0px 2px 3px rgba(255,255,255,0.5);
        -webkit-background-clip: text;
        -moz-background-clip: text;
        background-clip: text;
    }
    .Search_Usr_Chat_Input {
        bottom:0px;
        float:bottom;
        height:40px;
        width:100%;
        position: fixed;
        width:18%;
        right:0px;
    }
    .Chat_Usr_Fab_Search {

        height:30px;
        width:200px;
        position: relative;
        border:0px;
        padding:0px;
        margin:0px;
        top:10px;
        float:right;
        background:#efefef;
        border-top:solid lightgray 1px;
        border-radius: 0px;

    }
    .Feed_toggle span {
        font-size: 15px;
        background-color: #565656;
        color: transparent;
        text-shadow: 0px 2px 3px rgba(255,255,255,0.5);
        -webkit-background-clip: text;
        -moz-background-clip: text;
        background-clip: text;
    }
    .Feed_Toggle_Row {

        margin-left:15px;
        border-radius: 5px;
        padding:5px;
    }
    .MsgInputHidden {
        display:none;
    }

    .ChatRowPop {
        width:auto;
        height:400px;
        right:17.666667%;;
        bottom:0px;
        position: fixed;
        z-index: 100;
    }
    .ChatActivePop {
        color:white;
        -moz-box-shadow:inset 0 3px 8px rgba(0,0,0,.4);
        -webkit-box-shadow:inset 0 3px 8px rgba(0,0,0,.4);
        box-shadow:inset 0 3px 8px rgba(0,0,0,.24);
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        height:100%;
        margin-right:8px;
        position: relative;
        width:250px;
        z-index: 500;
        float:right;
    }
    .ChatPopHead {
        width:100%;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        height:30px;
        padding:2px;
        color:white;
        -moz-box-shadow:inset 0 3px 8px rgba(0,0,0,.4);
        -webkit-box-shadow:inset 0 3px 8px rgba(0,0,0,.4);
        box-shadow:inset 0 3px 8px rgba(0,0,0,.24);
        background:rgba(74,137,220,0.8);

    }
    .ChatPopMsg {
        overflow-y:scroll;
        word-wrap: break-word;
        position: relative;
        height:80%;
        color:white;
        -moz-box-shadow:inset 0 3px 8px rgba(0,0,0,.4);
        -webkit-box-shadow:inset 0 3px 8px rgba(0,0,0,.4);
        box-shadow:inset 0 3px 8px rgba(0,0,0,.24);
        width:100%;
        background:rgba(67,74,84,0.8)
    }
    .message span {
        color:gray;
        font-weight: 300;
    }
    .ChatPopMsg iframe {
        width:90%;
        height:auto;
        position: relative;

    }
    .ChatPopFoot {
        width:100%;
        height:20%;
        background:#d9d9d9;
        bottom:0px;
    }
    .ChatPopFootTxt {
        resize: none;
        width:100%;
        height:30px;
        float:bottom;
        color:gray;
        border:0px;
        -moz-box-shadow: inset 0 3px 8px rgba(0,0,0,.4);
        -webkit-box-shadow: inset 0 3px 8px rgba(0,0,0,.4);
        box-shadow: inset 0 3px 8px rgba(0,0,0,.24);

    }
    .ChatMinPop {
        border:1px solid gray;

        height:30px;
        margin-top:270px;
        margin-right:8px;
        position: relative;
        width:250px;
        z-index: 500;
        float:right;
    }
    .Right_Chat_Cont {
        position: relative;

        width:100%;
        height:100%;
        z-index: 600;
        right:0px;color:white;	float:right;

    }

    .Chat_Header_Cont {
        position: relative;
        float:right;
        border-bottom:1px solid #ccc;
        width:100%;
        height:30px;
        color:white;
        padding:0px;
        margin-bottom:0px;
        right:0px;
    }

    .Chat_Usr_Cont {
        position: relative;
        float:right;
        margin-top:10px;
        overflow: scroll;
        width:100%;
        height:87%;

    }
    .Chat_Footer_Cont {
        position: fixed;
        float:right;
        width:200px;
        height:30px;
        right:0px;
        bottom:0px;
    }
    .Search_Usr {
        width:100%;
        height:30px;
        margin:0px;
        border-radius: 10px;
        float:bottom;
        padding:2px;
        border:0px;

        position: relative;
        font-size:10px;
        background-color:white;
    }

    .Chat_Usr_Loop {
        position: relative;
        width:100%;
        margin-left: auto;
        margin-right: auto;
        height:30px;
        margin-top:3px;
        padding:0px;

        background:#34495E;
    }
    .Chat_Usr_Loop:hover {
        background:#2980B9;
    }
    .Usr_Pic_Loop {
        width:30px;
        height:30px;
        border-radius: 5px;
        position: relative;
        display: inline-block;
        padding:0px;
        margin:0px;
    }

    .messages ul
    {
        padding: 0px;

        list-style-type: none;
    }

    .messages ul li
    {
        height: auto;
        margin-bottom: 10px;
        clear: both;
        padding-left: 10px;
        padding-right: 10px;
    }

    .messages ul li span
    {
        display: inline-block;
        max-width: 200px;
        background-color: ;
        padding: 5px;
        border-radius: 5px;
        margin-bottom: 10px;
        position: relative;
    }

    .messages ul li span.received
    {
        float: left;
    }

    .messages ul li span.received:after
    {
        content: "";
        display: inline-block;
        position: absolute;
        left: -8.5px;
        top: 7px;
        height: 0px;
        width: 0px;

    }

    .messages ul li span.received:before
    {
        content: "";
        display: inline-block;
        position: absolute;
        left: -9px;
        top: 7px;
        height: 0px;
        width: 0px;

    }

    .messages ul li span.sent:after
    {
        content: "";
        display: inline-block;
        position: absolute;
        right: -8px;
        top: 6px;
        height: 0px;
        width: 0px;

    }

    .messages ul li span.sent:before
    {
        content: "";
        display: inline-block;
        position: absolute;
        right: -9px;
        top: 6px;
        height: 0px;
        width: 0px;

    }

    .messages ul li span.sent
    {
        float: right;
        background-color: #158ffe;
        color:white;

    }


    .glyphicon-globe {
        background: rgb(218,63,83); /* Old browsers */
        background: -moz-linear-gradient(left,  rgba(218,63,83,1) 0%, rgba(55,188,155,1) 51%, rgba(55,188,155,1) 51%, rgba(74,137,220,1) 100%); /* FF3.6-15 */
        background: -webkit-linear-gradient(left,  rgba(218,63,83,1) 0%,rgba(55,188,155,1) 51%,rgba(55,188,155,1) 51%,rgba(74,137,220,1) 100%); /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(to right,  rgba(218,63,83,1) 0%,rgba(55,188,155,1) 51%,rgba(55,188,155,1) 51%,rgba(74,137,220,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#da3f53', endColorstr='#4a89dc',GradientType=1 ); /* IE6-9 */
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;/* IE6-9 */
    }
    .Notification_load_containers h4 {
        color:black;
        font-weight:400;
        font-size:14px;
    }
    .Feed_toggle h6 {
        color:white;
        font-weight:400;
        font-size:14px;
    }

    .ChatPopHead span {
        cursor: pointer;
        display:inline;
        font-size:15px;
        background-color: #565656;
        color: transparent;
        text-shadow: 0px 2px 3px rgba(255,255,255,0.5);
        -webkit-background-clip: text;
        -moz-background-clip: text;
        background-clip: text;
        margin:0px;
        padding:2px;
        float:right;
    }
    .Message_Pop_Min {
        height:30px;
        overflow:hidden;
        float:bottom;
        bottom:0px;
        top:270px;
    }
    .Message_Pop_Max {
        height:100%;
    }










    .ui {
        width: 205px;
        height: 100%;
        background-color: #fff;
        right:0px;
        position: fixed;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-direction: row;
        flex-direction: row;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        overflow: hidden;
    }
    .ui .search input {
        outline: none;
        border: none;
        background: none;
    }
    .ui .search {
        position: relative;
    }
    .ui .search input[type=submit] {
        font-family: 'FontAwesome';
        position: absolute;
        right: 25px;
        top: 27px;
        color: white;
    }
    .ui .search input[type=search] {
        background-color: #696c75;
        border-radius: 3px;
        padding: 10px;
        width: 90%;
        box-sizing: border-box;
        margin: 15px 10px;
        color: #fff;
    }
    .ui .left-menu {
        width: 100%;
        box-sizing: content-box;
        padding-right: 1%;
        height: 100%;
        background: #434753;
    }


    .ui .avatar > img,
    .ui .list-friends img {
        border-radius: 50%;
        border: 3px solid #696c75;
    }
    .ui .list-friends {
        list-style: none;
        font-size: 13px;
        height: 88%;
    }
    .ui .list-friends img {
        margin: 5px;
    }
    .ui .list-friends > li {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        transition: background 0.2s;

    }
    .ui .list-friends > li:hover {
        background:rgba(0,0,0,0.5);
        transition: background 0.2s;

    }
    .ui .list-friends .info {
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
    }
    .ui .list-friends .userrr {
        color: #fff;
        margin-top: 12px;
    }
    .ui .list-friends .status {
        position: relative;
        margin-left: 14px;
        color: #a8adb3;
    }
    .ui .list-friends .off:after,
    .ui .list-friends .on:after {
        content: '';
        left: -12px;
        top: 8px;
        position: absolute;
        height: 7px;
        width: 7px;
        border-radius: 50%;
    }
    .ui .list-friends .off:after {
        background: #fd8064;
    }
    .ui .list-friends .on:after {
        background: #62bf6e;
    }
    .ui .top {
        height: 70px;
    }
    .ui .messages {
        height: calc(100% - 70px - 150px);
        list-style: none;
        border: 2px solid #fff;
        border-left: none;
        border-right: none;
    }
    .ui .messages li {
        margin: 10px;
        -webkit-transition: all .5s;
        transition: all .5s;
    }
    .ui .messages li:after {
        content: '';
        clear: both;
        display: block;
    }
    .ui .messages li .head {
        font-size: 13px;
    }
    .ui .messages li .name {
        font-weight: 600;
        position: relative;
    }
    .ui .messages li .name:after {
        content: '';
        position: absolute;
        height: 8px;
        width: 8px;
        border-radius: 50%;
        top: 6px;
    }
    .ui .messages li .time {
        color: #b7bccf;
    }
    .ui .messages li .message {
        margin-top: 20px;
        color: #fff;
        font-size: 15px;
        border-radius: 3px;
        padding: 20px;
        line-height: 25px;
        max-width: 500px;
        word-wrap: break-word;
        position: relative;
    }
    .ui .messages li .message:before {
        content: '';
        position: absolute;
        width: 0px;
        height: 0px;
        top: -12px;
        border-bottom: 12px solid #62bf6e;
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
    }
    .ui .messages li.friend-with-a-SVAGina .name {
        margin-left: 20px;
    }
    .ui .messages li.friend-with-a-SVAGina .name:after {
        background-color: #62bf6e;
        left: -20px;
        top: 6px;
    }
    .ui .messages li.friend-with-a-SVAGina .message {
        background-color: #62bf6e;
        float: left;
    }
    .ui .messages li.friend-with-a-SVAGina .message:before {
        left: 16px;
        border-bottom-color: #62bf6e;
    }
    .ui .messages li.i .head {
        text-align: right;
    }
    .ui .messages li.i .name {
        margin-right: 20px;
    }
    .ui .messages li.i .name:after {
        background-color: #7bc4ef;
        right: -20px;
        top: 6px;
    }
    .ui .messages li.i .message {
        background-color: #7bc4ef;
        float: right;
    }
    .ui .messages li.i .message:before {
        right: 16px;
        border-bottom-color: #7bc4ef;
    }
    .ui .write-form {
        height: 150px;
    }
    .ui .write-form textarea {
        height: 75px;
        margin: 17px 5%;
        width: 90%;
        outline: none;
        padding: 15px;
        border: none;
        border-radius: 3px;
        resize: none;
    }
    .ui .write-form textarea:before {
        content: '';
        clear: both;
    }
    .ui .avatar > img {
        border-color: #62bf6e;
        margin: 10px;
        margin-right: 5px;
    }
    .ui .avatar {
        display: inline-block;
    }
    .ui .send {
        color: #7ac5ef;
        text-transform: uppercase;
        font-weight: 700;
        float: right;
        margin-right: 5%;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .ui i.fa-file-o {
        margin-left: 15px;
    }
    .ui i.fa-picture-o {
        margin-left: 5%;
    }
</style>
<style>
    .Chattt {
        display: inline-block;
    }
    .Chattt a { text-decoration: none; }

    .Chattt fieldset {
        border: 0;
        margin: 0;
        padding: 0;
    }

    .Chattt h4, .Chattt h5 {
        line-height: 1.5em;
        margin: 0;
    }

    .Chattt hr {
        background: #e9e9e9;
        border: 0;
        -moz-box-sizing: content-box;
        box-sizing: content-box;
        height: 1px;
        margin: 0;
        min-height: 1px;
    }

    .Chattt img {
        border: 0;
        display: block;
        height: auto;
        max-width: 100%;
    }

    .Chattt input {
        border: 0;
        color: inherit;
        font-family: inherit;
        font-size: 100%;
        line-height: normal;
        margin: 0;
    }

    .Chattt p { margin: 0; }

    .clearfix { *zoom: 1; } /* For IE 6/7 */
    .clearfix:before, .clearfix:after {
        content: "";
        display: table;
    }
    .clearfix:after { clear: both; }

    /* ---------- LIVE-CHAT ---------- */

    #live-chat {
        font-size: 12px;
        position: fixed;
        width: 300px;
        height:400px;
        background:white;
    }

    #live-chat header {
        background: #293239;
        border-radius: 5px 5px 0 0;
        color: #fff;
        cursor: pointer;
        padding: 16px 24px;
    }

    #live-chat h4:before {
        background: #1a8a34;
        border-radius: 50%;
        content: "";
        display: inline-block;
        height: 8px;
        margin: 0 8px 0 0;
        width: 8px;
    }

    #live-chat h4 {
        font-size: 12px;
    }

    #live-chat h5 {
        font-size: 10px;
    }

    #live-chat form {
        padding: 24px;
        bottom:0px;
        position: fixed;
    }

    #live-chat input[type="text"] {
        border: 1px solid #ccc;
        border-radius: 3px;
        padding: 8px;
        outline: none;
        width: 234px;
    }

    .chat-message-counter {
        background: #e62727;
        border: 1px solid #fff;
        border-radius: 50%;
        display: none;
        font-size: 12px;
        font-weight: bold;
        height: 28px;
        left: 0;
        line-height: 28px;
        margin: -15px 0 0 -15px;
        position: absolute;
        text-align: center;
        top: 0;
        width: 28px;
    }

    .chat-close {
        background: #1b2126;
        border-radius: 50%;
        color: #fff;
        display: block;
        float: right;
        font-size: 10px;
        height: 16px;
        line-height: 16px;
        margin: 2px 0 0 0;
        text-align: center;
        width: 16px;
    }

    .chatsss {
        background: #fff;
    }

    .chat-history {
        height: 252px;
        padding: 8px 24px;
        overflow-y: scroll;
    }

    .chat-message {
        margin: 16px 0;
    }

    .chat-message img {
        border-radius: 50%;
        float: left;
    }

    .chat-message-content {
        margin-left: 56px;
    }

    .chat-time {
        float: right;
        font-size: 10px;
    }

    .chat-feedback {
        font-style: italic;
        margin: 0 0 0 80px;
        bottom:0px;
        position: relative;
    }
</style>

<div class="chat_container clearfix" style="padding:0px;">
    <div class="people-list" id="people-list">
        <div class="search">
            <input type="text" placeholder="Search.." />
            <i class="fa fa-search"></i>
        </div>
        <ul style="list-style: none;padding:0px;" class="list">
            @foreach(Friends::if("sender","=",Auth::user()->id)->as("user_id")->where("status","=",1)->where("sender","=",Auth::user()->id)->orWhere("recipient","=",Auth::user()->id)->where()->get() as $user_friends)


                <?php

                $users = $conn->query("SELECT IF(friends.sender = ".$_SESSION["user"].", friends.recipient, friends.sender)
            AS user_id FROM friends WHERE friends.status=1 AND friends.sender = ".$_SESSION["user"]." OR friends.recipient = ".$_SESSION["user"]." AND friends.status=1 ");?>
                <?php while($friend = $users->fetch_object()): ?>
                <?php  $friends = $conn->query("SELECT firstname, lastname, username, id FROM users WHERE id = $friend->user_id "); ?>
                <?php while($FriendName = $friends->fetch_object()): ?>


                <?php $profile_image = $conn->query("SELECT id, post_id, relation, userID, file_format FROM media WHERE userID = $friend->user_id AND relation = 'profile_picture' UNION ALL SELECT -1 id, '55529055162cf' post_id, 'profile_picture' relation, '0' userID, 'png' file_format ORDER BY id DESC LIMIT 1"); ?>
                <?php while($pimage = $profile_image->fetch_object()): ?>


                <li class="clearfix" onClick="openPopup('<?= $FriendName->id ?>');">
                    <img  style="height:40px;width:40px;" src="uploads/<?= $pimage->post_id ?>.<?= $pimage->file_format ?>" />
                    <div class="about">
                        <div class="name"><?= $FriendName->firstname ?> <?= $FriendName->lastname ?> <?= $FriendName->username ?></div>
                        <div class="status">
                        </div>
                    </div>
                </li>


                <?php endwhile;?>
                <?php endwhile;?>
                <?php endwhile;?>

        </ul>
    </div>


    <script>
        $(function() {
            $(document).on('submit', 'form#SendForm', function(e){
                e.preventDefault();
                $.post('elements/sendmessagefriend.php', $(this).serialize(), function (data) {
                    // This is executed when the call to mail.php was succesful.
                    // 'data' contains the response from the request
                    $('#message').val('');
                })
                    .error(function() {
                        $('#message').val('');
                    });
                e.preventDefault();
                $('#message').val('');
            })

        });
        $(document).ready(function(){

            $('div.message-window').each(function(index, messageWindow) {
                messageWindow = $(messageWindow);
                // Run fetchMessages() once, when the page is loaded.
                fetchMessages(messageWindow);
                // Set an interval timer for checking messages.
                // Not ideal, but it works for now.
                setInterval(fetchMessages, 4000, messageWindow);
                // in milliseconds!!!!!! (1000ms = 1s)
            });
        });
        function fetchMessages(messageWindow) {
            // For each message window, check for new chats
            // Get the friend_id from the window
            var friend_id = messageWindow.attr("friend_id");
            // Get the last chat message_id from the last chat message in this window.
            var last_message_id = messageWindow.find("ul > li:last").attr("message_id");
            // Ask the server for the latest messages.
            // Send over the friend_id and last_message_id, so it can send back new messages from this friend.
            $.get("elements/chatload.php", {
                last_message_id: last_message_id,
                friend_id: friend_id
            }, function(messages) {
                // This function is run when the AJAX request succeeds.
                // Append the new messages to the end of the chat
                messageWindow.find("ul").append(messages);
            });
        }
        function openPopup(ID) {
            $('.popup');
            $("#" + ID).fadeIn(200);
        }
        function closePopup(ID) {
            $('.popup');
            $("#" + ID).fadeOut(300);
        }
        function MinPopup(ID) {
            $('.popup');
            $("#" + ID).slideToggle(300, 'swing');
        }
        function UpPopup(ID) {
            $('.popup');
            $("#" + ID).addClass('Message_Pop_Max').removeClass('Message_Pop_Min');
        }


    </script>






