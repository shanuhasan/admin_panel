<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function registerUser()
    {
        $users = User::all();
        return view('admin.register_user')->with('users',$users);
    }
    public function registerEdit($id)
    {
        $users = User::find($id);
        return view('admin.edit_role')->with('users',$users);
    }
    public function registerUpdate(Request $request, $id)
    {
        $users = User::find($id);

        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->usertype = $request->input('usertype');
        $users->update();
        
        return redirect('/register-role')->with('status','You Data is Updated');
    }
    public function registerDelete($id)
    {
        $users = User::find($id);
        $users->delete();

        return redirect('/register-role')->with('status','You data is Deleted');
    }
}
