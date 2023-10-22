<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConferenceImage extends Model
{
    use HasFactory;
    protected $fillable = ['conference_id', 'image_path'];
}
