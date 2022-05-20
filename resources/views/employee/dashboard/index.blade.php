@extends('employee.layout.index')

@section('title', 'Attendance - '.TITLE_BASE)

@section('style')
    <style>
        .employee-list-item {
            background: #aaa;
            text-decoration: none;
            color: black;
            transition: all 0.25s ease-in-out;
        }
        .employee-list-item:hover {
            background: #999;
            color: black;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class=" mt-3 ">
        <div class="d-flex justify-content-center">
            <a class="btn btn-primary" href="{{route('employee.check_in')}}">Check In</a>
        </div>

    </div>
@endsection

@section('script')
    <script>

    </script>
@endsection
