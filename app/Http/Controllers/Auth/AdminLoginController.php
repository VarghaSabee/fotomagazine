<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Route;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:adminss', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
//        $adminss = new Admin();
//        $adminss->name = "Admin";
//        $adminss->password = Hash::make('adminadmin');
//        $adminss->email = "adminss@gmail.com";
//        $adminss->image = " ";
//        $adminss->telephone = "380965656254";
//
//        $adminss->save();
        return view('adminss.login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Attempt to log the user in
        if (Auth::guard('adminss')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('adminss.dashboard'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('adminss')->logout();
        return redirect('/');
    }
}