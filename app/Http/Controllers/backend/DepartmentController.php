<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use App\Models\Department;


class DepartmentController extends BaseController {
   public function create() {
    
        return view('backend/department/create');
        
     }
      
     public function insert(Request $request) {
      
         
        $arrdep['name']  = $request->input('dname');
        $arrdep['description'] = $request->input('desc');
       
        
      
       $dep=new Department();
       $dep->createdep($arrdep);

       return redirect()->action('DepartmentController@create');

     }


     public function view(){
    
      $DepObj = new Department();
      $depsArr = $DepObj->getdep();
     
      return view('backend/department/view', compact('depsArr'));
     }




     public function show ($id) {
       
      $depObj=Department::find($id);
      $dep=$depObj->departmentDetails();
       return view('backend/department/Update',['depsArr'=>$dep]);
           
}


 public function edit (Request $request,$id) {
    

      $depDetails['name'] = $request->input('dname');
      $depDetails['description'] =$request->input('desc');
     

      $depObj=Department::find($id);
   
      $depObj->edit($id,$depDetails);



      return redirect()->action('DepartmentController@view');


 }	

 public function delete($id) {
 
   $depdel= new Department();
   $depdel->dest($id);
  
  return redirect()->action('DepartmentController@view');
}

}
