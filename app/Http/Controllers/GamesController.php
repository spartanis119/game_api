<?php

namespace App\Http\Controllers;

use App\Services\Riot\LolService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GamesController extends Controller
{
    function showLol(LolService $lolService){
        $profile = $lolService->getMyProfile();
        $myChampionsData = $lolService->getMyChampionsMasteryData();
        return Inertia::render('games/Lol', compact('profile', 'myChampionsData'));
    }
    function showValorant(){

    }
    function showPokemon(){

    }
}
