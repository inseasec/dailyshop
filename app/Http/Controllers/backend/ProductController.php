<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Department;
use App\Models\Categorie;
use App\Models\Product;

class ProductController extends BaseController
{
   public function create() {
    
        $DepObj = new Department();
        $depsArr = $DepObj->getdep();

        $CatObj = new Categorie();
        $catsArr = $CatObj->getcat();
        return view('backend/product/create',['catsArr'=>$catsArr,'depsArr'=>$depsArr]);
        
     }
      
     public function insert(Request $request) {
        $primary_image = '';
        $filename = '';
        if($request->hasfile('image') || $request->hasfile('primary_image') ){
           $allowedfileExtension=['pdf','jpg','png','docx'];
            $files = $request->file('image');
            $file2 = $request->file('primary_image');

            //echo '<pre>' . print_r($file,1) . '</pre>';exit;
            $primary_image = $file2->getClientOriginalName();
           /* echo $primary_image ; exit;*/
             $file2->move('images/'.$request->dep_id .'/'.$request->cat_id .'/' .$request->dname,$primary_image);
            $file_name ='';
            $extension ='';
             $filename ='';
              $check ='';
              if($files){
              foreach ($files as $file) {
                //$check=in_array($extension,$allowedfileExtension);
                
                 //if($check){
                    $file_name = $file->getClientOriginalName();
                     $extension = $file->getClientOriginalExtension();
                    $filename .= $file_name .';';
                    $image_name = $file->getClientOriginalName();
                    // echo $filename .'<br>';
                     $file->move('images/'.$request->dep_id .'/'.$request->cat_id .'/' .$request->dname,$image_name);
                     
                 }
              }
             // exit;
         }

        $product = New Product();
               $product->department_id = $request->dep_id;
               $product->category_id = $request->cat_id;
               $product->name = $request->dname;
               $product->description = $request->desc;
               $product->color = $request->color;
               $product->quantity = $request->quan;
               $product->price = $request->price;
               $product->actual_price = $request->aprice;
               $product->discount_percentage = $request->disper;
                $product->primary_image = $primary_image;
               $product->multiple_images = $filename;
               if($product->save()){
                return redirect()->action('backend\ProductController@view',['msg'=>'product has been created successfully']);
               }
     }

     public function view(){
    
        $ProObj = new Product();
        $prosArr = $ProObj->getpro();
       
        return view('backend/product/view', compact('prosArr'));

     }

     public function edit($id){
        $product = Product::findOrFail($id);
        $images = $product->multiple_images;
        $images = explode(";",$images);
        //$images = array_pop($images);
       // print_r($images);exit;
        $DepObj = new Department();
        $depsArr = $DepObj->getdep();

        $CatObj = new Categorie();
        $catsArr = $CatObj->getcat();
        return view('backend/product/edit',['catsArr'=>$catsArr,'depsArr'=>$depsArr,'product'=>$product,'images'=>$images]);
     }
     
     public function update(Request $request){
      $primary_image = '';
        $filename = '';
      if($request->hasfile('image') || $request->hasfile('primary_image')){
         $allowedfileExtension=['pdf','jpg','png','docx'];
            $files = $request->file('image');

            $file2 = $request->file('primary_image');

            //echo '<pre>' . print_r($file,1) . '</pre>';exit;
            $primary_image = $file2->getClientOriginalName();
             $file2->move('images/'.$request->dep_id .'/'.$request->cat_id .'/' .$request->dname,$primary_image);
            //echo '<pre>' . print_r($file,1) . '</pre>';exit;
           // $file_name = $file->getClientOriginalName();
            $file_name ='';
            $extension ='';
             $filename ='';
              $check ='';
          if($files){
          foreach ($files as $file) {
                //$check=in_array($extension,$allowedfileExtension);
                
                 //if($check){
                    $file_name = $file->getClientOriginalName();
                     $extension = $file->getClientOriginalExtension();
                    $filename .= $file_name .';';
                    $image_name = $file->getClientOriginalName();
                    // echo $filename .'<br>';
                     $file->move('images/'.$request->dep_id .'/'.$request->cat_id .'/' .$request->dname,$image_name);
                     
                 }
              }
             // exit;
         }
            //$filename = $file->store('image');
               $product = Product::findOrFail($request->id);
               $product->department_id = $request->dep_id;
               $product->category_id = $request->cat_id;
               $product->name = $request->dname;
               $product->description = $request->desc;
               $product->color = $request->color;
               $product->quantity = $request->quan;
               $product->price = $request->price;
               $product->actual_price = $request->aprice;
               $product->discount_percentage = $request->disper;
                $product->primary_image = $primary_image;
               $product->multiple_images = $filename;
               if($product->save()){
               return redirect()->action('ProductController@view',['msg'=>'product has been updated successfully']);
       }
      
     }

     public function deleteById($id){
      Product::where('id',$id)->delete();
      return redirect('admin/product/view/?msg=product has been deleted successfully');
     }

     public function getCategories(Request $request,$id){
     $categories =  Categorie::where('department_id',$id)->get();
      $categories_option ='';
        $categories_option .='<option value="">choose Category</option>';
      foreach( $categories as  $categories ){
          //echo $categories->name;
           $categories_option .='<option value="'.$categories->id.'">'.$categories->name.'</option>';
      }
    return response()->json($categories_option);
     }
}
