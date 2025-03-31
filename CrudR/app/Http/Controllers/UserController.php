<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(){
        return view('createUser');
    }

    public function store(Request $request){

        $formInfo = $request->validate([
            'name' => 'required|min:8',
            'email' => 'required|min:7|max:20|unique:profiles',
            'password' => 'required|min:9|max:30',
            'password_confirmation' => 'confirmed'
        ]);

        $formInfo['password'] = Hash::make($request->password);
        // dd($formInfo);
        Profile::create($formInfo);
    }

    public function show (){
        $profiles = Profile::paginate(3);
        return view('Profiles', compact('profiles'));
    }
}
