<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Imports\StudentImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Rayon;
use App\Models\User;
use App\Models\Student;
use App\Models\Level;
use Illuminate\Support\Carbon;

class StudentController extends BaseController
{
    private $rayon;
    public function __construct(Request $request)
    {
        $this->rayon = Rayon::findOrFail($request->id);
    }
    public function index()
    {
        $data = $this->rayon;

        return view('admin.rayon.student.index', compact('data'));
    }
    public function add()
    {
        $data = $this->rayon;
        $religion = ['Islam', 'Kristen (Katolik)', 'Kristen (Protestan)', 'Hindu', 'Budha', 'Konghucu'];
        $level = Level::OrderByDesc('id')->pluck('name', 'id');
        $weton = ['Legi', 'Pahing', 'Pon', 'Wage', 'Kliwon'];
        return view('admin.rayon.student.create', compact('data', 'religion', 'level', 'weton'));
    }

    public function create(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:1|max:255',
            'phone' => 'unique:users,phone|required|numeric|digits_between:6,12',
            'email' => 'unique:users,email|email|required',
            'address' => 'required|string',
            'jobs' => 'required',
            'religion' => 'required|in:Islam,Kristen (Katolik),Kristen (Protestan),Hindu,Budha,Konghucu',
            'name_student' => 'required|string|min:1|max:255',
            'birth_place' => 'required|string|min:1|max:255',
            'dob' => 'required|date_format:d/m/Y',
            'school' => 'required|string|min:1|max:255',
            'class' => 'required|string|min:1|max:255',
            'certificate' => 'required|string',
            'weight' => 'required|integer|min:1|max:250',
            'height' => 'required|integer|min:1|max:250',
            'blood_type' => 'required|string',
            'level' => 'required|in:' . implode(",", Level::pluck('id')->toArray()),
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
            $photo = '/images/student/' . str_replace(' ', '', $request->name_student) . '/' . $imagefile;
        }
        $data = $this->rayon;
        $parent = User::create([
            'name' => Str::title($request->name),
            'phone' => $request->phone,
            'password' => Hash::make('pshtsingosari'),
            'email' => $request->email,
            'address' => $request->address,
            'jobs' => $request->jobs,
            'religion' => $request->religion
        ]);
        $parent->assignRole('User');
        $data->student()->create([
            'name' => $request->name_student,
            'parent_id' => $parent->id,
            'level_id' => $request->level,
            'weton' => $request->weton,
            'address' => $request->address,
            'religion' => $request->religion,
            'birth_place' => Str::title($request->birth_place),
            'dob' => Carbon::createFromFormat('d/m/Y', $request->dob)->format('Y-m-d'),
            'school' => Str::upper($request->school),
            'class' => $request->class,
            'certificate' => Str::upper($request->certificate),
            'weight' => $request->weight,
            'height' => $request->height,
            'blood_type' => Str::upper($request->blood_type),
            'disease' => $request->disease,
            'note' => $request->notes,
            'status' => 'new',
            'photo' => $photo
        ]);
        return redirect()->route('admin.rayon.student.index', $id)->with('success', 'Berhasil tambah data siswa!');;
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
                $import = Excel::import(new StudentImport, $request->file('file'));
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

    public function detail($id, $student)
    {
        $religion = ['Islam', 'Kristen (Katolik)', 'Kristen (Protestan)', 'Hindu', 'Budha', 'Konghucu'];
        $rayon = $this->rayon;
        $data = Student::findOrFail($student);
        $level = Level::OrderByDesc('id')->pluck('name', 'id');
        $weton = ['Legi', 'Pahing', 'Pon', 'Wage', 'Kliwon'];
        return view('admin.rayon.student.edit', compact('data', 'religion', 'rayon', 'level', 'weton'));
    }

    public function update(Request $request, $id, $student)
    {
        $data = Student::findOrFail($student);
        $parent = User::findOrFail($data->parent->id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:1|max:255',
            'address' => 'required|string',
            'jobs' => 'required',
            'religion' => 'required|in:Islam,Kristen (Katolik),Kristen (Protestan),Hindu,Budha,Konghucu',
            'name_student' => 'required|string|min:1|max:255',
            'birth_place' => 'required|string|min:1|max:255',
            'dob' => 'required|date_format:d/m/Y',
            'school' => 'required|string|min:1|max:255',
            'class' => 'required|string|min:1|max:255',
            'certificate' => 'required|string',
            'weight' => 'required|integer|min:1|max:250',
            'height' => 'required|integer|min:1|max:250',
            'blood_type' => 'required|string',
            'level' => 'required|in:' . implode(",", Level::pluck('id')->toArray()),
            'weton' => 'required|in:Legi,Pahing,Pon,Wage,Kliwon',
            'photo' => 'sometimes|image|mimes:jpeg,jpg,png|max:4096',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator->messages());
        }
        $photo = $data->photo;
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $imagefile = $file->getClientOriginalName();
            $request->file('photo')->move(public_path() . '/images/student/' . str_replace(' ', '', $request->name) . '/', $imagefile);
            if($photo) {
                unlink($photo);
            }
            $photo = '/images/student/' . str_replace(' ', '', $request->name_student) . '/' . $imagefile;
        }

        $parent->update([
            'name' => Str::title($request->name),
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'jobs' => $request->jobs,
            'religion' => $request->religion
        ]);
        $data->update([
            'name' => $request->name_student,
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
            'note' => $request->notes,
            'level_id' => $request->level,
            'weton' => $request->weton,
            'photo' => $photo
        ]);
        return redirect()->route('admin.rayon.student.index', $id)->with('success', 'Berhasil update siswa!');
    }

    public function suspend($id, $student)
    {
        $data = Student::findOrFail($student);
        switch ($data->status) {
            case 'active':
                $data->status = 'suspended';
                $data->save();
                return back()->with('success', 'Berhasil aktivasi siswa!');
                break;
            case 'suspended':
                $data->status = 'active';
                $data->save();
                return back()->with('success', 'Berhasil suspend siswa!');
                break;
            case 'new':
                $data->status = 'suspended';
                $data->save();
                return back()->with('success', 'Berhasil suspend siswa!');
                break;
        }
    }
}
