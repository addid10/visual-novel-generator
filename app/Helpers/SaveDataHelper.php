<?php

namespace App\Helpers;

use App\SaveData;

class SaveDataHelper
{
    
    public static function checkSaveData($visualNovel, $user)
    {
        $saveData = SaveData::where('visual_novel_id', $visualNovel)
        ->where('user_id', $user)
        ->count();

        if ($saveData === 0){
            return true;
        } else {
            return false;
        }
    }
}
