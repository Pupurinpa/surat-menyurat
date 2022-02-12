<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departement extends Model
{
    use HasFactory;

    public $table= 'departements';

    protected $fillable=[
        'nama_departement',
        'singkatan',
    ];
}
