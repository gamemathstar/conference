<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSchedule extends Model
{
    use HasFactory;
    protected $fillable = ['conference_id', 'name', 'description', 'start_datetime', 'end_datetime', 'location_id'];
}
