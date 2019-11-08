<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisualNovelCharacter extends Model
{
    protected $table = 'visual_novels_characters';
    public $timestamps = false;

    protected $fillable = ['visual_novel_id', 'character_id', 'character_role_id'];
    
    public function character_role()
    {
        return $this->belongsTo('App\CharacterRole');
    }

    public function character()
    {
        return $this->belongsTo('App\Character');
    }
    
    public function visual_novel()
    {
        return $this->belongsTo('App\VisualNovel');
    }


}
