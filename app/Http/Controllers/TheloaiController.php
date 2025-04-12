<?php

namespace App\Http\Controllers;

use App\Models\Theloai;
use Illuminate\Http\Request;

class TheloaiController extends Controller
{
    public function getDSTheloai(){
        $tl = Theloai::all();
        return response()->json($tl, 200);
    }
}
