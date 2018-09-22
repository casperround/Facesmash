@extends('layouts.public', ["title" => "My Pages", "sidebar" => false])

@section("content")
    @if (Auth::check())
        <div class="col-8" style="overflow-y:scroll;margin-top:60px;padding:10px;background:#efefef;height:100vh;">
            @endif
            <div class="col-md" style="overflow-y:scroll;margin-top:10px;padding:10px;background:#efefef;height:100vh;">


                <div class="info" style="margin-bottom: 20px">
                    <div class="buttons">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Create a new Page
                        </button>
                        @if ($errors->has('unique_pagename'))
                            @foreach ($errors->get('unique_pagename') as $error)
                                <p class="text-danger">{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><span style="color: black">New Page</span></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="color: black">
                                <form enctype="multipart/form-data"  action="{{ URL::route("pages.userPagesNewPage") }}" method="POST">

                                    <div class="form-group">
                                        <label for="unique_pagename">Page Name</label>
                                        <input type="text" id="unique_pagename" name="unique_pagename" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="about">About your Page</label>
                                        <input type="text" id="about" name="about" class="form-control" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="website">Your website link</label>
                                        <input type="text" id="website" name="website" class="form-control" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="twitter">Twitter Name/Handle</label>
                                        <input type="text" id="twitter" name="twitter" class="form-control" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="facebook">Facebook name</label>
                                        <input type="text" id="facebook" name="facebook" class="form-control" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="youtube">Youtube Channel Name</label>
                                        <input type="text" id="youtube" name="youtube" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control" name="visibility">
                                            <option value="1">Public</option>
                                            <option value="2">Friends & Friends of friends</option>
                                            <option value="3">Friends</option>
                                            <option value="4" selected>Only me</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Page Category</label>
                                        <select name="category" class="form-control">
                                            <option value="1">Local Business or Place</option>
                                            <option value="2">Company Organization or Institution</option>
                                            <option value="3">Brand or Product</option>
                                            <option value="4" selected>Artist, Band or Public Figure</option>
                                            <option value="5" selected>Entertainment</option>
                                            <option value="6" selected>Cause or Community
                                            </option>
                                        </select>
                                    </div>
                                    <label for="category">Cover Photo</label>
                                    <input name="file_upload_banner" class="form-control" type="file" onchange="readURL(this);" >
                                    <img id="cover" src="#" style="box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.75);margin: 20px;" alt="your image">
                                    <script>
                                        function readURL(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();

                                                reader.onload = function (e) {
                                                    $('#cover')
                                                        .attr('src', e.target.result)
                                                        .width(150)
                                                        .height(auto);
                                                };
                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }
                                    </script><br/>
                                    <label for="category">Page Photo</label>
                                    <input name="file_upload_profile" class="form-control" type="file" onchange="readURLL(this);" >
                                    <img id="profile" src="#" style="box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.75);margin: 20px;" alt="your image">
                                    <script>
                                        function readURLL(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();

                                                reader.onload = function (e) {
                                                    $('#profile')
                                                        .attr('src', e.target.result)
                                                        .width(150)
                                                        .height(auto);
                                                };
                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }
                                    </script>
                                    <button type="submit" name="login" value="Create Page" class="btn btn-primary">Create</button>
                                    {{ Form::token() }}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-columns">
                    <div class="col-md">
                        @foreach(Pages::where("owner_id", "=", Auth::user()->id)->get() as $pages)
                                    <a href="{{ URL::route("pagesview", $pages->unique_pagename) }}"><div class="card">
                                            <img class="card-img-top" src="{{ URL::to($pages->banner_img_path) }}" alt="Card image cap">
                                    <div class="card-body">
                                        <center><i style="color:#ED5565" class="far fa-file-alt"></i><p style="font-size:20px;font-weight:bold;color:black;" class="card-text">{{ $pages->unique_pagename }}</p></center>
                                    </div>
                                    </div></a>
                            @endforeach
                    </div>
                </div>
            </div>
            <script src='//static.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
            <script >var Modal = (function() {

                    var trigger = $qsa('.modal__trigger'); // what you click to activate the modal
                    var modals = $qsa('.modal'); // the entire modal (takes up entire window)
                    var modalsbg = $qsa('.modal__bg'); // the entire modal (takes up entire window)
                    var content = $qsa('.modal__content'); // the inner content of the modal
                    var closers = $qsa('.modal__close'); // an element used to close the modal
                    var w = window;
                    var isOpen = false;
                    var contentDelay = 400; // duration after you click the button and wait for the content to show
                    var len = trigger.length;

                    // make it easier for yourself by not having to type as much to select an element
                    function $qsa(el) {
                        return document.querySelectorAll(el);
                    }

                    var getId = function(event) {

                        event.preventDefault();
                        var self = this;
                        // get the value of the data-modal attribute from the button
                        var modalId = self.dataset.modal;
                        var len = modalId.length;
                        // remove the '#' from the string
                        var modalIdTrimmed = modalId.substring(1, len);
                        // select the modal we want to activate
                        var modal = document.getElementById(modalIdTrimmed);
                        // execute function that creates the temporary expanding div
                        makeDiv(self, modal);
                    };

                    var makeDiv = function(self, modal) {

                        var fakediv = document.getElementById('modal__temp');

                        /**
                         * if there isn't a 'fakediv', create one and append it to the button that was
                         * clicked. after that execute the function 'moveTrig' which handles the animations.
                         */

                        if (fakediv === null) {
                            var div = document.createElement('div');
                            div.id = 'modal__temp';
                            self.appendChild(div);
                            moveTrig(self, modal, div);
                        }
                    };

                    var moveTrig = function(trig, modal, div) {
                        var trigProps = trig.getBoundingClientRect();
                        var m = modal;
                        var mProps = m.querySelector('.modal__content').getBoundingClientRect();
                        var transX, transY, scaleX, scaleY;
                        var xc = w.innerWidth / 2;
                        var yc = w.innerHeight / 2;

                        // this class increases z-index value so the button goes overtop the other buttons
                        trig.classList.add('modal__trigger--active');

                        // these values are used for scale the temporary div to the same size as the modal
                        scaleX = mProps.width / trigProps.width;
                        scaleY = mProps.height / trigProps.height;

                        scaleX = scaleX.toFixed(3); // round to 3 decimal places
                        scaleY = scaleY.toFixed(3);


                        // these values are used to move the button to the center of the window
                        transX = Math.round(xc - trigProps.left - trigProps.width / 2);
                        transY = Math.round(yc - trigProps.top - trigProps.height / 2);

                        // if the modal is aligned to the top then move the button to the center-y of the modal instead of the window
                        if (m.classList.contains('modal--align-top')) {
                            transY = Math.round(mProps.height / 2 + mProps.top - trigProps.top - trigProps.height / 2);
                        }


                        // translate button to center of screen
                        trig.style.transform = 'translate(' + transX + 'px, ' + transY + 'px)';
                        trig.style.webkitTransform = 'translate(' + transX + 'px, ' + transY + 'px)';
                        // expand temporary div to the same size as the modal
                        div.style.transform = 'scale(' + scaleX + ',' + scaleY + ')';
                        div.style.webkitTransform = 'scale(' + scaleX + ',' + scaleY + ')';


                        window.setTimeout(function() {
                            window.requestAnimationFrame(function() {
                                open(m, div);
                            });
                        }, contentDelay);

                    };

                    var open = function(m, div) {

                        if (!isOpen) {
                            // select the content inside the modal
                            var content = m.querySelector('.modal__content');
                            // reveal the modal
                            m.classList.add('modal--active');
                            // reveal the modal content
                            content.classList.add('modal__content--active');

                            /**
                             * when the modal content is finished transitioning, fadeout the temporary
                             * expanding div so when the window resizes it isn't visible ( it doesn't
                             * move with the window).
                             */

                            content.addEventListener('transitionend', hideDiv, false);

                            isOpen = true;
                        }

                        function hideDiv() {
                            // fadeout div so that it can't be seen when the window is resized
                            div.style.opacity = '0';
                            content.removeEventListener('transitionend', hideDiv, false);
                        }
                    };

                    var close = function(event) {

                        event.preventDefault();
                        event.stopImmediatePropagation();

                        var target = event.target;
                        var div = document.getElementById('modal__temp');

                        /**
                         * make sure the modal__bg or modal__close was clicked, we don't want to be able to click
                         * inside the modal and have it close.
                         */

                        if (isOpen && target.classList.contains('modal__bg') || target.classList.contains('modal__close')) {

                            // make the hidden div visible again and remove the transforms so it scales back to its original size
                            div.style.opacity = '1';
                            div.removeAttribute('style');

                            /**
                             * iterate through the modals and modal contents and triggers to remove their active classes.
                             * remove the inline css from the trigger to move it back into its original position.
                             */

                            for (var i = 0; i < len; i++) {
                                modals[i].classList.remove('modal--active');
                                content[i].classList.remove('modal__content--active');
                                trigger[i].style.transform = 'none';
                                trigger[i].style.webkitTransform = 'none';
                                trigger[i].classList.remove('modal__trigger--active');
                            }

                            // when the temporary div is opacity:1 again, we want to remove it from the dom
                            div.addEventListener('transitionend', removeDiv, false);

                            isOpen = false;

                        }

                        function removeDiv() {
                            setTimeout(function() {
                                window.requestAnimationFrame(function() {
                                    // remove the temp div from the dom with a slight delay so the animation looks good
                                    div.remove();
                                });
                            }, contentDelay - 50);
                        }

                    };

                    var bindActions = function() {
                        for (var i = 0; i < len; i++) {
                            trigger[i].addEventListener('click', getId, false);
                            closers[i].addEventListener('click', close, false);
                            modalsbg[i].addEventListener('click', close, false);
                        }
                    };

                    var init = function() {
                        bindActions();
                    };

                    return {
                        init: init
                    };

                }());

                Modal.init();
                //# sourceURL=pen.js
            </script>
            @if (Auth::check())
        </div>
    @endif
@stop