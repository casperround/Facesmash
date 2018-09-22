@extends('layouts.admin', ["title" => "User: " . $user->username, "sidebar" => false])

@section('content')
    <script>
        window.onload = function() {
            role.value = '{{{ $user->role }}}';
        };
    </script>

    <h1>User: {{{ $user->username }}}</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="m-portlet m-portlet--full-height  m-portlet--unair">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                View/Edit User Info
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <a href="{{ URL::route("admin.userEditGeneral", [$user->id]) }}" class="btn btn-primary">Edit General Data</a>
                    <a href="{{ URL::route("admin.userSocialData", [$user->id]) }}" class="btn btn-primary">Social Data Edit</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="m-portlet m-portlet--unair">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                User Graphics
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <p>Users Profile Image</p>
                    <img height="70" src="{{ URL::to($user->profile_img_path) }}">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="m-portlet m-portlet--unair">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Admin Data/Functions
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <form class="form-control">
                        <div class="form-group">
                            <label>Account Created</label>
                            <input readonly class="form-control" value="{{{ $user->created_at }}}">
                        </div>
                        <div class="form-group">
                            <label>Account Last Updated</label>
                            <input readonly class="form-control" value="{{{ $user->updated_at }}}">
                        </div>
                    </form>
                    <br>
                    <form class="form-control" action="" method="post">
                        <div class="form-group">
                            <label>User Role</label>
                            <select class="form-control" id="role" name="role">
                                <option selected disabled>Select a new Role</option>
                                <option value="standard">Standard User</option>
                                <option value="suspended">Suspended User</option>
                                <optgroup label=""></optgroup>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        {{ Form::token() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop