<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;

class APIController extends Controller
{
    public function searchvehicle(Request $request){
        $cari = $request->input('q');

        $vehicles = Vehicle::where('merek','LIKE',"%$cari%")->get();

        if($vehicles->isempty())
        {
            return response()->json([
                'success' => false,
                'data' => 'Data Tidak Ditemukan'
            ],404)->header('Access-Control-Allow-Origin','http://127.0.0.1:8000');
        }
        else
        {
            return response()->json([
                'success' => true,
                'data' => $vehicles
            ],200)->header('Access-Control-Allow-Origin','http://127.0.0.1:8000');
        }
    }
}
