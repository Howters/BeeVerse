<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'ukm_id',
        'image',
        'name',
        'price',
        'stock',
        'short_description',
        'long_description',
        'color',
        'material',
        'rating',
    ];

    public function ukm() {
        return $this->belongsTo(Ukm::class);
    }

}
