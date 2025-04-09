<?php

namespace App\Http\Controllers;

use App\Models\Cauhoi;
use App\Models\Ketqua;
use Illuminate\Http\Request;

class ChamdiemController extends Controller
{
    public function chamDiem(Request $request){
        $kq = $request->Ketqua;
        $socaudung = 0;
        $soluongcau = $request->Soluongcau;
        $uid = $request->IDNguoidung;
        $baithiid = $request->IDBaithi;
        foreach($kq as $v){
            $cauhoi = Cauhoi::where('IDCauhoi', $v['IDCauhoi'])->first();
            if($v['IDCautrl'] == $cauhoi->IDPhuongan) $socaudung++;
        }
        $diemso = $socaudung/$soluongcau*10;
        $ngaythi = now()->toDateString();
        $luukq = new Ketqua();
        $count = Ketqua::Count() +1;
        $idkq = 'kq' . $count;
        $luukq->IDKetqua = $idkq;
        $luukq->Ngaythi = $ngaythi;
        $luukq->Socaudung = $socaudung;
        $luukq->Soluongcau = $soluongcau;
        $luukq->Diemso = $diemso;
        $luukq->IDNguoidung = $uid;
        $luukq->IDBaithi = $baithiid;
        $luukq->save();
        return response()->json($luukq, 200)->header('Access-Control-Allow-Origin', 'http://localhost:3000');
    }
}
