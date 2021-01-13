@extends('layouts.app')
@section('page_title', 'Login')
@section('content')
<login 
    login-route="{{ route('organizations.login') }}" 
    register-route="{{ route('organizations.register') }}" 
    forgot-password-route="{{ route('organizations.password.request') }}" 
    dashboard-route="{{ route('organizations.dashboard') }}" 
    facebook-app-id=""
    google-app-id=""
></login>
@endsection
