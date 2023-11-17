<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fiche1 extends Model
{
    use HasFactory;
    
    protected $table = 'fiche1';
    protected $fillable = [
        'nom',
        'slug',
        'age',
        'tel',
        'csp_id',
        'photo'
    ];
}
