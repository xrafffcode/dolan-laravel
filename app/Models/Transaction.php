<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $table = 'transaction_tours';

    protected $fillable = [
        'tour_id',
        'users_id',
        'transaction_code',
        'name',
        'email',
        'phone_number',
        'date',
        'people',
        'transaction_total',
        'transaction_status'
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'transaction_tours_id', 'id');
    }
}
