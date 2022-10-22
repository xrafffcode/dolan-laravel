<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $table = 'hotels';

    protected $guarded = ['id'];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'rating',
        'city',
        'area',
        'country',

        'price',
        'restaurant',
        'wifi',
        'elevator',
        'breakfast',
        'parking',
        'laundry',
    ];

    public function galleries()
    {
        return $this->hasMany(HotelGallery::class, 'hotel_id', 'id');
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }
}
