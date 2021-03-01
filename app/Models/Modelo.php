<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'modelos';

    protected $fillable = [
        'nombre'
    ];
    public $timestamps = false;
}
