<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session;
 
class SessionController extends Controller
{
 
    public function index()
    {
      $users = DB::table('users')->get();
 
    	return view('login',['users' => $users]);
    }  
 
    public function registration()
    {
        return view('registration');
    }
     
    public function postLogin(Request $request)
    {
        request()->validate([
        'email' => 'required',
        'password' => 'required',
        ]);
 
        $credentials = $request->only('email', 'password');
        $email = $request->only('email');
        if (Auth::attempt($credentials)) {

            if(Auth::user()->admin == 1){
              return redirect()->intended('/location_data');
            }else{
              return redirect()->intended('/');
            }
            
        }
        return Redirect::to("login")->withSuccess('Invalid credentials!');
    }
 
    public function postRegistration(Request $request)
    {  
        request()->validate([
        'username' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'admin' => '0'
        ]);
         
        $data = $request->all();
 
        $check = $this->create($data);
       
        return Redirect::to("/")->withSuccess('Logged in.');
    }
     
    public function dashboard()
    {
 
      if(Auth::check()){
        return view('dashboard');
      }
       return Redirect::to("login")->withSuccess('You do not have access');
    }
 
    public function create(array $data)
    {
      return User::create([
        'username' => $data['username'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'admin' => '0'
      ]);
    }
     
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
}