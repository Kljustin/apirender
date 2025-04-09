<?php

namespace App\Http\Controllers;


use App\Models\Cauhoi;
use App\Models\Cautraloi;
use App\Models\Chitietbaithi;
use App\Models\PChitietbaithi;
use Illuminate\Http\Request;

class ChitietbaithiController extends Controller
{
    public function getToanBaiThi($id)
    {
        $ctbt = Chitietbaithi::where('IDBaithi', $id)->get();
        $kq = [];
        foreach ($ctbt as $v) {
            $ch = Cauhoi::where('IDCauhoi', $v->IDCauhoi)->first();
            $dsctl = Cautraloi::where('IDCauhoi', $v->IDCauhoi)->get();
            $phanch = new PChitietbaithi([
                'idcauhoi' => $ch->IDCauhoi,
                'noidung' => $ch->Noidung,
                'listctrl' => $dsctl
            ]);
            $kq[] = $phanch;
        }

        if ($kq == null) return response()->json($kq, 404);
        return response()->json($kq, 200);
    }
}
