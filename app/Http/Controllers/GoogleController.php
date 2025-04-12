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

     * Create a new controller instance.

     *

     * @return void

     */

    public function redirectToGoogle()

    {

        return Socialite::driver('google')->redirect();

    }

        

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function handleGoogleCallback()

    {

        try {

      

            $user = Socialite::driver('google')->user();

       

            $finduser = User::where('google_id', $user->id)->first();

       

            if($finduser){

       

                Auth::login($finduser);

      

                return redirect()->back();
                // return redirect('/');

       

            }else{
                
                
                $mcount = DB::table('users')->where('email', $user->email)->count();
                
                if($mcount > 0)
                {
                    $finduser11 = User::where('email',$user->email)->first();

                    Auth::login($finduser11);
    
          
    
                    return redirect()->back();
                    // return redirect('/');

                    
                }
                else
                {
                    $newUser = User::create([

                        'name' => $user->name,
    
                        'email' => $user->email,
    
                        'google_id'=> $user->id,
    
                        'password' => $user->password,
    
                    ]);
    
          
    
                    Auth::login($newUser);
    
          
    
                    return redirect()->back();
                    // return redirect('/');
                }


            }

      

        } catch (Exception $e) {

            dd($e->getMessage());

        }

    }

}