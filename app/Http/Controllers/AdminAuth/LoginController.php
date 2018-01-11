<?php 
namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// use Auth;
class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/manager';
    protected $table = 'admins';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function showLoginForm()
    {   
        return view('admin.auth.login');
    }

    public function login(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
            ]);

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            return redirect('/manager');
            // echo 'LOGGED IN';
        }

        // return redirect()->intended(route('admin/login'));
        // echo 'NOT LOGGED IN';

    }
}

?>