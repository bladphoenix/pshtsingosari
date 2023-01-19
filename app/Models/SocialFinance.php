<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Venturecraft\Revisionable\RevisionableTrait;

class SocialFinance extends Model
{
    use HasFactory;
    use RevisionableTrait;

    protected $fillable = [
        'date',
        'total',
        'description',
        'status'
    ];

    protected $revisionFormattedFieldNames = [
        'date'      => 'Tanggal',
        'total' => 'Jumlah',
        'description' => 'Keterangan',
        'status' => 'Status'
    ];
}
