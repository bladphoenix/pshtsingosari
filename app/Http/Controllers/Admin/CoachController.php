<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Imports\CoachImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Rayon;
use App\Models\User;

class CoachController extends BaseController
{
    private $rayon;
    public function __construct(Request $request)
    {
        $this->rayon = Rayon::findOrFail($request->id);
    }
    public function index()
    {
        $data = $this->rayon;

        return view('admin.rayon.coach.index', compact('data'));
    }

    public function add()
    {
        $data = $this->rayon;
        $religion = ['Islam', 'Kristen (Katolik)', 'Kristen (Protestan)', 'Hindu', 'Budha', 'Konghucu'];
        return view('admin.rayon.coach.create', compact('data', 'religion'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:1|max:255',
            'phone' => 'unique:users,phone|required|numeric|digits_between:6,12',
            'password' => 'required|min:8',
            'email' => 'unique:users,email|email|required',
            'address' => 'required|string',
            'jobs' => 'required',
            'religion' => 'required|in:Islam,Kristen (Katolik),Kristen (Protestan),Hindu,Budha,Konghucu',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator->messages());
        }
        $data = $this->rayon;
        $user = $data->coach()->create([
            'name' => Str::title($request->name),
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'address' => $request->address,
            'jobs' => $request->jobs,
            'religion' => $request->religion
        ]);

        $user->assignRole('Pelatih');

        return view('admin.rayon.coach.index', compact('data'));
    }

    public function import(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:xls,xlsx,csv'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
        }
        if ($request->file('file')) {
            try {
                $import = Excel::import(new CoachImport, $request->file('file'));
            } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                $failures = $e->failures();
                foreach ($failures as $failure) {
                    $failure->errors();
                }
                return back()->withErrors($failure->errors());
            }

            return back()->with('success', 'Berhasil import data!');
        }
    }

    public function detail($id, $coach)
    {
        $religion = ['Islam', 'Kristen (Katolik)', 'Kristen (Protestan)', 'Hindu', 'Budha', 'Konghucu'];
        $rayon = $this->rayon;
        $data = User::findOrFail($coach);
        return view('admin.rayon.coach.edit', compact('data', 'religion', 'rayon'));
    }

    public function update(Request $request, $id, $coach)
    {
        $data = User::findOrFail($coach);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:1|max:255',
            'phone' => 'unique:users,phone,' . $data->id . '|required|numeric|digits_between:6,12',
            'password' => 'sometimes',
            'email' => 'unique:users,email,' . $data->id . '|email|required',
            'address' => 'required|string',
            'jobs' => 'required',
            'religion' => 'required|in:Islam,Kristen (Katolik),Kristen (Protestan),Hindu,Budha,Konghucu',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator->messages());
        }
        $data->name = Str::title($request->name);
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->address = Str::title($request->address);
        $data->jobs = $request->jobs;
        $data->religion = $request->religion;
        if ($request->has('password')) {
            $data->password = Hash::make($request->password);
        }
        $data->save();
        return redirect()->route('admin.rayon.coach.index', $id)->with('success', 'Berhasil update pelatih!');
    }

    public function suspend($id, $coach)
    {
        $data = User::findOrFail($coach);
        switch ($data->status) {
            case 0:
                $data->status = 1;
                $data->save();
                return back()->with('success', 'Berhasil aktivasi pelatih!');
                break;
            case 1:
                $data->status = 0;
                $data->save();
                return back()->with('success', 'Berhasil suspend pelatih!');
                break;
        }
    }
}
