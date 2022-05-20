@extends('layouts.auth')

@section('title', 'Sign Up - '.TITLE_BASE)

@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/auth.css')}}">
    <style>
        .form-area {
            height: 100px;
            width: 100px;
            border: 1px solid #222;
        }
    </style>
@endsection

@section('content')
    <div class="form-area">
        FORM
    </div>
@endsection
