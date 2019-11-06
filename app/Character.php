<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    public function visual_novels()
    {
        return $this->belongsToMany(
            'App\VisualNovel', 
            'character_visual_novel', 
            'visual_novel_id', 
            'character_id'
        );
    }
    
    public function characters_images()
    {
        return $this->hasMany('App\CharacterImage');
    }
}
