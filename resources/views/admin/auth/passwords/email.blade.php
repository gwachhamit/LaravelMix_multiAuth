@extends('layouts.app')
@section('page_title', 'Forgot Password')
@section('content')
<forgot-password send-reset-link-route="{{ route('admin.password.email') }}" @if (session('status')) status="{{ session('status') }}" @endif/>
@endsection
