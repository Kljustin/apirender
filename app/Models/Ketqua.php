<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ketqua extends Model
{
    use HasFactory;
    protected $table = 'ketqua';
    protected $keyType = 'string';
    protected $primaryKey = 'IDKetqua';
    public $timestamps = false;
    protected $fillable = ['IDKetqua', 'Ngaythi', 'Socaudung', 'Soluongcau', 'Diemso', 'IDNguoidung', 'IDBaithi'];
}
