@extends('layouts.admin', ["title" => "Flags", "sidebar" => false])

@section('content')
    <h1>Flagged</h1>
    <h3>Pages</h3>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Page Name</th>
            <th>Relation</th>
            <th>Author Name</th>
            <th>Author ID</th>
            <th>Flag Reporter name</th>
            <th>Flag reporter ID</th>
        </tr>
        </thead>
        <tbody>
        @if ($flags->count() > 0)
            @foreach ($flags as $flag)
                @if($flag->relation == "page" && $flag->relation_id == (Pages::where("id", "=", $flag->relation_id)->pluck("id")))
                <tr>
                    <td>{{{ Pages::where("id", "=",$flag->relation_id)->pluck("unique_pagename") }}}</td>
                    <td>{{{ $flag->relation }}}</td>
                    <td>{{{ User::where("id", "=", Pages::where("id", "=", $flag->relation_id)->pluck("owner_id"))->pluck("username") }}}</td>
                    <td>{{{ User::where("id", "=", Pages::where("id", "=", $flag->relation_id)->pluck("owner_id"))->pluck("id") }}}</td>
                    <td>{{{ User::where("id", "=", $flag->reporter_id)->pluck("username") }}}</td>
                    <td>{{{ $flag->reporter_id }}}</td>
                    <td><a href="{{ URL::route("admin.pageview", [Pages::where("id", "=", $flag->relation_id)->pluck("id")]) }}" class="btn btn-primary">View Page</a></td>
                    </tr>
                @endif
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


    <h3>Channels</h3>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Channel Name</th>
            <th>Relation</th>
            <th>Author Name</th>
            <th>Author ID</th>
            <th>Flag Reporter name</th>
            <th>Flag reporter ID</th>
        </tr>
        </thead>
        <tbody>
        @if ($flags->count() > 0)
            @foreach ($flags as $flag)
                @if($flag->relation == "channel" && $flag->relation_id == (Channels::where("id", "=", $flag->relation_id)->pluck("id")))
                    <tr>
                        <td>{{{ Channels::where("id", "=",$flag->relation_id)->pluck("unique_channelname") }}}</td>
                        <td>{{{ $flag->relation }}}</td>
                        <td>{{{ User::where("id", "=", Channels::where("id", "=", $flag->relation_id)->pluck("owner_id"))->pluck("username") }}}</td>
                        <td>{{{ User::where("id", "=", Channels::where("id", "=", $flag->relation_id)->pluck("owner_id"))->pluck("id") }}}</td>
                        <td>{{{ User::where("id", "=", $flag->reporter_id)->pluck("username") }}}</td>
                        <td>{{{ $flag->reporter_id }}}</td>
                        <td><a href="{{ URL::route("admin.channelview", [Channels::where("id", "=", $flag->relation_id)->pluck("id")]) }}" class="btn btn-primary">View Channel</a></td>
                    </tr>
                @endif
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

    <h3>Groups</h3>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Group Name</th>
            <th>Relation</th>
            <th>Author Name</th>
            <th>Author ID</th>
            <th>Flag Reporter name</th>
            <th>Flag reporter ID</th>
        </tr>
        </thead>
        <tbody>
        @if ($flags->count() > 0)
            @foreach ($flags as $flag)
                @if($flag->relation == "group" && $flag->relation_id == (Groups::where("id", "=", $flag->relation_id)->pluck("id")))
                    <tr>
                        <td>{{{ Groups::where("id", "=",$flag->relation_id)->pluck("unique_groupname") }}}</td>
                        <td>{{{ $flag->relation }}}</td>
                        <td>{{{ User::where("id", "=", Groups::where("id", "=", $flag->relation_id)->pluck("owner_id"))->pluck("username") }}}</td>
                        <td>{{{ User::where("id", "=", Groups::where("id", "=", $flag->relation_id)->pluck("owner_id"))->pluck("id") }}}</td>
                        <td>{{{ User::where("id", "=", $flag->reporter_id)->pluck("username") }}}</td>
                        <td>{{{ $flag->reporter_id }}}</td>
                        <td><a href="{{ URL::route("admin.groupview", [Groups::where("id", "=", $flag->relation_id)->pluck("id")]) }}" class="btn btn-primary">View Group</a></td>
                    </tr>
                @endif
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


    <h3>Posts</h3>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Author Name</th>
            <th>Author ID</th>
            <th>Post Time</th>
            <th>Post Date</th>
            <th>Media Txt</th>
            <th>Format</th>
            <th>Post ID</th>
            <th>Relation ID</th>
        </tr>
        </thead>
        <tbody>
        @if ($flags->count() > 0)
            @foreach ($flags as $flag)
                @if($flag->relation == "feed" || $flag->relation == "post")
                    <tr>
                        <td>{{{ User::where("id", "=", Posts::where("post_id", "=", $flag->relation_id)->pluck("author_id"))->pluck("username") }}}</td>
                        <td>{{{ User::where("id", "=", Posts::where("post_id", "=", $flag->relation_id)->pluck("author_id"))->pluck("id") }}}</td>
                        <td>{{Posts::where("post_id", "=", $flag->relation_id)->pluck("post_time")}}</td>
                        <td>{{Posts::where("post_id", "=", $flag->relation_id)->pluck("post_date")}}</td>
                        <td>{{Posts::where("post_id", "=", $flag->relation_id)->pluck("text")}}</td>
                        <td>{{Posts::where("post_id", "=", $flag->relation_id)->pluck("media_type")}}</td>
                        <td>{{Posts::where("post_id", "=", $flag->relation_id)->pluck("id")}}</td>
                        <td>{{$flag->relation_id}}</td>
                        <td><a href="{{ URL::route("admin.postview", [Posts::where("id", "=", Posts::where("post_id", "=", $flag->relation_id)->pluck("id"))->pluck("id")]) }}" class="btn btn-primary">View Post</a></td>
                    </tr>
                @endif
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