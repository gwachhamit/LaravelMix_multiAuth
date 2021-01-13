@extends('layouts.app')
@section('page_title', 'Register')
@section('content')
<register register-route="{{ route('register') }}" dashboard-route="{{ route('home') }}" csrf="{{ csrf_token() }}" />
@endsection
