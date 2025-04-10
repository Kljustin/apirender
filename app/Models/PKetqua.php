<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PKetqua extends Model
{
    protected $ngaythi, $socaudung, $soluongcau, $diemso, $tenbaithi;

    protected $fillable = ['ngaythi', 'socaudung', 'soluongcau', 'diemso', 'tenbaithi'];
    // Hàm khởi tạo (Constructor)
    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
    }

    public function __get($name)
    {
        return $this->$name;
    }
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}
