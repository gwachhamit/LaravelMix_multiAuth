@extends('layouts.app')
@section('page_title', 'Reset Password')
@section('content')
<reset-password update-password-route="{{ route('password.update') }}" dashboard-route="{{ route('home') }}" token="{{ $token }}" email="{{ $email }}"/>
@endsection
