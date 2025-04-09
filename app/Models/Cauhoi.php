<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cauhoi extends Model
{
    use HasFactory;
    protected $table = 'cauhoi';
    protected $keyType = 'string';
    protected $primaryKey = 'IDCauhoi';
    public $timestamps = false;
    protected $fillable = ['IDCauhoi', 'Noidung', 'Hinhanh', 'IDPhuongan'];
}
