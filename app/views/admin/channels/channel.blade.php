@extends('layouts.admin', ["title" => "Channels", "sidebar" => false])

@section('content')
    <h1>Channel View</h1>
    @foreach ($channels as $channel)

    @endforeach

@stop