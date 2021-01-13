@extends('layouts.app')
@section('page_title', 'Register')
@section('content')
<register register-route="{{ route('organizations.register') }}" dashboard-route="{{ route('organizations.dashboard') }}" csrf="{{ csrf_token() }}" />
@endsection
