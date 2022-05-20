@extends('owner.layout.index')

@section('title', 'Add Employee - '.TITLE_BASE)

@section('style')
@endsection

@section('content')
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="form border rounded shadow px-4 py-3">

            <div class="form-header text-center fw-bold"> Add New Employee </div>

            {{ Form::open(['route'=> 'owner.employee.store','method' => 'post', 'id' => 'owner_form', 'class' => 'main-form', 'autocomplete' => 'off']) }}
                <div class="form-group my-2">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" value="{{old('username')}}" required placeholder="John22">
                    @if (isset($errors) && $errors->has('username'))
                        <span class="text-danger"><strong>{{ $errors->first('username') }}</strong></span>
                    @endif
                </div>
                <div class="form-group my-2">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{old('email')}}" required placeholder="john@xyz.com">
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
                <div class="form-group my-2">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" value="{{old('password_confirmation')}}" required>
                    @if (isset($errors) && $errors->has('password_confirmation'))
                        <span class="text-danger"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                    @endif
                </div>

                <div class="d-flex justify-content-start">
                    <button class="btn btn-primary" type="submit">{{__('Add')}}</button>
                    <a href="{{route('owner.employee')}}" class="btn btn-dark ms-1" type="submit">{{__('Close')}}</a>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
