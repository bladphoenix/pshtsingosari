<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\BaseController;

class UserController extends BaseController
{
    /**
     * Show user.
     *
     */
    public function index()
    {
        $religion = ['Islam', 'Kristen (Katolik)', 'Kristen (Protestan)', 'Hindu', 'Budha', 'Konghucu'];
        return view('user.user', compact('religion'));
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
            'phone' => 'unique:users,phone,' . $id . '|required|numeric|digits_between:6,12',
            'email' => 'unique:users,email,' . $id . '|email|required',
            'address' => 'required|string',
            'jobs' => 'required',
            'religion' => 'required|in:Islam,Kristen (Katolik),Kristen (Protestan),Hindu,Budha,Konghucu',
            'photo' => 'sometimes|image|mimes:jpeg,jpg,png|max:2048',
            'signature' => 'required|base64image|base64mimes:png',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator->messages());
        }
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->signature = $request->signature;
        $user->jobs = $request->jobs;
        $user->address = $request->address;
        $user->religion = $request->religion;
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
        $id = Auth::id();
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|current_password:web|min:8',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator->messages());
        }

        $user = User::findOrFail($id);
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
        return view('user.notification');
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
