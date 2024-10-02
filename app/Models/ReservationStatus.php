<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationStatus extends Model
{
    use HasFactory;
    protected $table = 'reservation_status'; // Specify the correct table name
    protected $fillable = ['reservation_id', 'approved_status'];

    public function reservation()
    {
        return $this->belongsTo(ReservationDetail::class, 'reservation_id');
    }
}
