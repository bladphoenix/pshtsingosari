<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Imports\RayonImport;
use App\Models\Rayon;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RayonController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $data = Rayon::with('student')->get();
        return view('admin.rayon.index', compact('data'));
    }

    public function detail($id)
    {
        $parent = [];
        $data = Rayon::findOrFail($id);
        $coach = $data->coach;
        foreach ($data->student as $rayon) {
            $parent[] = $rayon->parent;
        }
        $parent = collect($parent);
        return view('admin.rayon.detail', compact('data', 'coach', 'parent'));
    }

    public function add()
    {
        return view('admin.rayon.create');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:1|max:255',
            'phone' => 'unique:rayons,phone|required|numeric|digits_between:6,12',
            'email' => 'unique:rayons,email|email|required',
            'logo' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator->messages());
        }
        if ($request->file('logo')) {
            $file = $request->file('logo');
            $imagefile = $file->getClientOriginalName();
            $request->file('logo')->move(public_path() . '/images/rayon/', $imagefile);
        }

        Rayon::create([
            'name' => Str::title($request->name),
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => Str::title($request->address),
            'logo' => '/images/rayon/' . $imagefile
        ]);

        return redirect()->route('admin.rayon.index');
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
                $import = Excel::import(new RayonImport, $request->file('file'));
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

    public function edit($id)
    {
        $data = Rayon::findOrFail($id);
        return view('admin.rayon.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Rayon::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:1|max:255',
            'phone' => 'unique:rayons,phone,' . $data->id . '|required|numeric|digits_between:6,12',
            'email' => 'unique:rayons,email,' . $data->id . '|email|required',
            'logo' => 'sometimes|image|mimes:jpeg,jpg,png|max:2048'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator->messages());
        }

        $data->name = Str::title($request->name);
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->address = Str::title($request->address);
        if ($request->file('logo')) {
            $file = $request->file('logo');
            $imagefile = $file->getClientOriginalName();
            $request->file('logo')->move(public_path() . '/images/rayon/', $imagefile);
            $data->logo = '/images/rayon/' . $imagefile;
        }
        $data->save();
        return redirect()->route('admin.rayon.index')->with('success', 'Data Rayon berhasil di update!');
    }
}
