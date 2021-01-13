<?php

namespace App\Http\Controllers\Organization\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Organization;
use Carbon\Carbon;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating organization users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/org/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:organization')->except('logout');
    }

    public function showLoginForm()
    {
        return view('organization.auth.login');
    }

    protected function guard(){
        return Auth::guard('organization');
    }

    public function authenticated(Request $request, $user)
    {
        $user_details = Organization::findOrFail($user->id);
        $user_details->last_login_time = Carbon::parse(Carbon::now())->format('Y-m-d h:i:s');
        $user_details->update();
    }
}
