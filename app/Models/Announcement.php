<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'ukm_id',
        'image',
        'links',
        'title',
        'short_description',
        'long_description',
    ];

    public function ukm () {
        return $this->belongsTo(Ukm::class);
    }
}
