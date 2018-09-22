@extends('layouts.admin', ["title" => "Channels", "sidebar" => false])

@section('content')
    <h1>Channels</h1>
    <p><span style="color: red">We only show the last 100 registered so not overload the DB server</span></p>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Creation date</th>
            <th>Creation time</th>
            <th>Author ID</th>
            <th>Author Name</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @if ($channels->count() > 0)
            @foreach ($channels as $channel)
                <tr>
                    <td>{{{ $channel->unique_channelname }}}</td>
                    <td>{{{ $channel->category }}}</td>
                    <td>{{{ $channel->post_date }}}</td>
                    <td>{{{ $channel->post_time }}}</td>
                    <td>{{{ $channel->owner_id }}}</td>
                    <td>{{{ User::where("id", "=", $channel->owner_id)->pluck("username") }}}</td>
                    <td><a href="{{ URL::route('admin.channel', [$channel->id]) }}" class="btn btn-primary">View Channel</a></td>
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