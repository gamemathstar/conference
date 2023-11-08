<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConferenceSubmission extends Model
{
    use HasFactory;
    protected $guarded = [];


    /**
     * Get the reviewer for the conference submission.
     */
    public function reviewers()
    {
        return $this->hasMany(ConferenceReviewer::class, 'conference_submission_id');
    }
}
