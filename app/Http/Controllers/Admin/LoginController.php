<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/admin';
  
    public function __construct() {
    $this->middleware('guest:admin')->except('logout');
    }
    public function showLoginForm() {
    return view('admin.login');
    }
    protected function guard() {
    return Auth::guard('admin');
    }
    public function logout(Request $request) {
    Auth::guard('admin')->logout();
    $request->session()->regenerate();
    return redirect('/admin/login');
    }
}

