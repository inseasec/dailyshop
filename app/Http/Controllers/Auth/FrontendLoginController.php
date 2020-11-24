<?php

namespace App\Http\Controllers\Auth;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;
class FrontendLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    } 

    public function showLoginForm(){

    	return view('frontend.auth.login');
    }

    public function customerLogin(Request $request) {

        $customer = Customer::where('email',$request->email)
            ->where('password',$request->password)
            ->get()->toArray();
          
        foreach( $customer as  $customer){

           $request->session()->put('customer_id',$customer['email']);
            return redirect('/');
        }

    	return view('frontend.auth.login',['msg'=>'Something Went Wrong']);
    }

    public function customerLogout() {

        if(Session::has('customer_id')) {

            print_r(Session::forget('customer_id'));
        }
       
        return redirect('/');
    }

   
}

        