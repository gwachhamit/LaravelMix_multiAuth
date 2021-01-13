@extends('layouts.app')
@section('page_title', 'Register')
@section('content')
<register register-route="{{ route('admin.register') }}" dashboard-route="{{ route('admin.dashboard') }}" csrf="{{ csrf_token() }}" />
@endsection
