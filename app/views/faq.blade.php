@extends('layouts.public', ["title" => "FAQ", "sidebar" => false])
<style>
    main{
        display:block;
        position:relative;
        box-sizing:border-box;
        padding:30px;
        width:100%;
        max-width:920px;
        background-color:#fff;
        margin:0 auto;
        margin-top:50px;
        box-shadow:0px 0px 5px rgba(0,0,0,0.1);
    }

    .topic{
        padding:20px;
        padding-top:0px;
        padding-bottom:0px;
        border-bottom:solid 1px #ebebeb;
    }
    .open{
        cursor:pointer;
        display:block;
        padding:0px;
    }
    .open:hover{
        opacity:0.7;
    }
    .expanded{
        background-color:#f5f5f5;
        transition: all .3s ease-in-out;
    }
    .question{
        padding-top:30px;
        padding-right: 40px;
        padding-bottom:20px;
        font-size: 18px;
        font-weight:500;
        color: #526ee4;
    }
    .answer{
        font-size:16px;
        line-height:26px;
        display:none;
        color:black;
        margin-bottom:30px;
        text-align:justify;
        padding-left:20px;
        padding-right:20px;
    }
    .faq-t{
        -moz-transform: rotate(-45deg);
        -ms-transform: rotate(-45deg);
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg);
        display: inline-block;
        float:right;
        position:relative;
        top:-55px;
        right:10px;
        width: 10px;
        height: 10px;
        background: transparent;
        border-left: 2px solid #ccc;
        border-bottom: 2px solid #ccc;
        transition: all .3s ease-in-out;
    }
    .faq-o{
        top:-50px;
        -moz-transform: rotate(-224deg);
        -ms-transform: rotate(-224deg);
        -webkit-transform: rotate(-224deg);
        transform: rotate(-224deg);
    }
    @media only screen and (max-width: 480px) {
        .faq-t{display:none;}
        .question{
            padding-right: 0px;
        }
        main{
            padding:10px;
        }
        .answer{
            margin-bottom:30px;
            padding-left:0px;
            padding-right:0px;
        }
    }
</style>
@section("content")
    @if (Auth::check())
        <div class="col-8" style="overflow-y:scroll;margin-top:60px;padding:10px;background:#efefef;height:100vh;">
            @else
                <div class="container-fluid">
                    @endif
                    <div class="col-md" style="overflow-y:scroll;margin-top:10px;padding:10px;background:#efefef;height:100vh;">
                        <main style="margin-bottom:50px;">
                            <h1 style="color:black">Frequently Asked Questions</h1>
                            <div class="topic">
                                <div class="open">
                                    <h2 class="question">1. How do I change the publicity settings on my post?</h2>
                                    <span class="faq-t"></span>
                                </div>
                                <p class="answer">Click the visibility dropdown <select class="form-control" name="visibility">
                                        <option value="1" selected>Public</option>
                                        <option value="2">Friends & Friends of friends</option>
                                        <option value="3">Friends</option>
                                        <option value="4">Only me</option>
                                    </select> and select your option before posting</p></div>
                            <div class="topic">
                                <div class="open">
                                    <h2 class="question">2. How to I create a channel?
                                    </h2><span class="faq-t"></span>
                                </div>
                                <p class="answer">To create a channel, must be logged in. Go to the "My Channels" Section and click this button <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Create a new channel
                                    </button> to make a new one. This will give you a list of details and options. Please use "na" in the fields you dont have an answer for</p></div>
                            <div class="topic">
                                <div class="open">
                                    <h2 class="question">3. What are the channel types?
                                    </h2><span class="faq-t"></span>
                                </div>
                                <p class="answer">Current channel types are as follows: Video, Photography, Music, Art. These different types of channels change the style and look of the page.
                                Videos is a channel dedicated to video content or vlogging. Photography adds a portfolio style to your channel. Music adds a playlist & album feature to the channel</p></div>
                            <div class="topic">
                                <div class="open">
                                    <h2 class="question">4. How can I add a friend?
                                    </h2><span class="faq-t"></span>
                                </div>
                                <p class="answer">Simply just search your friends name into the search bar, click on his/hers profile and "Add Friend"</p></div>
                            <div class="topic">
                                <div class="open">
                                    <h2 class="question">5. How can I create a page?
                                    </h2><span class="faq-t"></span>
                                </div>
                                <p class="answer">You can create a page the same way as a channel, group or event, go to "My Pages" and click <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Create a new Page
                                    </button> button</p>
                            </div>
                            <div class="topic">
                                <div class="open">
                                    <h2 class="question">6. How can I contact your website about a problem or bug?
                                    </h2><span class="faq-t"></span>
                                </div>
                                <p class="answer">Head over to the "Contact" page and fill out the form. We will get back to you and the problem/bug at hand right away</p>
                            </div>
                            <div class="topic">
                                <div class="open">
                                    <h2 class="question">7. I can't see my channel in the discover page? Why is this?
                                    </h2><span class="faq-t"></span>
                                </div>
                                <p class="answer">You might have set the channel as non public. This means anyone who isn't logged in or anyone who is for the matter won't be able to see your channel. Unless it's set to public</p>
                            </div>
                            <div class="topic">
                                <div class="open">
                                    <h2 class="question">8. How can I edit my persional information and link my accounts?
                                    </h2><span class="faq-t"></span>
                                </div>
                                <p class="answer">Go to "My profile" then head on over to the button "Account details" This will allow you to change your email, password, social accounts. Add or link accounts</p>
                            </div>
                        </main>
                        <script src='//static.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
                        <script >
                            $(".open").click( function () {
                                var container = $(this).parents(".topic");
                                var answer = container.find(".answer");
                                var trigger = container.find(".faq-t");

                                answer.slideToggle(200);

                                if (trigger.hasClass("faq-o")) {
                                    trigger.removeClass("faq-o");
                                }
                                else {
                                    trigger.addClass("faq-o");
                                }

                                if (container.hasClass("expanded")) {
                                    container.removeClass("expanded");
                                }
                                else {
                                    container.addClass("expanded");
                                }
                            });
                        </script>
                    </div>
                    @if (Auth::check())
                </div>
                @else
        </div>
    @endif
@stop