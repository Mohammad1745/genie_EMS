@extends('owner.layout.index')

@section('title', 'Employees - '.TITLE_BASE)

@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.css">

    <style>
        .wrapper{
            background: #aaa;
        }
        .report-list{
            margin: 1.5rem;
        }
        .report-list-item {
            color: black;
            text-decoration: none;
            transition: all 0.25s ease-in-out;
        }
        .report-list-item:hover {
            background: #999;
            color: black;
            cursor: pointer;
        }
        tr {
            height: 2.5rem;
        }
    </style>
@endsection

@section('content')
    <div class=" mt-3 ">
        <div class="d-flex justify-content-start">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    User Name: {{' '}}
                </button>
            </div>
        </div>

        <div class="d-flex flex-column ms-0 mt-1 wrapper rounded">
            @if(count($reports))
                <table id="table_id" class="display report-list">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Office Hour</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $key => $report)
                            <tr>
                                <td><a class="report-list-item" href="#"> {{$report['date']}}</a></td>
                                <td><a class="report-list-item" href="#"> {{$report['check_in']}}</a></td>
                                <td><a class="report-list-item" href="#"> {{$report['check_out']}}</a></td>
                                <td><a class="report-list-item" href="#"> {{$report['office_hour']}}</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center text-secondary border-top">Empty List</div>
            @endif
        </div>
    </div>
@endsection

@section('script')
@endsection
