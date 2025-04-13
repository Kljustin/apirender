<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PChitiet extends Model
{
    protected $idcauhoi, $noidung, $phuongan;

    protected $fillable = ['idcauhoi', 'noidung', 'phuongan'];

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
