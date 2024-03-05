<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:warga');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function show(Request $request)
    {
        
        if ($request->user('warga')->hasVerifiedEmail()) {
            return redirect()->route('home');
        }
        return view('page.publik.auth.verify');
    }

    
    public function verify(Request $request)
    {
        if ($request->route('id') != $request->user('warga')->getKey()) {
            //id value doesn't match.
            return redirect()
                ->route('verification.notice')->with('error','Invalid user!');
        }

        if ($request->user('warga')->hasVerifiedEmail()) {
            return redirect()->route('home');
        }

        $request->user('warga')->markEmailAsVerified();

        return redirect()->route('home')->with('status','Thank you for verifying your email!');
    }
}
