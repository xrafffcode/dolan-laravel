<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'rating',
        'location',
        'map'
    ];


    public function review()
    {
        return $this->hasMany(Testimonial::class, 'tour_id', 'id');
    }

    public function galleries()
    {
        return $this->hasMany(TourGallery::class, 'tour_id', 'id');
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'tour_id', 'id');
    }
}
