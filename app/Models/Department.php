<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;
use App\Models\Categorie;
use Illuminate\Http\Request;
class Department extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
   
    

 public function createdep(array $dep){
       
        Department::create($dep);
    }

    public function getdep(){
        return $this->get()->toArray();
    }
  
    public function edit($id,$data){
        $DepObj=Department::find($id);
        $DepObj->update($data);
        
     }
  
     public function departmentdetails(){
           
           return [
               'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
          
           ];
  
     }

     public function dest($id){
    
         $del=Department::find($id);
         $del->delete();
    }

    public function getCategoriesById($id){
        return Categorie::where('department_id',$id)->get();
     }


}