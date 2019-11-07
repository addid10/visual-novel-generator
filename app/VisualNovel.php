<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class VisualNovel extends Model
{
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];

    public function genres()
    {
        return $this->belongsToMany(
            'App\Genre', 
            'genre_visual_novel', 
            'visual_novel_id', 
            'genre_id'
        );
    }
    
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
    
    public function visual_novels_characters()
    {
        return $this->hasMany('App\VisualNovelCharacter');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
