<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('auth.users.userindex', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'role' => $request->role,
        ]);

        return redirect()->back();
    }

    public function profile()
    {
        return view('auth.users.userprofile');
    }

    public function editprofile($id)
    {
        $user = User::find($id);
        return view('auth.users.editprofile', compact('user'));
    }

    public function updateprofile(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'name' => ['string', 'regex:/\w*$/', 'max:255', 'unique:users,name,'],
            // 'email' => ['email', 'max:255', 'unique:users,email,'],
            'password' => ['min:6', 'max:15'],
        ]);

        $user->name = $request->name;
        // $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user.profile')->with('success','User Update SuccessFully.');
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('delete', 'User Delete SuccessFully.');
    }
}
