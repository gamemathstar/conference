<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConferencePartner extends Model
{
    use HasFactory;
    protected $fillable = ['conference_id', 'partner_id'];
}
