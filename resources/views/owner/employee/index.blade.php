@extends('owner.layout.index')

@section('title', 'Employees - '.TITLE_BASE)

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
        <div class="d-flex justify-content-end">
            <a class="btn btn-primary" href="{{route('owner.employee.create')}}">Add Employee</a>
        </div>

        <div class="d-flex flex-column ms-0 mt-1">
            @if(count($employees))
                @foreach($employees as $key => $employee)
                    <a class="employee-list-item my-1 p-3 rounded" href="#"> {{$employee['username']}}</a>
                @endforeach
            @else
                <div class="text-center text-secondary border-top">Empty List</div>
            @endif
        </div>
    </div>
@endsection

@section('script')
    <script>

    </script>
@endsection
