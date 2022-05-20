@extends('employee.layout.index')

@section('title', 'Attendance - '.TITLE_BASE)

@section('style')
    <style>
        .content {
            height: 80vh;
        }
    </style>
@endsection

@section('content')
    <div class="content mt-3 d-flex flex-column justify-content-center align-items-center">
        {{\Carbon\Carbon::now()->format('d M, Y')}}

        <div class="d-flex justify-content-center mt-5">
            <a class="btn btn-success" href="{{route('employee.checkIn')}}">Check In</a>
            <a class="btn btn-primary" href="{{route('employee.checkOut')}}">Check Out</a>
        </div>

    </div>
@endsection

@section('script')
    <script>

    </script>
@endsection
