<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\User\UserResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\User\UserUpdateRequest;

class AuthController extends Controller {
    
    public $successStatus = 200;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        if(!Gate::allows('user.view')) {
            abort(403, 'Sorry, permission denied!');
        }

        return UserResource::collection(
            User::orderBy('name')->get()
        );
    }

    
    public function register(Request $request) {

        if(!Gate::allows('user.create')) {
            abort(403, 'Sorry, permission denied!');
        }

        $validator = Validator::make($request->all(), [
                'name' => 'required',
                'username' => 'unique:users|required_without:email',
                'email' => 'email|unique:users|required_without:username',
                // 'contact_number' => 'string',
                'password' => 'required',
                'c_password' => 'required|same:password',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }   
    
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        // $success['token'] =  $user->createToken('AppName')->accessToken;
        return response()->json(['message'=>$user], $this->successStatus);
    }
    
    
    public function login() {
        if(Auth::attempt(
            [ 
                'email' => request('email'), 
                'password' => request('password')
            ]) || Auth::attempt(
                [
                    'username' => request('username'),
                    'password' => request('password')
                ]
            )
        ) {

                $user = Auth::user();
                $success['token'] =  $user->createToken('AppName')-> accessToken;
                return response()->json(['message' => $success], $this-> successStatus);
        } else { 
            return response()->json(['message'=>'Invalid Credentials'], 403);
        } 
    }
    
    public function getUser() {
        $user = Auth::user();
        return response()->json(['message' => $user], $this->successStatus);
    }

    /**
     * Updates an authenticated user
     * 
     * @param Request $request
     */

    public function update(Request $request) {


        // dd($request);
        
        if(!Gate::allows('user.update')) {
            abort(403, 'Sorry, permission denied!');
        }

        $user = User::findOrFail($request->id);
        
        // dd($user);

        $validator = Validator::make($request->all(), [
                'name' => 'required',
                // 'username' => 'required|unique:users',
                // 'email' => 'required|email|unique:users,email,'. $request->id,
                'username' => [
                    'string', 'required', 'max:20',
                    Rule::unique('users')->ignore($user)
                  ],
                // 'contact_number' => 'string',
                'password' => 'required',
                'c_password' => 'required|same:password',
        ]);

        
        if ($validator->fails()) {
            return response()->json(['message'=>$validator->errors()], 401);
        }

            
        $input = $request->all();
        
        $input['password'] = bcrypt($input['password']);

        $user = $user->update($input);

        // $success['token'] =  $user->createToken('AppName')->accessToken;
        return response()->json(['message'=>$user], $this->successStatus);
    }

    public function show($id) {
        $user = User::findOrFail($id);
        return response()->json(['user' => $user]);

    }
}
