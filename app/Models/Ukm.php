<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukm extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'banner',
        'short_name',
        'long_name',
        'short_description',
        'about_us',
        'vision',
        'mission',
        'email',
        'phone',
        'address',
        'instagram',
        'linkedin',
        'youtube'
    ];

    public function announcements() {
        return $this->hasMany(Announcement::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'tags_ukms');
    }
}
