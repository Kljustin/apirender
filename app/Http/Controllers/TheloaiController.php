<?php

namespace App\Http\Controllers;

use App\Models\Theloai;
use Exception;
use Illuminate\Http\Request;

class TheloaiController extends Controller
{
    public function getDSTheloai()
    {
        $tl = Theloai::all();
        return response()->json($tl, 200);
    }
    public function themTheloai(Request $request)
    {
        try {
            $tl = new Theloai();
            $tl->Tentheloai = $request->Tentheloai;
            $id = 1;
            $idthem = 'TL' . $id;
            while (Theloai::find($idthem) != null) {
                $id++;
                $idthem = 'TL' . $id;
            }
            $tl->IDTheloai = $idthem;
            $tl->save();
            return response()->json([], 200);
        } catch (Exception) {
            return response()->json([], 404);
        }
    }
    public function xoaTheloai(string $id){
        try{
            $tl = Theloai::where('IDTheloai', $id)->first();
            if($tl == null) return response()->json([], 404);
            $tl->delete();
            return response()->json([], 200);
        }
        catch(Exception){
            return response()->json([], 404);
        }
    }
}
