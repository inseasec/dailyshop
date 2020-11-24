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
        <li class="active">Update Department</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
   
   <!-- Horizontal Form -->
   <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Update Department</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action = "{{ URL::to('/admin/department/edit') }}/{{ $depsArr['id']  }}" method = "post" >
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3"  name="dname"  value ="{{ $depsArr['name'] }}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">description</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" name="desc" value ="{{ $depsArr['description'] }}">
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
                
                <button type="submit" class="btn btn-info pull-right">Update Department</button>
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