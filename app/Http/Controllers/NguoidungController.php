<?php

namespace App\Http\Controllers;

use App\Models\Nguoidung;
use Illuminate\Http\Request;

class NguoidungController extends Controller
{
    public function getNguoiDung(Request $request){
        $tendn = $request->tendn;
        $mk = $request->matkhau;
        $nguoidung = Nguoidung::where('Tendn', $tendn)->first();
        if($nguoidung == null || $nguoidung->Matkhau != $mk)
            return response()->json(404)->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
        else{
            return response()->json($nguoidung)->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
        }
            
    }
}
