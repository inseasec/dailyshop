@extends('backend/master')
@section('content')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Departments
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Departments</a></li>
        <li class="active">View Department</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">View Department h</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            @if(!empty($depsArr))
              <table class="table table-bordered" id="department_table">
              <thead>
                <tr>
                  <th style="width: 10px">ID</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th colspan="2" style="text-align:center;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($depsArr as $depArr)
                <tr>
                <td>{{ $depArr['id'] }}</td>
                 <td>{{ $depArr['name'] }}</td>
                  <td>{{ $depArr['description'] }}</td>
                  <td><a href = "edit/{{ $depArr['id'] }}"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Edit</button></a></td>
                  <td><a href = "delete/{{ $depArr['id'] }}"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></a></td>
                </tr>
                @endforeach
                <tbody>
                </table>
                @endif
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
          <!-- /.box -->
          </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
    
                 @endsection
                 