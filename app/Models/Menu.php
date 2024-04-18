<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'num',
        'user_id',
        'resto_id',
        'prod_id',
        'price',
        'type',
        'state',
        // 'prod_1_2',
        // 'price_1_2',
        // 'prod_1_3',
        // 'price_1_3',
        // 'prod_1_4',
        // 'price_1_4',
        // 'prod_1_5',
        // 'price_1_5',
        // 'prod_1_6',
        // 'price_1_6',
        // 'prod_2_1',
        // 'price_2_1',
        // 'prod_2_2',
        // 'price_2_2',
        // 'prod_2_3',
        // 'price_2_3',
        // 'prod_2_4',
        // 'price_2_4',
        // 'prod_2_5',
        // 'price_2_5',
        // 'prod_2_6',
        // 'price_2_6',
        // 'prod_3_1',
        // 'price_3_1',
        // 'prod_3_2',
        // 'price_3_2',
        // 'prod_3_3',
        // 'price_3_3',
        // 'prod_3_4',
        // 'price_3_4',
        // 'prod_3_5',
        // 'price_3_5',
        // 'prod_3_6',
        // 'price_3_6',
        // 'prod_4_1',
        // 'price_4_1',
        // 'prod_4_2',
        // 'price_4_2',
        // 'prod_4_3',
        // 'price_4_3',
        // 'prod_4_4',
        // 'price_4_4',
        // 'prod_4_5',
        // 'price_4_5',
        // 'prod_4_6',
        // 'price_4_6',

    ];

    public function resto() {
        return $this->belongsTo(Resto::class, 'resto_id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'prod_id');
    }
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
