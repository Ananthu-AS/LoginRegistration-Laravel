<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use App\Models\User;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class CustomAuthController extends Controller
{
    public function login(){
        return view("Auth.login");
    }
    public function registration(){
        return view("Auth.registration");
    }
    public function registerUser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12',
        ]);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password= Hash::make($request->password);
        $res=$user->save();
        if($res){
            return back()->with('success','You have registered sucessfully.');
        }else{
            return back()->with('fail','oops something wrong.');
        }
        
    }
    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12',
        ]);
        $user= User::where('email','=',$request->email)->first();

        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginId',$user->id);
                return redirect('dashboard');
            }else{
                return back()->with('fail','password not matching.');
            }
        }else{
            return back()->with('fail','Email not registered.');
        }
    }
    public function dashboard(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        return view("Auth.dashboard",compact('data'));
    }
    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
        }
        return redirect('login');
    }
    public function forgotpassword(){
       
        return view("Auth.forgotpassword");
    }
    public function resetPassword(Request $request){
        $request->validate(['email' => 'required|email']);
        
        $token = Str::random(64);

        Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        return back()->with('message', 'We have e-mailed your password reset link!');
    }
}
