<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp;
use App\User;
use Illuminate\Support\Facades\Auth;

/**
 * @group User authentication
 *
 * APIs for user authentication
 */
class AuthController extends Controller {

    /**
     * Register User
     * 
     * @bodyParam name string required The name of the user.
     * @bodyParam email email required The email of the user.
     * @bodyParam password string required The password of the user.
     * @bodyParam is_subscribed boolean If user is subscribed.
     * @bodyParam is_author boolean If user is author.
     * @response 201 { 
     * "message":  "Successful registration"
     * }
     * @response 400 {
     * "password": ["The password confirmation does not match."]
     * }
     * @response 500 {
     * "message": "Something went wrong on the server."
     * }
     */
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
            return response()->json(['message' => 'Something went wrong on the server.'], 500);
        }


        return response()->json(['message' => "Successful registration"], 201);
    }

    /**
     * Login User
     * 
     * @bodyParam username email required The email of the user.
     * @bodyParam password string required The password of the user.
     * @response 200 { 
     * "access_token":  "{token}"
     * }
     * @response 401 {
     * "message": "Your credentials are incorrect. Please try again"
     * }
     */
    public function login(Request $request) {

        if (Auth::attempt(['email' => $request->username, 'password' => $request->password])) {
            $user = auth()->user();
            $success['access_token'] = $user->createToken($user->email . '-' . now())->accessToken;
            return response()->json($success, 200);
        } else {
            return response()->json(['message' => 'Your credentials are incorrect. Please try again'], 401);
        }
    }

    /**
     * Logout User
     * 
     * @authenticated
     * 
     * @response 200 { 
     * "message":  "Logged out successfully"
     * }
     * @response 500 {
     * "message": "Something went wrong on the server."
     * }
     */
    public function logout() {
        try {
            auth()->user()->tokens->each(function ($token, $key) {
                $token->delete();
            });
        } catch (\Exception $e) {
            return response()->json('Something went wrong on the server.', 500);
        }


        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    /**
     * Get User
     * 
     * @authenticated
     * 
     * @apiResourceCollection \App\Http\Resources\User
     * @apiResourceModel \App\User
     */
    public function user(Request $request) {
        return \App\Http\Resources\User::make($request->user());
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
