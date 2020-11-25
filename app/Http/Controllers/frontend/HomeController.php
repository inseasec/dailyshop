<?php
namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Categorie;
use App\Models\Cart;
use App\Models\Department;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
     public function __construct(){
  
    /*$user = User::all();*  test change to test git sync/
         

     /* all department */
        $department = Department::all()->toArray();
      /*  echo '<pre>' . print_r($categories,1) . '</pre>';exit;*/
        
        foreach($department as $department){
            $categories = Categorie::where('department_id',$department['id'])->get()->toArray();
            foreach($categories as $categories){
            $department_category[$department['name']][] =  $categories['name'];
            }   
        }


        /* deparntment name with only category name */
        $categories = Categorie::all()->toArray();
        foreach($categories as $categories){
            $products = Product::where('category_id',$categories['id'])->get()->toArray();
            foreach($products as $products){
            $categories_products[$categories['name']][] =  $products;
            }   
        }
       $products = Product::all()->toArray();
        /*echo '<pre>' . print_r($products,1) . '</pre>';*/

     /************ all department ***************/
      $all_categories = Categorie::all();

       /************ all products ***************/
        $all_products = Product::all();

        $all_cart_product = Cart::all();
   
    \View::share(['department'=>$department,'department_category'=>$department_category,'categories_products'=>$categories_products,'products'=>$products ,'all_categories'=>$all_categories,'all_products'=>$all_products,'all_cart_product'=>$all_cart_product]);

    }


    function index(){
      
            return view('frontend.page_content');
    }

   public function insertt($p_id){
    $product = Product::findOrFail($p_id)->toArray();

   // return view('frontend.insert-product',['product'=>$product]);
   $carts = New Cart();
   $carts->department_id =$product->department_id;
   $carts->name =$product->name;
   $carts->description =$product->description;
   $carts->color =$product->color;
   $carts->quantity =$product->quantity;
   $carts->price = $request->price;
   $carts->actual_price =$product->actual_price;
   $carts->discount_percentage->discount_percentage;
   if($carts->save()){
    return redirect()->action('frontend\ProductController@view',['msg'=>'product has been inserted successfully']);
   }
  }

    /*show single product*/
  public function showSingleProduct($id){
    $p_id=$id;
     $single_product = Product::findOrFail($id)->toArray();

    /* print_r($single_product['category_id']); exit;*/
      $single_category = Categorie::findOrFail($single_product['category_id'])->toArray() ;
       $single_category = $single_category['name'];
     $multiple_images = $single_product['multiple_images'];
      $multiple_images =array(explode(';', $multiple_images));
     /* echo '<pre>' .print_r($multiple_images,1) .'</pre>';*/
      return view('frontend.single-product',['single_product'=>$single_product,'p_id'=>$p_id,'multiple_images'=>$multiple_images,'single_category'=>$single_category]);
  }
  public function addToCart(){
        if($this->getSession()){
            return redirect('show-cart');
        }else{
            return redirect('customer-login-form');
        }
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
              return redirect()->action('frontend\ProductController@view',['msg'=>'product has been inserted successfully']);
             }
   }
    public function showCart(){

       if($this->getSession()){
           return view('frontend.cart');
        }else{
            return redirect('customer-login-form');
        }
        
    }
    public function showWishList(){
      if($this->getSession()){
           return view('frontend.wishlist');
        }else{
            return redirect('customer-login-form');
        }    
    }

    public function showcheckout(){
      if($this->getSession()){
           return view('frontend.checkout');
        }else{
            return redirect('customer-login-form');
        }
       
    }
    public function getSession(){
       if(Session::has('customer_id')){
        return true;
       }else{
        return false;
       }
    }

    public function showSingleCategoryProducts($name){
      $categories = Categorie::where('name',$name)->get()->pluck('id');
      $category_id = $categories['0'];
      $single_category_products = Product::where('category_id',$category_id)->get()->toArray();
       /* echo '<pre>' .print_r($category_products,1) .'</pre>';*/


      return view('frontend.single_category_products',['single_category_products'=>$single_category_products]);
    }
    public function showDepartmentPage($name){
      $depatment = Department::where('name',$name)->get()->pluck('id');
      $department_id = $depatment['0'];
      $single_department_products = Product::where('department_id',$department_id)->get()->toArray();
         /* echo '<pre>' .print_r($single_department_products,1) .'</pre>';*/
      $single_department_categories = Categorie::where('department_id',$department_id)->get()->toArray();
       /*  echo '<pre>' .print_r($single_department_categories,1) .'</pre>';*/
    

      return view('frontend.single_department_products',[
        'single_department_categories'=>$single_department_categories,
        'single_department_products'=>$single_department_products
      ]);
    }
    public function addDataToCart($id){
      $cart_product = Product::where('id',$id)->get();
      $cart = New Cart();
       foreach($cart_product as $cart_product){
       $cart->department_id = $cart_product->department_id;
       $cart->name = $cart_product->name;
       $cart->description = $cart_product->description;
       $cart->color = $cart_product->color;
       $cart->quantity = $cart_product->quantity;
       $cart->price = $cart_product->price;
       $cart->actual_price = $cart_product->actual_price;
       $cart->discount_percentage = $cart_product->discount_percentage;
       $cart->save();
      /* if($cart->save()){
         echo 'Product has been added to your cart';
       }*/
       $all_cart_product = Cart::all();

      // echo $all_cart_product;
      $cart_products ='';
      foreach($all_cart_product as $all_cart_product){
        $cart_products .='<li>';
        $cart_products .='<a class="aa-cartbox-img" href="#"><img src="img/woman-small-2.jpg" alt="img"></a>';
        $cart_products .='<div class="aa-cartbox-info">';
        $cart_products .='<h4><a href="#"> '.$all_cart_product->name .'</a></h4>';
        $cart_products .='<p>1 x $250</p>';
        $cart_products .='</div>';
        $cart_products .='</li>';
        
      }
      echo  $cart_products;
       }
      
    }
}
/*<li>
<a class="aa-cartbox-img" href="#"><img src="img/woman-small-2.jpg" alt="img"></a>
<div class="aa-cartbox-info">
<h4><a href="#">Product Name</a></h4>
<p>1 x $250</p>
</div>
<a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
</li>
*/