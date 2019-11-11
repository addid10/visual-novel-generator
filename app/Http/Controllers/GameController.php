<?php

namespace App\Http\Controllers;

use Auth;
use App\VisualNovel;
use App\SaveData;
use App\Story;
use App\Helpers\SaveDataHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{

    public function index()
    {
        $games = VisualNovel::with('genres')->get();
        
        return view('games.index', ['games' => $games]);
    }

    public function menu($id)
    {        
        $userId = Auth::user()->id;

        $saveData = SaveData::with('story')
        ->whereUserId($userId)
        ->whereVisualNovelId($id)
        ->first();

        if(!empty($saveData->story)){
            $loadData = $saveData->story->dialogue_number;
        } else {
            $loadData = 1;
        }

        return view('games.menu', ['loadData' => $loadData, 'id' => $id]);
    }

    public function play(Request $request, $id)
    {
        $games = VisualNovel::with('backgrounds', 'musics')->whereId($id)->get();

        $charactersImages = DB::table('visual_novels_characters')
        ->join('characters', 'visual_novels_characters.character_id', '=', 'characters.id')
        ->join('characters_images', 'characters.id', '=', 'characters_images.character_id')
        ->where('visual_novels_characters.visual_novel_id', '=', $id)
        ->get(['characters_images.id', 'characters_images.image']);
        
        return $request->ajax() ? response()->json(['data' => $games]) : view('games.play', ['games' => $games, 'id' => $id, 'charactersImages' => $charactersImages, 'title' => $games[0]->title]);
    }

    public function showNextDialogue(Request $request, $id)
    {
        $dialogue = Story::with(['character_image' => function($characterImage){
            $characterImage->with('character');
        }, 'background', 'music'])
        ->whereVisualNovelId($id)
        ->whereDialogueNumber($request->number)
        ->first();

        return response()->json($dialogue);
    }

    public function save(Request $request, $id){ 

            $validator = SaveDataHelper::checkSaveData($id, Auth::user()->id);

            if($validator) {

                $save = SaveData::create([
                    'story_id' => $request->id,
                    'user_id' => Auth::user()->id,
                    'visual_novel_id' => $id
                ]);
                
                return response()->json([
                    'success' => "File saved!"
                ]);

            } else {
                $save = SaveData::where('visual_novel_id', $id)
                ->where('user_id', Auth::user()->id)->first();

                $save->update([
                    'story_id' => $request->id,
                    'visual_novel_id' => $id
                ]);

                return response()->json([
                    'success' => "File saved!"
                ]);
            }

      
    }
}
