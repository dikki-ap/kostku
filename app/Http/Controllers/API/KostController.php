<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\Kost;

class KostController extends Controller
{
    public function all(Request $request){
        $id = $request->input('id');
        
        if($id){
            $kost = Kost::with(['category', 'galleries'])->find($id);
            if(!is_null($kost)){
                return ResponseFormatter::success(
                    $kost,
                    'Data Kost by ID berhasil diambil'
                );
            }else{
                return ResponseFormatter::error(
                    null,
                    'Data Kost by ID tidak ada',
                    404
                );
            }
        }else{
            if(Kost::count()){
                $kost = Kost::with(['category', 'galleries'])->get();

                return ResponseFormatter::success(
                    $kost,
                    'Data Semua Kost berhasil diambil'
                );
            }else{
                return ResponseFormatter::error(
                    null,
                    'Data Kost tidak ada',
                    404
                );
            }
        }
    }
}
