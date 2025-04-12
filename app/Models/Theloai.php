<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theloai extends Model
{
    use HasFactory;
    protected $table = 'theloai';
    protected $keyType = 'string';
    protected $primaryKey = 'IDTheloai';
    public $timestamps = false;
    protected $fillable = ['IDTheloai', 'Tentheloai'];
}
