@extends('layouts.admin', ["title" => "Posts", "sidebar" => false])

@section('content')
    <h1>Posts</h1>
    <p><span style="color: red">We only show the last 100 registered so not overload the DB server</span></p>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Relation</th>
            <th>Post ID</th>
            <th>ID</th>
            <th>Media Type</th>
            <th>Post content</th>
            <th>Post date</th>
            <th>Post time</th>
            <th>Author ID</th>
            <th>Author name</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @if ($posts->count() > 0)
            @foreach ($posts as $post)
                <tr>
                    <td>{{{ $post->relation }}}</td>
                    <td>{{{ $post->post_id }}}</td>
                    <td>{{{ $post->id }}}</td>
                    <td>{{{ $post->media_type }}}</td>
                    <td>{{{ $post->text }}}</td>
                    <td>{{{ $post->post_date }}}</td>
                    <td>{{{ $post->post_time }}}</td>
                    <td>{{{ $post->author_id }}}</td>
                    <td>{{{ User::where("id", "=", $post->author_id)->pluck("username") }}}</td>
                    <td><a href="{{ URL::route('admin.post', [$post->id]) }}" class="btn btn-primary">View Post</a></td>
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