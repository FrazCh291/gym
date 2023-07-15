<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if( $user->role=='admin'){
            $token = $user->createToken('importapp')->accessToken;
            $message = 'user login successfully';
            $response = ['code' => 200, 'status' => true, 'user' => $user, 'token' => $token, 'message' => $message];
            return response($response);
            }else{  
                return  $response = ['code' => 401, 'status' => false, 'message' => 'kindly verify your email !'];
            }
        }
        $message = 'Invalid email or password';
        $response = ['code' => 200, 'status' => false, 'token' => '', 'message' => $message];
        return response($response);
    }
    public function index(){

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
