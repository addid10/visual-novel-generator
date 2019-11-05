<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function visual_novels()
    {
        return $this->belongsToMany(
            'App\VisualNovel', 
            'genre_visual_novel', 
            'visual_novel_id', 
            'genre_id'
        );
    }
}
