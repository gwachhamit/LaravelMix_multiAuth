@extends('layouts.app')
@section('page_title', 'Reset Password')
@section('content')
<reset-password update-password-route="{{ route('admin.password.update') }}" dashboard-route="{{ route('admin.dashboard') }}" token="{{ $token }}" email="{{ $email }}"/>
@endsection
