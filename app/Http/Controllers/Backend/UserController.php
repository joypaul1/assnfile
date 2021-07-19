<?php

namespace App\Http\Controllers\Backend;

use App\Admin;
use App\User;
use App\Rules\MatchOldPassword;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function changePassword()
    {
        return view('backend.auth.change_password');
    }

    public function updatePassword(Request $request)
    {

        $request->validate([
            'name'                 => 'required',
            'email'                => 'required',
        ]);
        if ($request->current_password) {
            $request->validate([
                'current_password'     => ['required', new MatchOldPassword],
                'new_password'         => 'required|min:6',
                'new_confirm_password' => ['same:new_password'],
            ]);
        }
        try {
            if ($request->current_password) {
                Admin::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
            }
            Admin::find(auth()->user()->id)->update(['name' => $request->name, 'email' => $request->email]);
            return redirect()->back()->with('message', 'Password change successfully');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Some error please check');
        }
    }


}
