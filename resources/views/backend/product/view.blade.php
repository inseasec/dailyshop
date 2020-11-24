@extends('backend/master')
@section('content')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Product
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Product</a></li>
        <li class="active">View Product</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">View Product</h3>
              <div style="text-align:center;color:green;"> @if(isset($_GET['msg']))
          {{$_GET['msg']}}
        @endif</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            @if(!empty($prosArr))
              <table class="table table-bordered" id="product_table">
              <thead>
                <tr>
                  <th style="width: 10px">ID</th>
                  <th>Department_ID</th>
            <th>Category_ID</th>
            <th>Name</th>
        <th>Description</th>
        <th>color</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Actual_price</th>
        <th>Dicount_percentage</th>
                  <th colspan="2" style="text-align:center;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($prosArr as $proArr)
                <tr>
                <td>{{ $proArr['id'] }}</td>
                <td>{{ $proArr['department_id'] }}</td>
        <td>{{ $proArr['category_id'] }}</td>
            <td>{{ $proArr['name'] }}</td>
            <td>{{ $proArr['description'] }}</td>
            <td>{{ $proArr['color'] }}</td>
            <td>{{ $proArr['quantity'] }}</td>
            <td>{{ $proArr['price'] }}</td>
            <td>{{ $proArr['actual_price'] }}</td>
            <td>{{ $proArr['discount_percentage'] }}</td>
                  <td><a href = "edit/{{ $proArr['id'] }}"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Edit</button></a></td>
                  <td><a href = "delete/{{ $proArr['id'] }}"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></a></td>
                  
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
                 
