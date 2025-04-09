<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewLoginController extends Controller
{
    // Show the login page
    public function showLoginPage()
    {
        // dd(config('app.timezone'), now());

        $pic = Storage::disk('s3')->url('coming soon new-1.jpg');
        
        return view('Newlogin', compact('pic'));
    }

    // Handle the login logic
    public function login(Request $request)
    {
        $validPassword = 'lo7wrNPytMEikGu'; // Replace this with your desired password

        if ($request->password === $validPassword) {
            return redirect('/welcome');
        } else {
            return redirect()->route('login.page')->with('error', 'Password does not match!');
        }
    }
}
