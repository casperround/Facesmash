@extends('layouts.admin', ["title" => "Contact Messages", "sidebar" => false])

@section('content')
    <h1>Contact Messages</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Time</th>
            <th>Date</th>
            <th>User ID</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            @foreach ($contact as $msg)
                <tr>
                    <td>{{{ User::where("id", "=", $msg->sender)->pluck("username") }}}</td>
                    <td>{{{ User::where("id", "=", $msg->sender)->pluck("email") }}}</td>
                    <td>{{{ $msg->subject }}}</td>
                    <td>{{{ $msg->message }}}</td>
                    <td>{{{ $msg->time }}}</td>
                    <td>{{{ $msg->date }}}</td>
                    <td>{{{ $msg->sender }}}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

@stop