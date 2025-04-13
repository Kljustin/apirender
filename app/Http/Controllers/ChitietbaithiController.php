<?php

namespace App\Http\Controllers;


use App\Models\Cauhoi;
use App\Models\Cautraloi;
use App\Models\Chitietbaithi;
use App\Models\PChitietbaithi;
use Exception;
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
    public function themCauhoicautraloi(Request $request)
    {
        try {
            $countcauhoi = 1;
            $idcauhoi = 'CH' . $countcauhoi;
            while (Cauhoi::find($idcauhoi) != null) {
                $countcauhoi++;
                $idcauhoi = 'CH' . $countcauhoi;
            }
            $pa = $request->NDPA;
            $idphuongan = '';
            foreach ($pa as $k => $v) {
                $counttl = 1;
                $idcautrl = 'P' . $counttl;
                while (Cautraloi::find($idcautrl) != null) {
                    $counttl++;
                    $idcautrl = 'P' . $counttl;
                }
                $cautl = new Cautraloi();
                $cautl->IDCautrl = $idcautrl;
                $cautl->Noidung = $v['Noidungpa'];
                $cautl->IDCauhoi = $idcauhoi;
                $cautl->save();
                if ($k . '' == $request->Dapan) $idphuongan = $idcautrl;
            }
            $cauhoi = new Cauhoi();
            $cauhoi->IDCauhoi = $idcauhoi;
            $cauhoi->Noidung = $request->Noidung;
            $cauhoi->Hinhanh = '';
            $cauhoi->IDPhuongan = $idphuongan;
            $cauhoi->save();
            $ctbt = new Chitietbaithi();
            $ctbt->IDBaithi = $request->IDBaithi;
            $ctbt->IDCauhoi = $idcauhoi;
            $ctbt->save();
            return response()->json([], 200);
        } catch (Exception) {
            return response()->json([], 404);
        }
    }
}
