<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use App\Services\Login\RememberMeExpiration;

class LoginController extends Controller
{
    // use RememberMeExpiration;
    //
    public function index(Request $request)
    {
        Auth::logout();
        return view('login.index');
    }
    public function auth(LoginRequest $request)
    {
        if( App::environment() == "production" ){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => '6LcIi3AaAAAAALIz5t4i3Zmn7_0Qyv--p7Pxwyuc', 'response' => $request->token)));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            $arr_recap = json_decode($response, true);

            if ($arr_recap["success"] != '1' || $arr_recap["action"] != 'login' || $arr_recap["score"] < 0.5) {
                sleep(100);
                return response()->json([
                    'success' => false,
                    'message' => 'Hubo un problema con tu solicitud. No podemos validar tu información. Intentalo más tarde.'
                ], 500);
                exit;
            }
        }
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (!Auth::validate($credentials)):
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user, $request->get('remember'));

        // if($request->get('remember')):
        //     $this->setRememberMeExpiration($user);
        // endif;

        return $this->authenticated($request, $user);
        // return response()->json($request);
    }
    /**
     * Handle response after user authenticated
     *
     * @param Request $request
     * @param Auth $user
     *
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }
    //TCkezSP-<7D2FHESt
}
