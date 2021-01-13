@extends('layouts.app')
@section('page_title', 'Login')
@section('content')
<login 
    login-route="{{ route('login') }}" 
    register-route="{{ route('register') }}" 
    forgot-password-route="{{ route('password.request') }}" 
    dashboard-route="{{ route('home') }}" 
    facebook-app-id="{{ config('services.facebook.client_id','') }}"
    google-app-id="{{ config('services.google.client_id','') }}"
    @if($errors->any()) errors="{{ $error }}" @endif
></login>
@endsection
