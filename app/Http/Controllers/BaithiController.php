<?php

namespace App\Http\Controllers;

use App\Models\Baithi;
use App\Models\Cauhoi;
use App\Models\Cautraloi;
use App\Models\Chitietbaithi;
use App\Models\PBaithi;
use App\Models\PChitiet;
use App\Models\Theloai;
use DateTime;
use Exception;
use Illuminate\Http\Request;

class BaithiController extends Controller
{
    public function getDSBaithi()
    {
        $baithi = Baithi::where('Congkhai', 1)->get();
        return response()->json($baithi);
    }
    public function getBaithi($id)
    {
        $baithi = Baithi::where('IDBaithi', $id)->first();
        return response()->json($baithi);
    }
    public function getDSTimBaithi(Request $request)
    {
        $name = $request->name;
        $tim = '%' . $name . '%';
        $baithi = Baithi::where('Congkhai', 1)->where('Tenbaithi', 'LIKE', $tim)->get();
        if ($baithi == null) return response()->json(404);

        return response()->json($baithi);
    }
    public function themBaithi(Request $request)
    {
        $id = 1;
        $idthem = 'BT' . $id;
        while (Baithi::find($idthem) != null) {
            $id++;
            $idthem = 'BT' . $id;
        }
        $b = new Baithi();
        $b->IDBaithi = $idthem;
        $b->Tenbaithi = $request->tenbaithi;
        $b->Ngayrade = now();
        $b->Soluongcau = $request->soluongcau;
        $b->Congkhai = $request->congkhai;
        $b->Lamlai = $request->lamlai;
        $b->IDTheloai = $request->theloai;
        $b->IDNguoidung = $request->nguoidung;
        $b->save();
        return response()->json($b, 200);
    }
    public function getDSBaithiID($id)
    {
        $baithi = Baithi::where('IDNguoidung', $id)->orderBy('Ngayrade', 'desc')->get();
        $dsbt = [];
        if ($baithi != null) {
            foreach ($baithi as $v) {
                $tl = Theloai::where('IDTheloai', $v->IDTheloai)->first();
                $bt = new PBaithi([
                    'idbaithi' => $v->IDBaithi,
                    'tenbaithi' => $v->Tenbaithi,
                    'ngayrade' => $v->Ngayrade,
                    'soluongcau' => $v->Soluongcau,
                    'congkhai' => $v->Congkhai,
                    'lamlai' => $v->Lamlai,
                    'theloai' => $tl->Tentheloai
                ]);
                $dsbt[] = $bt;
            }
        }
        return response()->json($dsbt, 200);
    }
    public function getCTBaiThiCauHoi($id)
    {
        $bt = Baithi::where('IDBaithi', $id)->first();
        $tl = Theloai::where('IDTheloai', $bt->IDTheloai)->first();
        $nbt = new PBaithi([
            'idbaithi' => $bt->IDBaithi,
            'tenbaithi' => $bt->Tenbaithi,
            'ngayrade' => $bt->Ngayrade,
            'soluongcau' => $bt->Soluongcau,
            'congkhai' => $bt->Congkhai,
            'lamlai' => $bt->Lamlai,
            'theloai' => $tl->Tentheloai
        ]);
        if ($bt == null) return response()->json([], 404);
        $ctbt = Chitietbaithi::where('IDBaithi', $id)->get();
        $cttv = [];
        foreach ($ctbt as $v) {
            $ch = Cauhoi::where('IDCauhoi', $v->IDCauhoi)->first();
            $pct = new PChitiet([
                'idcauhoi' => $ch->IDCauhoi,
                'noidung' => $ch->Noidung,
                'phuongan' => $ch->IDPhuongan
            ]);
            $cttv[] = $pct;
        }
        $kq = [
            'Baithi' => $nbt,
            'Chitiet' => $cttv
        ];
        return response()->json($kq, 200);
    }
    public function getCTBaithi($id){
        $bt = Baithi::where('IDBaithi', $id)->first();
        if($bt == null) return response()->json([], 404);
        return response()->json($bt, 200);
    }
    public function xoaDethi($id)
    {
        try {
            $chitiet = Chitietbaithi::where('IDBaithi', $id)->get();
            foreach ($chitiet as $v) {
                Cauhoi::where('IDCauhoi', $v->IDCauhoi)->delete();
                Cautraloi::where('IDCauhoi', $v->IDCauhoi)->delete();
            }
            Chitietbaithi::where('IDBaithi', $id)->delete();
            Baithi::where('IDBaithi', $id)->first()->delete();
            return response()->json([], 200);
        } catch (Exception) {
            return response()->json([], 404);
        }
    }
}
