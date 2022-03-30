<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function all(){

        $all_users = User::all();
        
        return response($all_users);

    }

}

