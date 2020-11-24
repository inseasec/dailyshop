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
              <h3 class="box-title">Update Product </h3>
             
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action = "{{URL::to('/admin/product/update')}}" method = "post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control" id="" value="{{$product->id}}" name="id">
              <div class="box-body">
             <!--  <div class="form-group">
                  <label for="inputEmail3" class=" col-sm-4 control-label">department_id</label>
                  <div class="col-sm-6">
                    <select name="dep_id" class="form-control" id="dep_id"><br>
                      @foreach($depsArr as $depArr)
                      <option value="{{ $depArr['id'] }}">{{ $depArr['name'] }}</option>
                       @endforeach
                     </select>
                  </div>
              </div> -->

             <!-- <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">category_id</label>
                 <div class="col-sm-6">
                    <select name="cat_id" class="form-control" id="categories"><br>
                      <option value="">Choose Categories</option>
                    </select>
                </div>
            </div> -->
              <div class="form-group">
                  <label for="inputEmail3" class=" col-sm-4 control-label">Department Id</label>
                  <div class="col-sm-6">
                    <input type="text"  name="dep_id" value='{{$product->department_id}}' class="form-control" id="inputEmail3" readonly=""><br>
                     
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputEmail3" class=" col-sm-4 control-label">Category Id</label>
                  <div class="col-sm-6">
                    <input type="text"  name="cat_id" value='{{$product->category_id}}' class="form-control" id="inputEmail3" readonly><br>
                     
                  </div>
              </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">name</label>

              <div class="col-sm-6">
                <input type="text" class="form-control" id="inputEmail3" value="{{$product->name}}"  name="dname">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-4 control-label">description</label>

              <div class="col-sm-6">
                <input type="text" class="form-control" id="inputPassword3" value="{{$product->description}}" name="desc">
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-4 control-label">colour</label>
              <div class="col-sm-6">
              <select name="colour" class="form-control">
            <option value="white">White</option>
            <option value="black">Black</option>
            
            </select>
            </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-4 control-label" >quantity</label>

              <div class="col-sm-6">
                <input type="number" class="form-control" id="inputPassword3" value="{{$product->quantity}}" name="quan">
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-4 control-label">price</label>

              <div class="col-sm-6">
                <input type="number" class="form-control" id="inputPassword3" value="{{$product->price}}" name="price">
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-4 control-label">actualprice</label>

              <div class="col-sm-6">
                <input type="number" class="form-control" id="inputPassword3" value="{{$product->actual_price}}" name="aprice">
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-4 control-label">discount_percentage</label>

              <div class="col-sm-6">
                <input type="number" class="form-control" id="inputPassword3" value="{{$product->discount_percentage}}" name="disper">
              </div>
            </div>
            <div class="form-group">
              <label for="primary_image" class="col-sm-4 control-label">Primary Image</label>
              <div class="col-sm-4">
                <input type="file" class="form-control" id="primary_image" value="" name="primary_image">
              </div>
              <div class="col-sm-2">
                 <img height="200" width="200" style="" src="{{url('images/'.$product->department_id .'/' .$product->category_id .'/' .$product->name .'/' .$product->primary_image)}}" alt="image not available">
              </div>
            </div>
                <!--------- showing images--------->
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-4 control-label"> Images</label>
              <div class="col-sm-6">
                <input type="file" class="form-control" id="inputPassword3" value="" name="image[]" multiple>
              </div>
            </div>
            <div class="text-center">
              @foreach($images as $images)
                 @if($images)
                    <img height="200" width="200" style="padding: 35px;" src="{{url('images/'.$product->department_id .'/' .$product->category_id .'/' .$product->name .'/' .$images)}}" alt="image not available">
                @endif
              @endforeach
            </div>
    
        </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
                <button type="submit" class="btn btn-info pull-right">Update Product</button>
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
    