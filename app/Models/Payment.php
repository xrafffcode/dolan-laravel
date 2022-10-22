<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'users_id',
        'transaction_tours_id',
        'transaction_transportations_id',
        'transaction_hotel_id',
        'image',
        'name',
        'type'
    ];

    public function transaction_tour()
    {
        return $this->belongsTo(Transaction::class, 'transaction_tours_id', 'id');
    }
}
