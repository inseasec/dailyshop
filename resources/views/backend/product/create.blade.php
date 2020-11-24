
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
        <li class="active">Create Product</li>
      </ol>
    </section>
   
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
      
       <!-- Horizontal Form -->
       <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create Product </h3>
              <div style="text-align:center;color:green;"> @if(isset($_GET['msg']))
          {{$_GET['msg']}}
        @endif</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action = "{{URL::to('/admin/product/insert')}}" method = "post" enctype="multipart/form-data">
            @csrf
              <div class="box-body">
              <div class="form-group">
                  <label for="inputEmail3" class=" col-sm-4 control-label">department_id</label>
                  <div class="col-sm-6">
                  <select name="dep_id" id="dep_id" class="form-control"><br>
                  <option value="">Choose Department</option>
                  @foreach($depsArr as $depArr)
                  <option value="{{ $depArr['id'] }}">{{ $depArr['name'] }}</option>
                   @endforeach
                   </select>
                   </div>
                   </div>

                  <div class="form-group">
                     <label for="inputEmail3" class="col-sm-4 control-label">category_id</label>
                    <div class="col-sm-6">
                    <select name="cat_id" class="form-control" id="categories"><br>
                      <option value="">Choose Categories</option>
                    </select>
                   </div>
                   </div>
                  <!--  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">category_id</label>
                  <div class="col-sm-6">
                  <select name="cat_id" class="form-control"><br>
                  @foreach($catsArr as $catArr)
                  <option value="{{ $catArr['id'] }}">{{ $catArr['name'] }}</option>
                   @endforeach
                   </select>
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
                  <label for="inputPassword3" class="col-sm-4 control-label">color</label>
                  <div class="col-sm-6">
                  <select name="color" class="form-control">
                <option value="white">White</option>
                <option value="black">Black</option>
                 <option value="white">dark white</option>
                <option value="black">sky blue</option>
                
                </select>
                </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-4 control-label">quantity</label>

                  <div class="col-sm-6">
                    <input type="number" class="form-control" id="inputPassword3" name="quan">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-4 control-label">price</label>

                  <div class="col-sm-6">
                    <input type="number" class="form-control" id="inputPassword3" name="price">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-4 control-label">actualprice</label>

                  <div class="col-sm-6">
                    <input type="number" class="form-control" id="inputPassword3" name="aprice">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-4 control-label">discount_percentage</label>

                  <div class="col-sm-6">
                    <input type="number" class="form-control" id="inputPassword3" name="disper">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputpriamryimage" class="col-sm-4 control-label">Primary Image</label>

                  <div class="col-sm-6">
                    <input type="file" class="form-control" id="inputpriamryimage" name="primary_image">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-4 control-label">Images</label>

                  <div class="col-sm-6">
                    <input type="file" class="form-control" id="inputPassword3" name="image[]" multiple>
                  </div>
                </div>
                
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
                <button type="submit" class="btn btn-info pull-right">Add Product</button>
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
  