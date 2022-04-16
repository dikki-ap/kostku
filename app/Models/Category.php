<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Function Relasi dari tabel Categories ke tabel Kosts (1 To M)
    public function kosts(){
        return $this->hasMany(Kost::class, 'category_id', 'id');
    }
}
