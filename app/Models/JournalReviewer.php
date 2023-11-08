<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalReviewer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'journal_submission_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function journalSubmission()
    {
        return $this->belongsTo(JournalSubmission::class);
    }
}
