<?php

namespace App\Imports;

use App\Models\Rayon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;


class CoachImport implements ToModel, WithHeadingRow, WithValidation, SkipsEmptyRows
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
        $user = $rayon->coach()->create([
            'name' => Str::title($row['nama']),
            'phone' => $row['telepon'],
            'password' => Hash::make('pshtsingosari'),
            'email' => $row['email'],
            'address' => $row['alamat'],
            'jobs' => $row['pekerjaan'],
            'religion' => $row['agama']
        ]);
        return $user->assignRole('Pelatih');
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
        ];
    }

    public function headingRow(): int
    {
        return 2;
    }
}
