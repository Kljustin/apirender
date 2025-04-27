<?php

namespace App\Http\Controllers;

use App\Models\Nguoidung;
use Exception;
use Illuminate\Http\Request;

class NguoidungController extends Controller
{
    public function getNguoiDung(Request $request)
    {
        $tendn = $request->tendn;
        $mk = $request->matkhau;
        $nguoidung = Nguoidung::where('Tendn', $tendn)->first();
        if ($nguoidung == null || $nguoidung->Matkhau != $mk)
            return response()->json(404);
        else {
            return response()->json($nguoidung);
        }
    }
    public function dangKy(Request $request)
    {
        try {
            $nd = Nguoidung::where('Tendn', $request->Tendn)->first();
            if ($nd != null) return response()->json([], 404);
            $ndm = new Nguoidung();
            $id = 1;
            $idthem = 'ND' . $id;
            while (Nguoidung::find($idthem) != null) {
                $id++;
                $idthem = 'ND' . $id;
            }
            $ndm->IDNguoidung = $idthem;
            $ndm->Hoten = $request->Hoten;
            $ndm->Tendn = $request->Tendn;
            $ndm->Matkhau = $request->Matkhau;
            $ndm->Phanquyen = (int) $request->Phanquyen;
            $ndm->save();
            return response()->json([], 200);
        } catch (Exception) {
            return response()->json([], 404);
        }
    }
}
