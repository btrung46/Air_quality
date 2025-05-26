<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Admin_userController extends Controller
{
    public function show(){
        $users = User::when(request()->has('search'), function($query){
            $query->where('name', 'like', '%' . request('search') . '%');
        })->paginate(10);
        return view('admin_user',[
            'users' => $users
        ]);
    }
    public function delete(User $user)  {
        $user->delete();
        return redirect()->route('admin.user')->with('success','User deleted successfull!!');
    }
}
