<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'almacenes';

    protected $fillable = [
        'sigla'
    ];
    public $timestamps =false;
}
