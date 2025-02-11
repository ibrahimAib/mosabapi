<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }
    public function store(Request $request)
    {
         // Define your array
        User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password'=> $request->password,
        ]);
    }
}

