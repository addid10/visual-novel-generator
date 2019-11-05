<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    public function visual_novels()
    {
        return $this->belongsToMany(
            'App\VisualNovel', 
            'music_visual_novel', 
            'visual_novel_id', 
            'music_id'
        );
    }
    
    public function stories()
    {
        return $this->hasMany('App\Story');
    }
}
