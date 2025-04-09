<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nguoidung extends Model
{
    use HasFactory;
    protected $table = 'nguoidung';
    protected $keyType = 'string';
    protected $primaryKey = 'IDNguoidung';
    public $timestamps = false;
    protected $fillable = ['IDNguoidung', 'Hoten', 'Tendn', 'Matkhau', 'Phanquyen'];
}
