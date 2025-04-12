<?php

namespace App\Http\Controllers;

use App\Models\Baithi;
use App\Models\PBaithi;
use App\Models\Theloai;
use Illuminate\Http\Request;

class BaithiController extends Controller
{
    public function getDSBaithi()
    {
        $baithi = Baithi::where('Congkhai', 1)->get();
        return response()->json($baithi)->header('Access-Control-Allow-Origin', 'http://localhost:3000');
    }
    public function getBaithi($id)
    {
        $baithi = Baithi::where('IDBaithi', $id)->first();
        return response()->json($baithi)->header('Access-Control-Allow-Origin', 'http://localhost:3000');
    }
    public function getDSTimBaithi(Request $request)
    {
        $name = $request->name;
        $tim = '%' . $name . '%';
        $baithi = Baithi::where('Congkhai', 1)->where('Tenbaithi', 'LIKE', $tim)->get();
        if ($baithi == null) return response()->json(404)->header('Access-Control-Allow-Origin', 'http://localhost:3000');

        return response()->json($baithi)->header('Access-Control-Allow-Origin', 'http://localhost:3000');
    }
    public function themBaithi(Request $request)
    {
        $b = new Baithi();
        $b->IDBaithi = $request->IDBaithi;
        $b->Tenbaithi = $request->Tenbaithi;
        $b->Ngayrade = $request->Ngayrade;
        $b->Soluongcau = $request->Soluongcau;
        $b->Congkhai = $request->Congkhai;
        $b->Lamlai = $request->Lamlai;
        $b->IDTheloai = $request->IDTheloai;
        $b->IDNguoidung = $request->IDNguoidung;
        $b->save();
        return response()->json($b, 200);
    }
    public function getDSBaithiID($id){
        $baithi = Baithi::where('IDNguoidung', $id)->get();
        $dsbt = [];
        if($baithi!=null){
            foreach($baithi as $v){
                $tl = Theloai::where('IDTheloai', $v->IDTheloai)->first();
                $bt = new PBaithi([
                    'idbaithi' => $v->IDBaithi,
                    'tenbaithi' => $v->Tenbaithi,
                    'ngayrade' => $v->Ngayrade,
                    'soluongcau' => $v->Soluongcau,
                    'congkhai' => $v->Congkhai,
                    'lamlai' => $v->Lamlai,
                    'theloai'=> $tl->Tentheloai
                ]);
                $dsbt[] = $bt;
            }
        }
        return response()->json($dsbt, 200);
    }
}
