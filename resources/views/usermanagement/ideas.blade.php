@extends('layouts.master')
@section('menu')
@extends('sidebar.user_activity_log')
@endsection
@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>List of Ideas Briefings</h3>
                    {{-- <p class="text-subtitle text-muted">For Ideas Briefings</p> --}}
                </div>
                    
                
                <div class="col-12 col-md-6 order-md-2 order-first float-right pb-5 ml-5">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <div class="float-right">
                            <a href="{{ route('ideas/add/new') }}" class="btn btn-outline-success"><i class="bi bi-plus"></i>
                             Add New
                            </a>
                            
                         </div>
                    </nav>
                </div>
                
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Log Datatable
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Posted by</th>
                                <th>Email Address</th>
                                <th>Phone Number</th>
                                <th>Topic</th>
                                <th>Descriptions</th>
                                <th>Status</th>                                
                                <th>Date Time</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($activityLog as $key => $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $item->user_name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone_number }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->role_name }}</td>
                                    <td>{{ $item->modify_user }}</td>
                                    <td>{{ $item->date_time }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
   <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2023 &copy; investment ideas</p>
            </div>
            <div class="float-end">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                href="#">Group 5</a></p>
            </div>
        </div>
    </footer>
</div>
@endsection
