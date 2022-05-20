@extends('owner.layout.index')

@section('title', 'Employees - '.TITLE_BASE)

@section('style')
    <style>
        .employee-list-item {
            background: #aaa;
        }
    </style>
@endsection

@section('content')
    <div class=" mt-3 ">
        <div class="d-flex justify-content-end">
            <a class="btn btn-primary" href="#">Add Employee</a>
        </div>
        <div class="d-flex flex-column ms-0 mt-1">
            <div class="employee-list-item my-1 p-2 rounded"> Rifat123</div>
            <div class="employee-list-item my-1 p-2 rounded"> Shohag101</div>
            <div class="employee-list-item my-1 p-2 rounded"> Ahnaf05</div>
            <div class="employee-list-item my-1 p-2 rounded"> Emon3</div>
        </div>
    </div>
@endsection
