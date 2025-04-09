<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Handle tasks after a successful login
     */
    protected function authenticated(Request $request, $user)
    {
        // Retrieve or create temp_user_id
        if (!session()->has('temp_user_id')) {
            session()->put('temp_user_id', 'temp_' . time());
        }
    
        $tempUserId = session()->get('temp_user_id');
    
        // Update carts table, linking guest cart items to the logged-in user
        DB::table('carts')->where('temp_user_id', $tempUserId)->update([
            'user_id' => $user->id
        ]);
    
        // Clear temp_user_id session after linking carts
        session()->forget('temp_user_id');
    
        // Set a flash session to indicate successful login
        session()->flash('clear_localstorage', true);
    
        // Redirect to the previous page OR fallback to home/dashboard
        return redirect()->intended(url()->previous());
    }

    /**
     * Determine where to redirect users after login.
     */
    protected function redirectTo()
    {
        if (Auth::user()->user_type == 'Seller') {
            return RouteServiceProvider::SELLERDASHBOARD;
        } else {
            return RouteServiceProvider::HOME;
        }
    }

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}