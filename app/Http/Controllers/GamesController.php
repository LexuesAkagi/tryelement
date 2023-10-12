<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;

class GamesController extends Controller
{

    public function index(Request $request)
    {
        $unuseCards = Card::inRandomOrder()->take(5)->get();
        $request->session()->put('5cards', $unuseCards);
        $gameScore = 0;
        $request->session()->put('gameScore', $gameScore);
        
        $comUnuseCards = Card::inRandomOrder()->take(5)->get();
        $request->session()->put('com5cards', $comUnuseCards);
        $comGameScore = 0;
        $request->session()->put('comGameScore', $comGameScore);
        return view('game', [
            'unuseCards' => $unuseCards,
            'comUnuseCards' => $comUnuseCards,
            'gameScore' => $gameScore,
            'comGameScore' => $comGameScore,
            
        ]);
    }
    
    public function select(Request $request)
    {
        //プレイヤーカード
        $randomCards = $request->session()->get('5cards');
        $usedcardId = (int)$request->selectedCardId;
        $usedCard = $randomCards->find($usedcardId);
        
        if($usedCard == null) {
            return redirect('/');
        }
        
        $unuseCards = $randomCards->filter(function($unuseCard) use ($usedCard) {// 選択したカードを省く
            return $unuseCard != $usedCard;// // 絞り込み条件
        });
        $request->session()->put('5cards', $unuseCards);// 省いたカード情報をセッションに上書き保存
        
        //プレーヤーゲームスコア
        $gameScore = $request->session()->get('gameScore');
        
        
        // コンピューターカード
        $comRandomCards = $request->session()->get('com5cards');
        $comUsedCard = $comRandomCards->random();
        $comUnuseCards = $comRandomCards->filter(function ($comUnuseCard) use ($comUsedCard) {
            return $comUnuseCard != $comUsedCard;
        });
        $request->session()->put('com5cards', $comUnuseCards);
        
        //コンピューターゲームスコア
        $comGameScore = $request->session()->get('comGameScore');
        
        //バトル結果
        $vsAttribute = $usedCard->attribute;
        $comVsAttribute = $comUsedCard->attribute;
        $score = $usedCard->score;
        $comScore = $comUsedCard->score;
        
        $attributeTexts = [
            "green" => "緑",
            "fire" => "火",
            "water" => "水",
            ];
        
        $message = "";
        if($vsAttribute != $comVsAttribute) {
            $message .= "{$attributeTexts[$vsAttribute]}と{$attributeTexts[$comVsAttribute]}により";
            if  (($vsAttribute == "green" && $comVsAttribute == "water") || 
                ($vsAttribute == "fire" && $comVsAttribute == "green") ||
                ($vsAttribute == "water" && $comVsAttribute == "fire")) {
                $score += 4;
                $message .= "プレイヤーに+4点加点";
            }
            if  (($comVsAttribute == "green" && $vsAttribute == "water") || 
                ($comVsAttribute == "fire" && $vsAttribute == "green") ||
                ($comVsAttribute == "water" && $vsAttribute == "fire")) {
                $comScore += 4;
                $message .= "コンピューターに+4点加点";
            }
        }
        else {
            $message .= "同属性により";
        }
        
        $win ="";
        if ($score > $comScore){
            $gameScore += 1;
            $win = "プレイヤーの得点";
        }
        elseif ($score < $comScore){
            $win = "コンピューターの得点";
            $comGameScore += 1;
        }
        else{
            $win = "同点";
        }
        $request->session()->put('gameScore', $gameScore);
        $request->session()->put('comGameScore', $comGameScore);
        $message .= "{$score}vs{$comScore}で{$win}";
        
        $finmessage = null;
        // 最終結果
        if($unuseCards->isEmpty()) {
            
            if ($gameScore > $comGameScore){
                $finmessage = "プレイヤーの勝ち";
            }
            elseif ($gameScore < $comGameScore){
                $finmessage = "コンピューターの勝ち";
            }
            else{
                $finmessage = "同点";
            }
        }

        return view('game', [
            'unuseCards' => $unuseCards,
            'usedCard' => $usedCard,
            'comUnuseCards' => $comUnuseCards,
            'comUsedCard' => $comUsedCard,
            'gameScore' => $gameScore,
            'comGameScore' => $comGameScore,
            'message' => $message,
            'finmessage' => $finmessage
        ]);
    }
}
