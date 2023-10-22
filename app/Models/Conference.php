<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'start_date', 'end_date', 'image_path'];
    protected $hidden=['description'];

    public static function conference()
    {
        $conf = Conference::whereDate('end_date',"<=",today())->orderBy('start_date',"ASC")->first();
        if(!$conf){
            return Conference::orderBy('start_date',"ASC")->first();
        }
        return $conf;
    }

    public function speakers()
    {
        return $this->belongsToMany(Speaker::class, 'conference_speakers')->join('speaking_orders','speaking_orders.name','=','conference_speakers.speaker_type');
    }

    public function keynoteSpeaker()
    {
        return $this->speakers()->where(['speaker_type'=>'keynote'])->first();
    }
    public function otherSpeakers()
    {
        return $this->speakers()->where('speaker_type',"<>",'keynote')
            ->select(['speakers.*','speaker_type'])->get();
    }

}
