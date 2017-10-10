<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use DB;
use Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Auth;
use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
use Chrisbjr\ApiGuard\Models\ApiKey;
use App\Transformer\ApiKeyTransformer;

use App\User;
use Validator;


class LoginController extends ApiGuardController
{

    protected $apiMethods = [
        'Apiauthenticate' => [
            'keyAuthentication' => false
        ],
        'Webauthenticate' => [
            'keyAuthentication' => false
        ],

    ];

    public function Apiauthenticate(Request $request) {
       // return Input::all();
        $credentials['email'] = Input::get('email');
        $credentials['password'] = Input::get('password');
        $device_id = Input::get('device_id');
        $validator = Validator::make([
            'email' => $credentials['email'],
            'password' => $credentials['password']
        ],
            [
                'email' => 'required|max:255',
                'password' => 'required|max:255'
            ]
        );

        if ($validator->fails()) {
           return $this->response->errorWrongArgsValidator($validator);
        }

        try {
            $user = User::where('email', '=', $credentials['email'])->first();
            $credentials['email'] = $user->email;
        } catch (\ErrorException $e) {
            return response()->json([
                'status'    => 'ERROR',
                'message'   => 'Your username or password is incorrect'
            ]);
          //  return $this->response->errorUnauthorized("Your username or password is incorrect");
        }

        if (Auth::attempt($credentials) == false) {
            //$this->response->errorUnauthorized("Your username or password is incorrect");
            return response()->json([
                'status'    => 'ERROR',
                'message'   => 'Your username or password is incorrect'
            ]);
        }
        // We have validated this user
        // Assign an API key for this session
        $apiKey = ApiKey::where('user_id', '=', $user->id)->first();
        if (!isset($apiKey)) {
            $apiKey = new ApiKey;
            $apiKey->user_id = $user->id;
            $apiKey->key = $apiKey->generateKey();
            $apiKey->level = $user->usertype;
            $apiKey->ignore_limits = 0;
        } else {
            $apiKey->generateKey();
        }

        if (!$apiKey->save()) {
            return $this->response->errorInternalError("Failed to create an API key. Please try again.");
        }
        $apiKey = ApiKey::where('user_id', '=', $user->id)->select('id','user_id','level')->first();
        // We need to save Device id for logged user
        $device =  DB::table('users')
            ->where('id', $user->id)
            ->update([
                'device_id' => $device_id,
            ]);
        // We have an API key.. i guess we only need to return that.
        return response()->json(['data'=>$apiKey,
                'status'    => 'SUCCESS',
                'message'   => 'User was successfuly Authenticated'
        ]);
      //  return $this->response->withItem($apiKey, new ApiKeyTransformer);
    }
    public function Webauthenticate(Request $request){

        $credentials['email'] = Input::get('email');
        $credentials['password'] = Input::get('password');
       // $device_id = \Request::ip();
        $validator = Validator::make([
            'email' => $credentials['email'],
            'password' => $credentials['password']
        ],
            [
                'email' => 'required|max:255',
                'password' => 'required|max:255'
            ]
        );

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $user = User::where('email', '=', $credentials['email'])->first();
            $credentials['email'] = $user->email;
        } catch (\ErrorException $e) {
            return redirect('/')
                ->withErrors('Username or password is invalid')
                ->withInput();
        }

        if (Auth::attempt($credentials) == false) {
            return redirect('/')
                ->withErrors('Username or password is invalid')
                ->withInput();
        } else {
            if ($user->usertype == '1') {
//                $device =  DB::table('users')
//                    ->where('id', $user->id)
//                    ->update([
//                        'device_id' => $device_id,
//                    ]);
                return redirect('/admin')
                    ->with('success', 'You logged successfully');
            }
            return redirect('/')
                ->withErrors('Username or password is invalid')
                ->withInput();
        }
    }

    public function deauthenticate() {
        if (empty($this->apiKey)) {
            return $this->response->errorUnauthorized("There is no such user to deauthenticate.");
        }

        $this->apiKey->delete();

        return $this->response->withArray([
            'ok' => [
                'code'      => 'SUCCESSFUL',
                'http_code' => 200,
                'message'   => 'User was successfuly deauthenticated'
            ]
        ]);
    }
}