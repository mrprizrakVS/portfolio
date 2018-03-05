<?php

namespace App\Http\Controllers;

use App\Model\Companies;
use App\Model\Recruiters;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends \App\Http\Controllers\Auth\RegisterController
{

    use RegistersUsers;

    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function viewIndex(){
        return view('auth.register');
    }

    public function create(array $data)
   {
       $recruiters = new Recruiters();
       $companies  = new Companies();
       $user = new User();

       $user->name = $data['name'];
       $user->email = $data['email'];
       $user->password = Hash::make($data['password']);
       $user->save();

       $companies->name = $data['name'];
       $companies->save();

       $recruiters->first_name = $data['first_name'];
       $recruiters->last_name  = $data['last_name'];
       $recruiters->company_id = $companies->id;

       $recruiters->save();

   }
}
