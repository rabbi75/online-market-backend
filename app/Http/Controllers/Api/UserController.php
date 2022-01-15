<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user= new User();
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= Hash::make($request->password);
        $user->save();
        return $user;
    }

    public function login(Request $request)
    {
//        $user= User::where('email',$request->email)->first();
//        if (!$user || Hash::check($request->password, $user->password)){
//            return ["error"=>"Email or Password not matched!"];
//        }
//        return $user;

        $loginData=$request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        // dd($request->all());
        if(Auth::attempt($loginData)){
            // echo"Login success";
            $userInfo = auth()->User();
            //     dd($userInfo);
            return $userInfo;
        } else {
            return ["error"=>"Email or Password not matched!"];
        }
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
