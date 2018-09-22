@extends('layouts.public', ["title" => "Contact", "sidebar" => false])

@section("content")
    <style>

        .container_contact {
            max-width:400px;
            width:100%;
            margin:0 auto;
            position:relative;
        }

        #contact input[type="text"], #contact input[type="email"], #contact input[type="tel"], #contact input[type="url"], #contact textarea, #contact button[type="submit"] { font:400 12px/16px "Open Sans", Helvetica, Arial, sans-serif; }

        #contact {
            background:#F9F9F9;
            padding:25px;
            margin:50px 0;
        }

        #contact h3 {
            color: #F96;
            display: block;
            font-size: 30px;
            font-weight: 400;
        }

        #contact h4 {
            margin:5px 0 15px;
            display:block;
            font-size:13px;
        }

        fieldset {
            border: medium none !important;
            margin: 0 0 10px;
            min-width: 100%;
            padding: 0;
            width: 100%;
        }

        #contact input[type="text"], #contact input[type="email"], #contact input[type="tel"], #contact input[type="url"], #contact textarea {
            width:100%;
            border:1px solid #CCC;
            background:#FFF;
            margin:0 0 5px;
            padding:10px;
        }

        #contact input[type="text"]:hover, #contact input[type="email"]:hover, #contact input[type="tel"]:hover, #contact input[type="url"]:hover, #contact textarea:hover {
            -webkit-transition:border-color 0.3s ease-in-out;
            -moz-transition:border-color 0.3s ease-in-out;
            transition:border-color 0.3s ease-in-out;
            border:1px solid #AAA;
        }

        #contact textarea {
            height:100px;
            max-width:100%;
            resize:none;
        }

        #contact button[type="submit"] {
            cursor:pointer;
            width:100%;
            border:none;
            background:#0CF;
            color:#FFF;
            margin:0 0 5px;
            padding:10px;
            font-size:15px;
        }

        #contact button[type="submit"]:hover {
            background:#09C;
            -webkit-transition:background 0.3s ease-in-out;
            -moz-transition:background 0.3s ease-in-out;
            transition:background-color 0.3s ease-in-out;
        }

        #contact button[type="submit"]:active { box-shadow:inset 0 1px 3px rgba(0, 0, 0, 0.5); }

        #contact input:focus, #contact textarea:focus {
            outline:0;
            border:1px solid #999;
        }
        ::-webkit-input-placeholder {
            color:#888;
        }
        :-moz-placeholder {
            color:#888;
        }
        ::-moz-placeholder {
            color:#888;
        }
        :-ms-input-placeholder {
            color:#888;
        }
    </style>
    <div class="col-8" style="overflow-y:scroll;margin-top:60px;padding:10px;background:#efefef;height:100vh;color:black;">
        <div class="container">
            <form id="contact" action="{{ URL::route("contact.send") }}" method="POST">
                <h3>Contact Facesmash</h3>
                <fieldset>
                    <input placeholder="Subject" name="subject" type="text" tabindex="4" required>
                </fieldset>
                <fieldset>
                    <textarea type="text" name="message" placeholder="Type your question here...." tabindex="5" required></textarea>
                </fieldset>
                <fieldset>
                    <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
                </fieldset>
            </form>


        </div>
    </div>
@stop