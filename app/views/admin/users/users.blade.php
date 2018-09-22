@extends('layouts.admin', ["title" => "Users", "sidebar" => false])

@section('content')
    <h1>Users</h1>
    <p><span style="color: red">We only show the last 100 registered so not overload the DB server</span></p>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @if ($users->count() > 0)
            @foreach ($users as $user)
                <tr>
                    <td>{{{ $user->username }}}</td>
                    <td>{{{ $user->email }}}</td>
                    <td>{{{ $user->first_name }}}</td>
                    <td>{{{ $user->last_name }}}</td>
                    <td><a href="{{ URL::route('admin.user', [$user->id]) }}" class="btn btn-primary">View User</a></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4">
                    Nothing to show.
                </td>
            </tr>
        @endif
        </tbody>
    </table>
@stop