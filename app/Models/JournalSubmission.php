<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'participant_id',
        'title',
        'type',
        'url',
        'status',
        'remark',
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function reviewers()
    {
        return $this->hasMany(JournalReviewer::class, 'journal_submission_id');
    }
}
