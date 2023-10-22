<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConferenceTiming extends Model
{
    use HasFactory;
    protected $fillable = ['conference_id', 'start_datetime', 'end_datetime'];
}
