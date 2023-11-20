<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carnet extends Model
{
    use HasFactory;
    protected $table = 'carnets';
    protected $primaryKey = 'id';
    protected $fillable = ['tache', 'date', 'status','prix','photo'];
}
