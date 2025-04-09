<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PChitietbaithi extends Model
{
    protected $idcauhoi, $noidung;
    protected $listctrl;

    protected $fillable = ['idcauhoi', 'noidung', 'listctrl'];
    // Hàm khởi tạo (Constructor)
    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
        $this->listctrl = $attributes['listctrl'] ?? [];
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
