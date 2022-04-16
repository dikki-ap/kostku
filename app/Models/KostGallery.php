<?php

namespace App\Models;

use App\Models\Kost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KostGallery extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Function Relasi Inverse dari tabel Kosts ke tabel Categories (1 To 1)
    public function kost(){
        return $this->belongsTo(Kost::class, 'kost_id', 'id');
    }

    public function getRouteKeyName()
    {
        return 'kost_id';
    }

    // Mengubah URL Image, menjadi URL Full
    public function getUrlAttribute($url){
        return config('app.url') . Storage::url($url);
        // $ipV4 = 'http://192.168.43.176:8080/';
        // $fullUrl = Storage::url($url);
        // $imageUrl = explode('http://kostku.test/', $fullUrl);
        
        // $finalUrl = $ipV4 . $imageUrl[1];
        // return $finalUrl;
    }
}
