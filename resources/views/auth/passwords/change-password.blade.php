@extends('layouts.admin_app')

@section('content')
<section class="content">
    <div class="block-header">
        <div class="row">
            
        </div>
    </div>
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
<div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2> CHANGE PASSWORD </h2>
                    </div>
                    <div class="body">
                        <form method="post" action="{{ route('changePasswordPost') }}" id="changepwd_form"> 
                            @csrf
                        <label for="email_address">Current Password</label>
                            <div class="form-group">
                                <div class="form-line">
                                <input type="password" id="current-password" class="form-control" name="current-password" placeholder="Enter your current password" required>
                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                            <label for="newpassword">New Password</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" id="new-password" class="form-control" name="new-password" placeholder="Enter your new password" required>
                                    @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                            <label for="confirmpassword">Confirm New Password</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" id="new-password-confirm" class="form-control" name="new-password-confirm" placeholder="Enter your new password" required>
                                    
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect">CHANGE PASSWORD</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
