<?php

// app/Models/ReservationDetail.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reservation_date_from',
        'reservation_date_to',
        'reservation_time_slot',
        'reservation_location',
        'program_name',
        'number_of_participants',
        'payment_method',
        'contact_person_name',
        'contact_person_email',
        'contact_person_phone',
        'contact_person_address',
        'resource_persons',
    ];

    protected $casts = [
        'reservation_location' => 'array',
        'resource_persons' => 'array',
    ];

    public function status()
    {
        return $this->hasOne(ReservationStatus::class, 'reservation_id');
    }
}
