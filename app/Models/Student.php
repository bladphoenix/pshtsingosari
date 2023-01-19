<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rayon_id',
        'parent_id',
        'level_id',
        'address',
        'religion',
        'birth_place',
        'dob',
        'school',
        'class',
        'certificate',
        'weight',
        'height',
        'blood_type',
        'disease',
        'note',
        'status',
        'photo',
        'weton'
    ];

    protected $dates = [
        'updated_at',
        'created_at',
    ];

    public function rayon() {
        return $this->belongsTo('App\Models\Rayon');
    }

    public function parent() {
        return $this->belongsTo('App\Models\User', 'parent_id', 'id');
    }

    public function level() {
        return $this->belongsTo('App\Models\Level');
    }
}
