<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    public function create (){
        return view('users.create');
    
        // dd ($request);
        User::create([ 
            'name' =>$request->name,
            'email' =>$request->email,
            'password' =>$request->password
            ]);
            return redirect()-> route('users.create');
    }
}