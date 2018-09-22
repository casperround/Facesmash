@extends('layouts.admin', ["title" => "User: " . $user->username, "sidebar" => false])

@section('content')
    <div class="col-md-4">
        <div class="m-portlet m-portlet--unair">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Edit Social Data
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <form class="form-control" action="{{ URL::route("admin.userSocialData.do", [$user->id]) }}" method="post">
                    <div class="form-group">
                        <label>Youtube</label>
                        <input class="form-control" name="youtube" value="{{{ $user->youtube }}}">
                    </div>
                    <div class="form-group">
                        <label>Facebook</label>
                        <input class="form-control" name="facebook" value="{{{ $user->facebook }}}">
                    </div>
                    <div class="form-group">
                        <label>Tumblr</label>
                        <input class="form-control" name="tumblr" value="{{{ $user->tumblr }}}">
                    </div>
                    <div class="form-group">
                        <label>Twitter</label>
                        <input class="form-control" name="twitter" value="{{{ $user->twitter }}}">
                    </div>
                    <div class="form-group">
                        <label>Website</label>
                        <input class="form-control" name="website" value="{{{ $user->website }}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    {{ Form::token() }}
                </form>
            </div>
        </div>
    </div>
@stop
