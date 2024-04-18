<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'prod_name',
        'prod_price',
        'prod_desc',
        'prod_img',
        'status'
    ] ;

    public function cat() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

