<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request){
        $crediantials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::with('email', $crediantials['email'])->role->first();
        if (!$user) return back()->withErrors(['error' => 'No user found']);
        if ($user->role->name !== 'Admin') return back()->withErrors(['error' => 'You are not an Admin!']);
        if (! Hash::check($crediantials['password'], $user->password)) return back()->withErrors(['error' => 'Invalide password!']);
        Auth::login($user);
        return redirect()->route('admin.home');
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
