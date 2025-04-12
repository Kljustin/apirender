<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PBaithi extends Model
{
    protected $idbaithi, $tenbaithi, $ngayrade, $soluongcau, $congkhai, $lamlai, $theloai;

    protected $fillable = ['idbaithi', 'tenbaithi', 'ngayrade', 'soluongcau', 'congkhai', 'lamlai', 'theloai'];
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
