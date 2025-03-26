@extends('layouts.adminbase')
@section('content-title', 'Profile')
@section('head_extra')
    <style>

        .content nav, .content header, .content .main-footer {
            display: none !important;
        }

        .content-wrapper{
            height: 93vh;
            overflow: auto;
        }

        .d-md-inline{
            display: none !important;
        }

    </style>
@endsection

@section('content')

    @include('profile.show')

@endsection
