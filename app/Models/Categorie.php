<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;
use Illuminate\Http\Request;

class Categorie extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description','department_id'
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
    
   
    

 


    public function createcat(array $cat){
       
        Categorie::create($cat);
    }

    public function getcat(){
        return $this->get()->toArray();
    }

 
    public function edit($id,$data){
        $CatObj=Categorie::find($id);
        $CatObj->update($data);
        
     }
  
     public function categoriedetails(){
           
           return [
               'id' => $this->id,
               'department_id' => $this->department_id,
            'name' => $this->name,
            'description' => $this->description,
          
           ];
  
     }

    }
