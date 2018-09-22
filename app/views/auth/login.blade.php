@extends('layouts.auth', ["title" => "Login", "sidebar" => false])

@section('content')
    <style>
        form {
            padding: 20px 0;
            position: relative;
            z-index: 2;
        }
        form input {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            outline: 0;
            border: 1px solid rgba(255, 255, 255, 0.4);
            background-color: rgba(255, 255, 255, 0.2);
            width: 250px;
            border-radius: 3px;
            padding: 10px 15px;
            margin: 0 auto 10px auto;
            display: block;
            text-align: center;
            font-size: 18px;
            color: white;
            -webkit-transition-duration: 0.25s;
            transition-duration: 0.25s;
            font-weight: 300;
        }
        form input:hover {
            background-color: rgba(255, 255, 255, 0.4);
        }
        form input:focus {
            background-color: white;
            width: 300px;
            color: #53e3a6;
        }
    </style>

    <img style="height:25%;" src="{{ URL::to("assets/img/logo_back.png") }}"/>

    <h2>Login</h2>
    <form action="https://facesmash.co.uk/auth/doLogin" method="POST">

        <label for="username">Username</label>
        <input type="text" id="username" name="username" class="username" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <input type="submit" name="login" value="Login" class="button">

        <a href="{{ URL::route("register") }}"><p class="button_side">Or Register</p></a>
    </form>

    <a href="{{ URL::route("discover") }}"><input type="submit" name="discover" value="Discover" class="button"></a>

@stop