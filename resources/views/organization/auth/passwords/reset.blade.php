@extends('layouts.app')
@section('page_title', 'Reset Password')
@section('content')
<reset-password update-password-route="{{ route('organizations.password.update') }}" dashboard-route="{{ route('organizations.dashboard') }}" token="{{ $token }}" email="{{ $email }}"/>
@endsection
