<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chitietbaithi extends Model
{
    use HasFactory;
    protected $table = 'chitietbaithi';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ['IDBaithi', 'IDCauhoi'];
    /**
     * Ghi đè phương thức để thiết lập khóa chính khi lưu.
     */
    protected function setKeysForSaveQuery($query)
    {
        $primaryKey = ['IDBaithi', 'IDCauhoi'];
        foreach ($primaryKey as $keyField) {
            $query->where($keyField, '=', $this->getAttribute($keyField));
        }

        return $query;
    }

    /**
     * Ghi đè để tránh lỗi khi xử lý composite key.
     */
    public function getIncrementing()
    {
        return false;
    }
}
