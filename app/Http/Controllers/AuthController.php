<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia('Auth/Login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userData  = $request->validate([
           'email' => 'email|required',
           'password' => 'string|required'
        ]);

        if(Auth::attempt($userData)) {
            $request->session()->regenerate();
            return redirect()->route('landing');
        } else {
            throw ValidationException::withMessages([
               'email' => 'Validation Error'
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Auth::logout();
        //session cleanup
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
