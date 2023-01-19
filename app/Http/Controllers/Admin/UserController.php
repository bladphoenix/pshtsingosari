<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show user.
     *
     */
    public function index()
    {
        return view('admin.user');
    }

    /**
     * Update user notifications.
     *
     */
    public function update(Request $request)
    {
        $id = Auth::id();
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:1|max:255',
            'phone' => 'unique:admins,phone,' . $id . '|required|numeric|digits_between:6,12',
            'email' => 'unique:admins,email,' . $id . '|email|required',
            'photo' => 'sometimes|image|mimes:jpeg,jpg,png|max:2048'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator->messages());
        }
        $user = Auth::user();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $imagefile = $file->getClientOriginalName();
            $request->file('photo')->move(public_path() . '/images/user/' . $user->phone . '/', $imagefile);
            $user->photo_url = '/images/user/' . $user->phone . '/' . $imagefile;
        }

        $user->save();
        return redirect()->back()->with('success', 'Akun berhasil diupdate!');
    }

    public function password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|current_password:web|min:8',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator->messages());
        }

        $user = Auth::user();
        if (Hash::check($request->new_password, $user->password)) {
            return redirect()->back()->withInput($request->all())->withErrors(['password' => 'Password lama & Password baru tidak boleh sama!']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect()->back()->with('success', 'Password berhasil diupdate!');
    }

    /**
     * Show user notifications.
     *
     */
    public function notification()
    {
        return view('admin.notification');
    }

    /**
     * Read user notifications.
     *
     */
    public function read()
    {
        return $this->user()->unreadNotifications->markAsRead();
    }
}
