<?php

namespace App\Http\Controllers;

use App\Models\ScriptWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ScriptWriterController extends Controller
{
    public function show()
    {
        return view('scriptWriterRegistration');// scripwriter registration page
    }
    
    public function create_scriptwriter(Request $request)
    {
        $request->validate([
            'date_of_birth' => 'required|date',
            'age' => 'required|integer',
            'City' => 'required|string',
            'gender' => 'required|string',
            'bio' => 'nullable|string',
            'password' => 'required|string|min:6|confirmed',
            'user_id' => ['required', 'integer','exists:users,id'],
        ]);

        $scriptWriter = ScriptWriter::create([
            'date_of_birth' => $request->input('date_of_birth'),
            'age' => $request->input('age'),
            'City' => $request->input('City'),
            'gender' => $request->input('gender'),
            'bio' => $request->input('bio'),
            'user_id' => $request->input('user_id'),
            'password' => Hash::make($request->input('password')),
        ]);
       // $scriptWriter->save();
        return redirect('scriptwriter_login')->with('success', 'Account created successfully!');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($validated)) {
            return redirect('scriptwriter_home');
        }

        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);//where the scriptwriter goes to after loging in and there is and error
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('scriptwriter_login');//where the scriptwriter goes to after loging out
     }
}
