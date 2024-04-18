<?php

namespace App\Models;

use App\Http\Controllers\GerantController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resto extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "resto_name",
        "resto_com",
        "resto_location",
        "resto_logo",
        "status",
    ] ;

    // public function gerant() {
    //     return $this->belongsTo(Gerant::class, 'gerant_id');
    // }


    // public function prods() {
    //     return $this->hasMany(Product::class, 'resto_id');
    // }
}
