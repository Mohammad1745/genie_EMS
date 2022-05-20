@extends('auth.layout.index')

@section('title', 'Login - '.TITLE_BASE)

@section('style')
@endsection

@section('content')
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="form border rounded shadow px-4 py-3">

            <div class="form-header text-center fw-bold"> Login </div>

            {{ Form::open(['route'=> 'loginProcess','method' => 'post', 'id' => 'auth_form', 'class' => 'main-form']) }}
                <div class="form-group my-2">
                    <label for="email">Email/Username</label>
                    <input type="text" class="form-control" name="email" value="{{old('email')}}" required placeholder="john@xyz.com">
                    @if (isset($errors) && $errors->has('email'))
                        <span class="text-danger"><strong>{{ $errors->first('email') }}</strong></span>
                    @endif
                </div>
                <div class="form-group my-2">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" value="{{old('password')}}" min="8" required>
                    @if (isset($errors) && $errors->has('password'))
                        <span class="text-danger"><strong>{{ $errors->first('password') }}</strong></span>
                    @endif
                </div>

                <div class="">
                    <button class="btn btn-primary" type="submit">{{__('Login')}}</button>
                </div>
            {{ Form::close() }}

            <div class="form-footer text-center text-secondary mt-2"> Or, Create an <strong>Owner</strong> account from <a class="" href="{{route('signup')}}">Sign Up</a> </div>
        </div>
    </div>
@endsection
