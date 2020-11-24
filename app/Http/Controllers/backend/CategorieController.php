<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Categorie;
use App\Models\Department;


class CategorieController extends BaseController{
     public function create() {
    
      $DepObj = new Department();
      $depsArr = $DepObj->getdep();
      
        return view('backend/category/create',['depsArr'=>$depsArr]);
        
     }
      
     public function insert(Request $request) {
       
        $arrcat['department_id'] = $request->input('dep_id');
        $arrcat['name']  = $request->input('dname');
        $arrcat['description'] = $request->input('desc');
    
        
      
       $cat=new Categorie();
       $cat->createcat($arrcat);

       return redirect()->action('CategorieController@create');
       
     }

     public function view(){
    
      $CatObj = new Categorie();
      $catsArr = $CatObj->getcat();
     
      return view('backend/category/view', compact('catsArr'));
     }

     public function show ($id) {
      $catObj=Categorie::find($id);
      $DepObj = new Department();
      $depsArr = $DepObj->getdep();
      $cat=$catObj->categorieDetails();
      
      return view('backend/category/update',['catsArr' => $cat, 'depsArr' => $depsArr]);
           
}

/*
 public function edit (Request $request,$id) {
    
      $catDetails['department_id'] = $request->input('dep_id');
      $catDetails['name'] = $request->input('dname');
      $catDetails['description'] =$request->input('desc');
      $catObj=Categorie::find($id);
   
      $catObj->edit($id,$catDetails);
}*/

public function updateById(Request $request){
  $category = Categorie::findOrFail($request->id);
  $category->department_id = $request->dep_id;
  $category->name = $request->dname;
  $category->description = $request->desc;
  if($category->save()){
    return redirect('admin/category/view');
  }
}

public function deleteById($id){
 $response = Categorie::where('id',$id)->delete();
  if($response){
    return redirect()->action('CategorieController@view');
  }
}
}
