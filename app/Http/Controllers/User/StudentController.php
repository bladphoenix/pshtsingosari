<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\Student;
use App\Models\Rayon;

class StudentController extends BaseController
{
    public function index() {
        return view('user.dashboard');
    }

    public function add() {
        $religion = ['Islam', 'Kristen (Katolik)', 'Kristen (Protestan)', 'Hindu', 'Budha', 'Konghucu'];
        $data = Rayon::select('id', 'name')->get();
        $weton = ['Legi', 'Pahing', 'Pon', 'Wage', 'Kliwon'];
        if(!Auth::user()->signature || !Auth::user()->photo_url || !Auth::user()->address || !Auth::user()->address && !Auth::user()->religion) {
            return redirect('account')->withErrors('Silahkan lengkapi data Orang Tua terlebih dahulu!');
        }
        return view('user.student.create', compact('data', 'religion', 'weton'));
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'rayon' => 'required',
            'name' => 'required|string|min:1|max:255',
            'address' => 'required|string',
            'religion' => 'required|in:Islam,Kristen (Katolik),Kristen (Protestan),Hindu,Budha,Konghucu',
            'birth_place' => 'required|string|min:1|max:255',
            'dob' => 'required|date_format:d/m/Y',
            'school' => 'required|string|min:1|max:255',
            'class' => 'required|string|min:1|max:255',
            'certificate' => 'required|string',
            'weight' => 'required|integer|min:1|max:250',
            'height' => 'required|integer|min:1|max:250',
            'blood_type' => 'required|string',
            'weton' => 'required|in:Legi,Pahing,Pon,Wage,Kliwon',
            'photo' => 'sometimes|image|mimes:jpeg,jpg,png|max:4096',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator->messages());
        }
        $photo = "";

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $imagefile = $file->getClientOriginalName();
            $request->file('photo')->move(public_path() . '/images/student/' . str_replace(' ', '', $request->name) . '/', $imagefile);
            $photo = '/images/student/' . str_replace(' ', '', $request->name) . '/' . $imagefile;
        }

        Student::create([
            'rayon_id' => $request->rayon,
            'parent_id' => Auth::id(),
            'level_id' => 6,
            'name' => Str::title($request->name),
            'address' => $request->address,
            'religion' => $request->religion,
            'birth_place' => Str::title($request->birth_place),
            'dob' => Carbon::parse(json_decode($request->dob)),
            'school' => Str::upper($request->school),
            'class' => $request->class,
            'certificate' => Str::upper($request->certificate),
            'weight' => $request->weight,
            'height' => $request->height,
            'blood_type' => Str::upper($request->blood_type),
            'disease' => $request->disease,
            'notes' => $request->notes,
            'status' => 'new',
            'weton' => $request->weton,
            'photo' => $photo
        ]);
        return redirect()->back()->with('success', 'Pendaftaran Anak / Siswa Telah Berhasil Diajukan!');
    }
}
