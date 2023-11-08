<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Participant extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = ['name', 'email', 'password', 'role'];

    public function hasApplied($conf_id)
    {
        return Participation::where(['participant_id'=>$this->id,"conference_id"=>$conf_id])->first();
    }

    public function submissions($conf_id)
    {
        $part = $this->hasApplied($conf_id);
        if($part){
            return ConferenceSubmission::where(['participation_id'=>$part->id])->get();
        }
        return [];
    }
    public function submissionsJournal()
    {

            return JournalSubmission::where(['participant_id'=>$this->id])->get();

        return [];
    }
}
