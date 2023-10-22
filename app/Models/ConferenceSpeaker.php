<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConferenceSpeaker extends Model
{
    use HasFactory;
    protected $fillable = ['conference_id', 'speaker_id'];

    /**
     * Get the conference for the conference_speaker record.
     */
    public function conference()
    {
        return $this->belongsTo(Conference::class);
    }

    /**
     * Get the speaker for the conference_speaker record.
     */
    public function speaker()
    {
        return $this->belongsTo(Speaker::class);
    }
}
