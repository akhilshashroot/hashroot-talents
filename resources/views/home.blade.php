@extends('layouts.admin_app')
@section('content')
<style>
    .btn-default,.dt-buttons{
        display:none;
    }
  .delete-color{
    color: #f11414;
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
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2> Employee List </h2>
                        <ul class="header-dropdown">
                        <button type="button" class="btn  waves-effect m-r-20" data-toggle="modal" data-target="#largeModal" onclick="resetfn()">Add Employee</button>
                        </ul>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                     <th>Date</th>
                                    <th>Talent ID</th>
                                    <th>Skills & Tools</th>
                                    <th>Experience</th>
                                    <th>TAT</th>
                                    <th>Availability</th>
                                    <th>Rate(USD)</th>
                            
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                       <th>Date</th>
                                    <th>Talent ID</th>
                                    <th>Skills & Tools</th>
                                    <th>Experience</th>
                                    <th>TAT</th>
                                    <th>Availability</th>
                                    <th>Rate(USD)</th>
                                 
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($employees as $employee)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                                                        <td>{{$employee->updated_at->toDateString()}}</td>

                                    <td><a class="" href="javascript:void(0);" data-toggle="modal" data-target="#viewModal" onclick="viewfn('{{$employee->employee_id}}')">{{$employee->employee_id}}</a></td>
                                    <td>{{$employee->skill_set}}</td>
                                    <td>{{$employee->experience}}</td>
                                    <td>{{$employee->turnaround_time}}</td>
                                    <td>{{$employee->availability}}</td>
                                    <td>{{$employee->rate}}</td>
                                    <td>
                                        <a class="" onclick="editfn({{$employee->id}})" href="javascript:void('0')"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                        <a class="delete-color" href="javascript:void(0);" data-toggle="modal" data-target="#deleteModal" onclick="deletefn({{$employee->id}})"><i class="fa fa-trash"></i></a>
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
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">Add Employee</h4>
            </div>
            <div class="modal-body">
                <form id="form_validation"  method="POST" action="{{route('employee.store')}}">
                    @csrf
                    <input type="hidden" name="userid" id="userid" value="">
                    <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">                
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-md-6"> <b>Talent ID</b>
                                <div class="form-group">
                                    <div class="form-line">
                                    <input type="text" class="form-control" name="talentid" id="talentid" placeholder="Enter Talent Id" required>
                                    </div>
                                    <span class="input-group-addon"> <i></i> </span> </div>
                            </div>
                            <div class="col-md-6"> <b>Employee Name</b>
                                <div class="form-group">
                                    <div class="form-line">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Employee name">
                                    </div>
                                    <span class="input-group-addon"> <i></i> </span> </div>
                            </div>
                        </div>
                    </div>
                </div>
           
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">                
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-md-6"> <b>Email</b>
                                <div class="form-group">
                                    <div class="form-line">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Employee email">
                                    </div>
                                    <span class="input-group-addon"> <i></i> </span> </div>
                            </div>
                            <div class="col-md-6"> <b>Phone No</b>
                                <div class="form-group">
                                    <div class="form-line">
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Employee phone">
                                    </div>
                                    <span class="input-group-addon"> <i></i> </span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">                
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-md-6"> <b>Skills & Tools</b>
                                <div class="form-group">
                                    <div class="form-line">
                                    <textarea name="skillset" id="skillset" cols="30" rows="5" class="form-control no-resize" required placeholder="php,jquery,symfony"></textarea>
                                    </div>
                                    <span class="input-group-addon"> <i></i> </span> </div>
                            </div>
                            <div class="col-md-6"> <b>Experience</b>
                                <div class="form-group">
                                    <div class="form-line">
                                    <input type="text" class="form-control" name="experience" id="experience" placeholder="Enter employee experience in years" required>
                                    </div>
                                    <span class="input-group-addon"> <i></i> </span> </div>
                            </div>
                        </div>
                    </div>
                </div>
           
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">                
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-md-6"> <b>Turnaround Time</b>
                                <div class="form-group">
                                    <div class="form-line">
                                    <input type="text" class="form-control" name="time" id="time" placeholder="Enter Turnaround time" required>
                                    </div>
                                    <span class="input-group-addon"> <i></i> </span> </div>
                            </div>
                            <div class="col-md-6"> <b>Availability</b>
                                <div class="form-group">
                                    <div class="">
                                    <select  name="availability" id="availability" class="form-control show-tick" required>
                                    <option value="">-- Please select --</option>
                                    <option value="Full-Time">Full-Time</option>
                                    <option value="Part-Time">Part-Time</option>
                                  
                                </select> 
                            </div>
                                    <span class="input-group-addon"> <i></i> </span> </div>
                            </div>
                        </div>
                    </div>
             
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">                
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-md-6"> <b>Rate(USD)</b>
                                <div class="form-group">
                                    <div class="form-line">
                                    <input type="text" class="form-control" name="rate" id="rate" placeholder="Enter employee rate" required>
                                    </div>
                                    <span class="input-group-addon"> <i></i> </span> </div>
                            </div>

                            <div class="col-md-6"> <b>ECTC</b>
                                <div class="form-group">
                                    <div class="form-line">
                                    <input type="text" class="form-control" name="ectc" id="ectc" placeholder="Enter expected CTC">
                                    </div>
                                    <span class="input-group-addon"> <i></i> </span> </div>
                            </div>
                           
                        </div>
                    </div>
                </div>    
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">                
                    <div class="body">
                        <div class="row clearfix">
                        <div class="col-md-6"> <b>Comments</b>
                                <div class="form-group">
                                    <div class="form-line">
                                    <textarea name="comments" id="comments" cols="30" rows="5" class="form-control no-resize"  placeholder="comments"></textarea>
                                    </div>
                                    <span class="input-group-addon"> <i></i> </span> </div>
                            </div>
                        </div>
                    </div>
                </div>    
        </div>
                       
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-link waves-effect" type="submit" id="submitbtn">SAVE CHANGES</button>
                            <!-- <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button> -->
                            </form>
                        </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteModalLabel"></h4>
            </div>
            <div class="modal-body">
            <form class="delete" id="deleteform" action="" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        {{ csrf_field() }}
        Are you sure want to delete?</div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-link waves-effect">Yes ! Delete it</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</div>
@include('viewModal')
@endsection