
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
        <li><a href="#">Category</a></li>
        <li class="active">Update Category</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
       <!-- Horizontal Form -->
       <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Update Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action = "{{URL::to('/admin/category/update')}}" method = "post" >
            @csrf
            <input type="hidden" class="form-control"  name="id" value ="{{ $catsArr['id'] }}">
              <div class="box-body">
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">department_id</label>
                  <select name="dep_id"><br>
                  @foreach($depsArr as $depArr)
                  @php $selected= ''; @endphp
                  @if($depArr['id'] == $catsArr['department_id'])
                    $selected = "selected='selected';
                  @endif
                    <option value="{{ $depArr['id'] }}" {{$selected}}>{{ $depArr['name'] }}</option>
                    @endforeach
                   </select>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3"  name="dname" value ="{{ $catsArr['name'] }}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">description</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" name="desc" value ="{{ $catsArr['description'] }}">
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
                
                <button type="submit" class="btn btn-info pull-right">update Category</button>
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