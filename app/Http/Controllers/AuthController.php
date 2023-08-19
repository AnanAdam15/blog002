<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('content.login');
    }

    public function checkLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/content');
        }

        return back()->withErrors([
            'email' => 'Credentials do not match our records',
        ]);
    }
}

/*
<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function showLogin(){
        return view('content.login');
    }
    public function checkLogin(Request $request)
    {
        $credentials = $request->validate([
            'email'=> ['requires','email'],  แก้นะ ว่าละทำไมถึงเชื่อมกันไม้ได้เพราะว่า requires ผิด ต้องเป็น required นะจะ 
            'password'=> ['required'],
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/content');
        }
        return back()->withErrors([
            'email'=> 'creadentials do not match our records',
        ]);

    }
}

*/
