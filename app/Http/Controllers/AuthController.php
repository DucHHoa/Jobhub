<?php

namespace App\Http\Controllers;

use App\Models\Employers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        // Apply the 'guest' middleware to the create and registerPost methods
        $this->middleware('guest')->only(['create','register', 'registerPost']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $information = $request->only('email','password');
        $remember = $request->filled('remember');

        //xac thuc user
        if(Auth::attempt($information,$remember)){
            return redirect()->intended('/');
        }else{
            return redirect()->back()->with('error', 'Invalid information!');
        }
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
    public function destroy()
    {
        Auth::logout();

        //xoa session nguoi dung
        request()->session()->invalidate();
        
        request()->session()->regenerateToken();
        
        return redirect('/');
    }

   
    public function register(){
        if(Auth::check()){
            return redirect()->route('jobs.index');
        }     
        return view('auth.register');
    }
    public function registerPost(Request $request){
       

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'repassword' => 'required|same:password'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if(!$user){
            return redirect()->route('register')->with('error','Register fail, try again.');
        }
        return redirect()->route('auth.create')->with('success','Register success, Again login');
    }
}
