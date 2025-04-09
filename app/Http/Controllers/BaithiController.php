<?php

namespace App\Http\Controllers;

use App\Models\Baithi;
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
}
