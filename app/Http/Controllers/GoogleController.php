<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;

class GoogleController extends Controller
{
    /**
     * Redirect to Google login page and store the next URL.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogle(Request $request)
    {
        // Store the 'next' URL in the session, if available
        if ($request->has('next')) {
            $request->session()->put('url.intended', $request->input('next'));
        }

        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle the Google callback.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleCallback(Request $request)
    {
        try {
            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {
                Auth::login($finduser);
                // Redirect to the intended 'next' URL or fallback to the home page
                return redirect()->intended('/');
            } else {
                // Check if the email already exists in the database
                $mcount = DB::table('users')->where('email', $user->email)->count();

                if ($mcount > 0) {
                    $finduser11 = User::where('email', $user->email)->first();
                    Auth::login($finduser11);
                    return redirect()->intended('/'); // Redirect to the 'next' URL or home page
                } else {
                    // Create a new user if they don't exist
                    $newUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'google_id' => $user->id,
                        'password' => bcrypt(str_random(16)), // Ensure to hash the password
                    ]);

                    Auth::login($newUser);
                    return redirect()->intended('/'); // Redirect to the 'next' URL or home page
                }
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}