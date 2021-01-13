@extends('layouts.app')
@section('page_title', 'Dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @unless(Auth::user()->hasVerifiedEmail()) 
                    <verify resend-verification-link-route="{{ route('organizations.verification.resend') }}">
                    @endunless
                    {{ __('You are logged in as Organization User!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
