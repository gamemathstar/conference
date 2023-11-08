<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConferenceReviewer extends Model
{
    use HasFactory;
    // Your existing model code...
    protected $guarded = [];

    /**
     * Get the conference submission for the reviewer.
     */
    public function conferenceSubmission()
    {
        return $this->belongsTo(ConferenceSubmission::class, 'conference_submission_id');
    }

    /**
     * Get the user for the reviewer.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
