@extends('layouts.admin', ["title" => "Pages", "sidebar" => false])

@section('content')
    <h1>Pages</h1>
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
        @if ($pages->count() > 0)
            @foreach ($pages as $page)
                <tr>
                    <td>{{{ $page->unique_pagename }}}</td>
                    <td>{{{ $page->category }}}</td>
                    <td>{{{ $page->post_date }}}</td>
                    <td>{{{ $page->post_time }}}</td>
                    <td>{{{ $page->owner_id }}}</td>
                    <td>{{{ User::where("id", "=", $page->owner_id)->pluck("username") }}}</td>
                    <td><a href="{{ URL::route('admin.page', [$page->id]) }}" class="btn btn-primary">View Page</a></td>
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