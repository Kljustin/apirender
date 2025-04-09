<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cautraloi extends Model
{
    use HasFactory;
    protected $table = 'cautraloi';
    protected $keyType = 'string';
    protected $primaryKey = 'IDCautrl';
    public $timestamps = false;
    protected $fillable = ['IDCautrl', 'Noidung', 'IDCauhoi'];
}
