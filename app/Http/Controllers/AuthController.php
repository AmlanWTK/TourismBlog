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
        $user = User::where('remember_token', '=', $token)->first();
        if (!empty($user)) {
            $getPage = PageModel::getSlug('reset');
            $data['meta_title'] = !empty($getPage) ? $getPage->meta_title : 'ResetPassword';
            $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : '';
            $data['meta_keywords'] = !empty($getPage) ? $getPage->meta_keywords : '';
            $data['user'] = $user;
            return view('auth.reset', $data);
        } else {
            abort(404);
        }
    }

    public function post_reset($token, Request $request)
    {
        $user = User::where('remember_token', '=', $token)->first();
        if (!empty($user)) {
            if ($request->password == $request->cpassword) {
                $user->password = Hash::make($request->password);
                if (empty($user->email_verified_at)) {
                    $user->email_verified_at = date('Y-m-d H:i:s');
                }
                $user->remember_token = Str::random(40);
                $user->save();

                return redirect('login')->with('success', "Password successfully reset!");
            } else {
                return redirect()->back()->with('error', "Passwords don't match!");
            }
        } else {
            abort(404);
        }
    }
    
    public function forgot_password(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        if (!empty($user)) {
            $user->remember_token = Str::random(40);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('success', "Please check your mailbox to reset password.");
        } else {
            return redirect()->back()->with('error', "No user created with this email.");
        }
    }

    public function auth_login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            if (!empty($user->email_verified_at)) {
                session(['user_id' => $user->id]);
                if ($user->is_admin) {
                    return redirect('panel/dashboard');
                } else {
                    return redirect('panel/dashboard_user');
                }
            } else {
                $user->remember_token = Str::random(40);
                $user->save();
                Mail::to($user->email)->send(new RegisterMail($user));
                return redirect()->back()->with('success', "Please verify your email first.");
            }
        } else {
            return redirect()->back()->with('error', "Sorry, we don't recognize that username or password. You can try again or reset your password.");
        }
    }

    public function create_user(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(40);
        $user->save();

        Mail::to($user->email)->send(new RegisterMail($user));

        return redirect('login')->with('success', "Registered Successfully! Verify your email.");
    }

    public function verify($token)
    {
        $user = User::where('remember_token', '=', $token)->first();
        if (!empty($user)) {
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->remember_token = Str::random(40);
            $user->save();

            return redirect('login')->with('success', "Account successfully verified.");
        } else {
            abort(404);
        }
    }

    public function logout()
    {
        session()->forget('user_id');
        return redirect('login');
    }

    public function loggedout(Request $request)
    {
        session()->forget('user_id');
        return redirect('/');
    }

    private function isAuthenticated()
    {
        return session()->has('user_id');
    }
    
    private function getAuthenticatedUser()
    {
        if ($this->isAuthenticated()) {
            return User::find(session('user_id'));
        }
        return null;
    }
}
