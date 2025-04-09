<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baithi extends Model
{
    use HasFactory;
    protected $table = 'baithi';
    protected $keyType = 'string';
    protected $primaryKey = 'IDBaithi';
    public $timestamps = false;
    protected $fillable = ['IDBaithi', 'Tenbaithi', 'Ngayrade', 'Soluongcau', 'Congkhai', 'Lamlai', 'IDTheloai', 'IDNguoidung'];
}
