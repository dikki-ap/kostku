<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Category;

class KostCategoryController extends Controller
{
    public function all(Request $request){
        $id = $request->input('id');
        
        if($id){
            $category = Category::with(['kosts'])->find($id);
            if(!is_null($category)){
                return ResponseFormatter::success(
                    $category,
                    'Data Category by ID berhasil diambil'
                );
            }else{
                return ResponseFormatter::error(
                    null,
                    'Data Category by ID tidak ada',
                    404
                );
            }
        }else{
            if(Category::count()){
                $category = Category::with(['kosts'])->get();

                return ResponseFormatter::success(
                    $category,
                    'Data Semua Category berhasil diambil'
                );
            }else{
                return ResponseFormatter::error(
                    null,
                    'Data Category tidak ada',
                    404
                );
            }
        }
    }
}
