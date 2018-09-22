@extends('layouts.admin', ["title" => "Groups", "sidebar" => false])

@section('content')
    <h1>Groups</h1>
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
        @if ($groups->count() > 0)
            @foreach ($groups as $group)
                <tr>
                    <td>{{{ $group->unique_groupname }}}</td>
                    <td>{{{ $group->category }}}</td>
                    <td>{{{ $group->post_date }}}</td>
                    <td>{{{ $group->post_time }}}</td>
                    <td>{{{ $group->owner_id }}}</td>
                    <td>{{{ User::where("id", "=", $group->owner_id)->pluck("username") }}}</td>
                    <td><a href="{{ URL::route('admin.group', [$group->id]) }}" class="btn btn-primary">View Group</a></td>
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