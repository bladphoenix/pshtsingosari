<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'logo',
        'address',
        'status'
    ];

    public function student() {
        return $this->hasMany('App\Models\Student', 'rayon_id', 'id');
    }

    public function coach() {
        return $this->belongsToMany('App\Models\User', 'rayon_user', 'rayon_id', 'user_id');
    }
}
