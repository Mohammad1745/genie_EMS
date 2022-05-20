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
            @if($attendanceStatus == NOT_CHECKED_IN)
                <a class="btn btn-success" href="{{route('employee.checkIn')}}">Check In</a>
            @elseif($attendanceStatus == CHECKED_IN)
                <a class="btn btn-primary" href="{{route('employee.checkOut')}}">Check Out</a>
            @else
                <div class="text-center text-secondary border-top">Already Checked Out</div>
            @endif
        </div>

    </div>
@endsection

@section('script')
    <script>

    </script>
@endsection
