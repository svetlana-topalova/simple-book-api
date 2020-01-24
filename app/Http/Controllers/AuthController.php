<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp;
use App\User;

class AuthController extends Controller {

    public function register(Request $request) {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        try {
            $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => bcrypt($request->password),
                        'is_subscribed' => $request->is_subscribed,
                        'is_author' => $request->is_author
            ]);
        } catch (\Exception $e) {
            return response()->json('Something went wrong on the server.', 500);
        }


        return response()->json("Successful registration", 201);
    }

    public function login(Request $request) {
        $http = new GuzzleHttp\Client();
        try {

            $response = $http->post(config('services.passport.login_endpoint'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => config('services.passport.client_id'),
                    'client_secret' => config('services.passport.client_secret'),
                    'username' => $request->username,
                    'password' => $request->password,
                ]
            ]);

            return $response->getBody();
        } catch (GuzzleHttp\Exception\BadResponseException $e) {

            if ($e->getCode() === 400) {
                return response()->json('Invalid Request. Please enter a username or a password.', $e->getCode());
            } else if ($e->getCode() === 401 || $e->getCode() === 404) {
                return response()->json('Your credentials are incorrect. Please try again', $e->getCode());
            }

            return response()->json('Something went wrong on the server.', $e->getCode());
        }
    }

    public function logout() {
        try {
            auth()->user()->tokens->each(function ($token, $key) {
                $token->delete();
            });
        } catch (\Exception $e) {
            return response()->json('Something went wrong on the server.', 500);
        }


        return response()->json('Logged out successfully', 200);
    }

    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                    'is_subscribed' => ['boolean'],
                    'is_author' => ['boolean'],
        ]);
    }

}
