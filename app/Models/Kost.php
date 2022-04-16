<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kost extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Function Relasi Inverse dari tabel Kosts ke tabel Categories (1 To 1)
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // Function Relasi dari tabel Kosts ke tabel Kost_Galleries (1 To M)
    public function galleries(){
        return $this->hasMany(KostGallery::class, 'kost_id', 'id');
    }
}
