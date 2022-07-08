@extends('layouts.admin_app')
@section('content')
<style>
    .btn-group{
        display:none;
    }
 

    </style>

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i> Home</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2> Enquiry List </h2>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date of enquiry </th>
                                    <th>Client Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Talent ID</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Date of enquiry </th>
                                    <th>Client Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Talent ID</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($enquiries as $list)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{\Carbon\Carbon::parse($list->created_at)->format('Y-m-d') }}</td>
                                    <td>{{$list->name}}</td>
                                    <td>{{$list->email}}</td>
                                    <td>{{$list->phone}}</td>

                                    <td>
                                    @foreach(explode(',', $list->employee_id) as $info) 
                                    <a class="" href="javascript:void(0);" data-toggle="modal" data-target="#viewModal" onclick="viewfn('{{$info}}')">{{$info}}</a>,
                                    @endforeach
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('modal')
@include('viewModal')
@endsection