@extends('layouts.app')
@section('page_title', 'Forgot Password')
@section('content')
<forgot-password send-reset-link-route="{{ route('organizations.password.email') }}" />
@endsection
