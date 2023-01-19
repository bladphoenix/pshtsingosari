<?php

namespace App\Imports;

use App\Models\Rayon;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class RayonImport implements ToModel, WithHeadingRow, WithValidation,SkipsEmptyRows
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Rayon([
            'name' => Str::title($row['nama']),
            'phone' => $row['telepon'],
            'email' => $row['email'],
            'address' => Str::title($row['alamat']),
        ]);
    }
    public function rules(): array
    {
        return [
            'nama' => 'required|string|min:1|max:255',
            'telepon' => 'unique:rayons,phone|required|numeric|digits_between:6,12',
            'email' => 'unique:rayons,email|email|required',
        ];
    }
}
