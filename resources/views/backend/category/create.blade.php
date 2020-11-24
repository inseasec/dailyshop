
@extends('backend/master')
       @section('content') 

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Category</a></li>
        <li class="active">Create Category</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
       <!-- Horizontal Form -->
       <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action = "{{URL::to('/admin/category/insert')}}" method = "post" >
            @csrf
              <div class="box-body">
              <div class="form-group">
                  <label for="inputEmail3" >department_id</label>
                  <select name="dep_id"><br>
                  @foreach($depsArr as $depArr)
                  <option value="{{ $depArr['id'] }}">{{ $depArr['name'] }}</option>
                   @endforeach
                   </select>
                  <!-- <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" name="dep_id">
                  </div>
                </div> -->
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">name</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputEmail3"  name="dname">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-4 control-label">description</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputPassword3" name="desc">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Remember me
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
                <button type="submit" class="btn btn-info pull-right">Add Category</button>
              </div>
              <!-- /.box-footer -->
            </form>
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