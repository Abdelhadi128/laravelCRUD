<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Cast\String_;

class UserController extends Controller
{
    public function create(){
        return view('createUser');
    }

    public function store(Request $request){

        $formInfo = $request->validate([
            'name' => 'required|min:8',
            'email' => 'required|min:7|max:20',
            'password' => 'required|min:9|max:30',
            'password_confirmation' => 'confirmed',
            'image'=>'required|image|mimes:png,jpg,svg,jpeg|max:10240'
        ]);

        $formInfo['image'] = $request->file('image')->store('profiles','public');
        // dd($formInfo);

        $formInfo['password'] = Hash::make($request->password);
        // dd($formInfo);
        Profile::create($formInfo);
        return to_route('show')->with('success', 'Profile add successfully');
    }

    public function show (){
        $profiles = Profile::paginate(3);
        return view('Profiles', compact('profiles'));
    }

    public function destroy(string $id) {
        $profile = Profile::findOrFail($id);
        $profile->delete();
        return to_route('show')->with('success', 'Le profil a été bien supprimé.');
    }

    public function edit(string $id){
        $profile = Profile::findOrfail($id);
        return view('edit',compact('profile'));
    }

    public function put(Request $request, string $id){
        $profile = Profile::findOrfail($id);
        $formInfo = $request->validate([
            'name' => 'required|min:8',
            'email' => 'required|min:7|max:20',
            'image'=>'required|image|mimes:png,jpg,svg,jpeg|max:10240'
        ]);
        dd($formInfo);

        // $profile->fill($formInfo)->save();
        // return to_route('show')->with('success', 'Profile updated successfully');
    }
}
