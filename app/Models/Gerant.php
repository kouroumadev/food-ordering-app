<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerant extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "resto_id",
        "gerant_fname",
        "gerant_lname",
        "gerant_location",
        "gerant_image",
        "gerant_email",
        "gerant_pwd",
        "gerant_is_first",
        "status",
    ] ;

    public function resto() {
        return $this->belongsTo(Resto::class, 'resto_id');
    }
}
