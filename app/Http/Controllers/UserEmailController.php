<?php

namespace App\Http\Controllers;

use App\mail\resetPassword;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailer;
use PHPUnit\Framework\TestStatus\Failure;
use Illuminate\Support\Str;

class UserEmailController extends Controller
{
    /**
     * Register user
     * @param request
     * @return response
     */
    

    /**
     * Login page
     * @param NA
     * @return view
     */

    /**
     * User Login
     * @param request
     * @return response
     */
   
    /**
     * Forgot password
     * @param NA
     * @return view
     */
    public function forgotPassword()
    {
        return view('reset.forgot-password');
    }

    /**
     * Validate token for forgot password
     * @param token
     * @return view
     */
    public function forgotPasswordValidate($token)
    {
        $user = UserModel::where('token', $token)->where('is_verified', 0)->first();
        if ($user) {
            $email = $user->email;
            return view('reset.change-password', compact('email'));
        }
        return redirect()->route('forgot-password')->with('failed', 'Password reset link is expired');
    }

    /**
     * Reset password
     * @param request
     * @return response
     */
    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $user = UserModel::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('failed', 'Failed! email is not registered.');
        }

        $token = Str::random(60);

        $user['token'] = $token;
        $user['is_verified'] = 0;
        $user->save();

        Mail::to($request->email)->send(new ResetPassword($user->name, $token));
        if($user){
            return back()->with('success','Send mail success');
        }
      
        return back()->with('failed', 'Failed! there is some issue with email provider');
    }

    /**
     * Change password
     * @param request
     * @return response
     */
    public function updatePassword(Request $request) {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);

        $user = UserModel::where('email', $request->email)->first();
        if ($user) {
            $user['is_verified'] = 0;
            $user['token'] = '';
            $user['password'] = md5($request->password);
            $user->save();
            return redirect('/login')->with('success', 'Success! password has been changed');
        }
        return redirect()->route('forgot-password')->with('failed', 'Failed! something went wrong');
    }
}