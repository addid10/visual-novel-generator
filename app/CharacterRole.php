<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharacterRole extends Model
{
    public function characters()
    {
        return $this->belongsToMany(
            'App\VisualNovel', 
            'character_visual_novel'
        );
    }
}
