<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show()
    {
        return view('UserCreation');//user registration page
    }

    public function create_user(Request $request)
    {
       $validator= $request->validate([
            'username' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',//user's email must be unique
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'nullable|string|max:255',
            'profile_pic_url' => 'nullable|string|max:255',
            'role_id' => 'nullable|integer|exists:roles,id',
            'script_writer_id' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);
       //validation of inputed attributes
      

        $user = User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'profile_pic_url' => $request->input('profile_pic_url'),
            'role_id' => $request->input('role_id'),
            'script_writer_id'  => $request->input('script_writer_id' ),
            'is_active' => $request->input('is_active'),
            'password' => Hash::make($request->input('password')),
        ]);
        //here we are storing the user's info in the database or model called User 
        // $user->save();
        
        return redirect('UserCreation')->with('success', 'Account created successfully!');//Here after registering the user will be redirectedto a page
    }
    
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($validated)) {
            return redirect('home');//after comfirmation with user logn credentials  redirectz to user's hompage 
        }

        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);//error message if anny is sent to user login page
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('Userlogin');
    }
    
}
