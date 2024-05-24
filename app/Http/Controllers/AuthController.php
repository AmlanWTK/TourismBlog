<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PageModel;
use App\Mail\RegisterMail;
use App\Mail\ForgotPasswordMail;
use Hash;
use Mail;
use Str;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        $getPage = PageModel::getSlug('login');
        $data['meta_title'] = !empty($getPage) ? $getPage->meta_title : 'Login';
        $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : '';
        $data['meta_keywords'] = !empty($getPage) ? $getPage->meta_keywords : '';
        return view ('auth.login', $data);
    }
    public function register()
    {
        $getPage = PageModel::getSlug('register');
        $data['meta_title'] = !empty($getPage) ? $getPage->meta_title : 'Register';
        $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : '';
        $data['meta_keywords'] = !empty($getPage) ? $getPage->meta_keywords : '';
        return view ('auth.register', $data);
    }
    public function forgot()
    {
        $getPage = PageModel::getSlug('forgot');
        $data['meta_title'] = !empty($getPage) ? $getPage->meta_title : '';
        $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : '';
        $data['meta_keywords'] = !empty($getPage) ? $getPage->meta_keywords : '';
        return view ('auth.forgot', $data);
    }
    public function reset($token)
    {
        $user= User::where('remember_token', '=', $token)->first();
        if(!empty($user)){
            $getPage = PageModel::getSlug('reset');
            $data['meta_title'] = !empty($getPage) ? $getPage->meta_title : 'ResetPassword';
            $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : '';
            $data['meta_keywords'] = !empty($getPage) ? $getPage->meta_keywords : '';
            $data['user'] = $user;
            return view ('auth.reset', $data);
        }
        else{
            abort(404);
        }
    }

    public function post_reset($token, Request $request){
        $user= User::where('remember_token', '=', $token)->first();
        if(!empty($user)){
            if($request->password == $request->cpassword){
                $user->password = Hash::make($request->password);
                if(empty($user->email_verified_at)){
                    $user->email_verified_at =date('Y-m-d H:i:s');
                }
               
                $user->remember_token = Str::random(40);
                $user->save();

                return redirect('login')->with('success', "Password successfully reset!");
            }
            else{
                return redirect()->back()->with('error', "Passwords don't match!");
            }
        }
        else{
            abort(404);
        }
    }
    public function forgot_password(Request $request)
    {
        $user= User::where('email', '=', $request->email)->first();
        if(!empty($user)){
            $user->remember_token = Str::random(40);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('success', "Please check your mailbox to reset password.");
        }
        else{
            return redirect()->back()->with('error', "No user created with this email.");
        }
    }

    public function auth_login(Request $request)
    {
       //dd($request->all());
       $remember = !empty($request->remember) ? true: false;
       if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
       {
        if (!empty(Auth::user()->email_verified_at)){
            // Redirect based on whether the user is an admin or not
            if (Auth::user()->is_admin) {
                return redirect('panel/dashboard');
            } else {
                return redirect('panel/dashboard_user');
        }
        }
        else
        {   
            $user_id = Auth::user()->id;
            Auth::logout(); //after logout , token automatically changes so have to send the $user_id

            $save= User::getSingle($user_id);
            $save->remember_token = Str::random(40);
            $save->save();


            Mail::to($save->email)->send(new RegisterMail($save));
            return redirect()->back()->with('success', "Please verify your email first.");

        }

       }
       else
       {
        return redirect()->back()->with('error', "Sorry, we don't recognize that username or password. You can try again or reset your password.");
           
       }
      
       
    }


    public function create_user(Request $request)
    {
        request()->validate([
            'name' =>'required',
            'email' =>'required|email|unique:users',
            'password' =>'required'
           ]);
         
       $save= new User;
       $save->name = trim($request->name); //trim space reduce kora
       $save->email = trim($request->email);
       $save->password = Hash::make($request->password);
       $save->remember_token = Str::random(40);
      
       $save->save();

       Mail::to($save->email)->send(new RegisterMail($save));


       
       return redirect('login')->with('success', "Registered Succesfully! Verify your email.");
    }





    public function verify($token)
    {
        $user = User::where('remember_token', '=', $token)->first();
        if(!empty($user)){
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->remember_token = Str::random(40);
            $user->save();

            return redirect('login')->with('success', "Account succesfully verified.");
        }
        else{
            abort(404);
        }

    }
    public function logout(){
        Auth::logout();
        return redirect('login');
    }
    
    public function loggedout(Request $request){
        Auth::logout();
        return redirect('/');
    }

  

}
