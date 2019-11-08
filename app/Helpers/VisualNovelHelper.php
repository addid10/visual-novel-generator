<?php

namespace App\Helpers;

use App\VisualNovel;
use App\VisualNovelCharacter;

class VisualNovelHelper
{
    
    public static function checkCharacter($visualNovel, $character)
    {
        $visualNovelCharacter = VisualNovelCharacter::where('visual_novel_id', $visualNovel)
        ->where('character_id', $character)
        ->count();

        if ($visualNovelCharacter === 0){
            return true;
        } else {
            return false;
        }
    }
}
