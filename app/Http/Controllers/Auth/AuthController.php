<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function loginIndex() {
        if(Auth::check()) {
            return redirect()->route("admin-dashboard");
        }
        return view('content.authentications.auth-login');
    }

    public function login(Request $request) {
        if(Auth::check()) {
            return redirect()->route("admin-dashboard");
        }
        // Validate input fields
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    
        // Attempt to authenticate the user
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // If successful, regenerate session to prevent fixation attacks
            $request->session()->regenerate();      
            return redirect()->route("admin-dashboard");
        } else {
            return redirect()->back();
        }

        // If authentication fails, redirect back with an error message
         // Keep username input but clear password field
    }

    public function logout(Request $request) {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();

        return redirect()->back();
        }
    
}
