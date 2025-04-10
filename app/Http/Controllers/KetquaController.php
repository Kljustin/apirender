<?php

namespace App\Http\Controllers;

use App\Models\Baithi;
use App\Models\Ketqua;
use App\Models\PKetqua;
use Illuminate\Http\Request;

class KetquaController extends Controller
{
    public function getDSKQ($id){
        $kq = Ketqua::where('IDNguoidung', $id)->get();
        $dskq = [];
        foreach($kq as $v){
            $baithi = Baithi::where('IDBaithi', $v->IDBaithi)->first();
            $ct = new PKetqua([
                'ngaythi' => $v->Ngaythi,
                'socaudung' => $v->Socaudung,
                'soluongcau' => $v->Soluongcau,
                'diemso' => $v->Diemso,
                'tenbaithi' => $baithi->Tenbaithi
            ]);
            $dskq[] = $ct;
        }
        return response()->json($dskq, 200);
    }
}
