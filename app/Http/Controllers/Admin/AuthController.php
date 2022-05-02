<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function logar(Request $request)
    {
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'ativo' => 1]))
        {
            return redirect(route('admin.home'));
        }
        else
        {
            return back()->with('error', 'Invalid email or password');
        }
    }

    public function login(Request $request)
    {
        return view('admin.auth.login');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }

    public function home(Request $request)
    {
        return view('admin.painel.home');
    }

    public function esqueci(Request $request){
        $user = Admin::where('email', '=', $request->email)->first();

        if ($user == null || $user->count() < 1) {
            return redirect()->back()->withError('User does not exist');
        }
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Str::random(40),
            'created_at' => Carbon::now()
        ]);

        $tokenData = DB::table('password_resets')
            ->where('email', $request->email)->orderBy('created_at', 'desc')
            ->first();
        $link = url('admin/password/reset/' . $tokenData->token . '?email=' . urlencode($request->email));
        try{
            Mail::to($request->email)->send(new ResetPassword($link, $user->name));
            return redirect()->back()->with('success', "A reset link has been sent to your email address.");
        }
        catch(\Exception $ex){
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function reset($token, Request  $request){
        return view('admin.auth.reset')->with(['email' => $request->email, 'token' => $token]);
    }

    public function resetar(ResetPasswordRequest $request){

        $tokenData = DB::table('password_resets')
        ->where('token', $request->token)->first();

        $user = Admin::where('email', $tokenData->email)->first();

        $user->password = Hash::make($request->password);
        $user->update();

        //Delete the token
        DB::table('password_resets')->where('email', $user->email)
        ->delete();

        return view("admin.auth.login")->with('success', "Password change successfully!");
    }

}
