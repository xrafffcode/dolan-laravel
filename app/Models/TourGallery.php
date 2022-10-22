<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourGallery extends Model
{
    protected $table =  'tour_galleries';

    protected $fillable = [
        'tour_id', 'image'
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id', 'id');
    }
}
