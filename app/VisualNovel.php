<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisualNovel extends Model
{
    public function stories()
    {
        return $this->hasMany('App\Story');
    }

    public function musics()
    {
        return $this->belongsToMany(
            'App\Music', 
            'music_visual_novel', 
            'visual_novel_id', 
            'music_id'
        );
    }
    
    public function backgrounds()
    {
        return $this->belongsToMany(
            'App\Background', 
            'background_visual_novel', 
            'visual_novel_id', 
            'background_id'
        );
    }
    
    public function characters()
    {
        return $this->belongsToMany(
            'App\Character', 
            'character_visual_novel', 
            'visual_novel_id', 
            'character_id'
        );
    }
}
