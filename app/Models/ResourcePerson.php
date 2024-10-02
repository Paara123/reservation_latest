<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourcePerson extends Model
{
    use HasFactory;

    protected $table = 'resource_persons'; // Explicitly specify the table name

    protected $fillable = [
        'resource_person_id',
        'resource_person_name',
        'resource_person_contact_no',
        'resource_person_email',
        'resource_person_address',
        'expertise_fields',
        'institute',
    ];

    public $timestamps = true;
}
