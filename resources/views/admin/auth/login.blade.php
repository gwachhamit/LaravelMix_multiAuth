@extends('layouts.app')
@section('page_title', 'Login')
@section('content')
<login 
    login-route="{{ route('admin.login') }}" 
    forgot-password-route="{{ route('admin.password.request') }}" 
    dashboard-route="{{ route('admin.dashboard') }}" 
    facebook-app-id=""
    google-app-id=""
    @if($errors->any()) errors="{{ $error }}" @endif
></login>
@endsection
