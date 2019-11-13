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
            'music_id', 
            'visual_novel_id'
        );
    }
    
    public function stories()
    {
        return $this->hasMany('App\Story');
    }
}
