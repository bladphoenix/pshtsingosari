<?php

namespace App\Imports;

use App\Models\Rayon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class StudentImport implements ToModel, WithHeadingRow, WithValidation, SkipsEmptyRows
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $rayon = Rayon::where('name', $row['rayon'])->first();
        if(!$rayon) {
            return false;
        }
        $parent = User::create([
            'name' => Str::title($row['nama']),
            'phone' => $row['telepon'],
            'password' => Hash::make('pshtsingosari'),
            'email' => $row['email'],
            'address' => $row['alamat'],
            'jobs' => $row['pekerjaan'],
            'religion' => $row['agama']
        ]);
        $parent->assignRole('User');

        return $rayon->student()->create([
            'name' => $row['nama_siswa'],
            'parent_id' => $parent->id,
            'level_id' => 6,
            'address' => $row['alamat_domisili'],
            'religion' => $row['agama'],
            'birth_place' => Str::title($row['tempat_lahir']),
            'dob' => Carbon::parse(json_decode($row['tanggal_lahir'])),
            'school' => Str::upper($row['nama_sekolah']),
            'class' => $row['kelas'],
            'certificate' => Str::upper($row['ijazah']),
            'weight' => $row['berat_badan'],
            'height' => $row['tinggi_badan'],
            'blood_type' => Str::upper($row['golongan_darah']),
            'disease' => $row['riwayat_penyakit'],
            'notes' => $row['lain_lain'],
            'status' => 'new'
        ]);

    }
    public function rules(): array
    {
        return [
            'nama' => 'required|string|min:1|max:255',
            'telepon' => 'unique:users,phone|required|numeric|digits_between:6,12',
            'email' => 'unique:users,email|email|required',
            'alamat' => 'required|string',
            'pekerjaan' => 'required',
            'agama' => 'required|in:Islam,Kristen (Katolik),Kristen (Protestan),Hindu,Budha,Konghucu',
            'nama_siswa' => 'required|string|min:1|max:255',
            'tempat_lahir' => 'required|string|min:1|max:255',
            'tanggal_lahir' => 'required|date_format:d/m/Y',
            'alamat_domisili' => 'required|string',
            'ijazah' => 'required|string',
            'nama_sekolah' => 'required|string|min:1|max:255',
            'kelas' => 'required|numeric|min:1|max:255',
            'berat_badan' => 'required|integer|min:1|max:250',
            'tinggi_badan' => 'required|integer|min:1|max:250',
            'golongan_darah' => 'required|string',
        ];
    }

    public function headingRow(): int
    {
        return 2;
    }
}
