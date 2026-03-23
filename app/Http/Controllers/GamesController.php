<?php

namespace App\Http\Controllers;

use App\Services\Pokemon\PokemonService;
use App\Services\Riot\LolService;
use App\Services\Riot\ValorantService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GamesController extends Controller
{
    function showLol(LolService $lolService)
    {
        $profile = $lolService->getMyProfile();
        $myChampionsData = $lolService->getMyChampionsMasteryData();
        // dd($myChampionsData);
        return Inertia::render('games/Lol', compact('profile', 'myChampionsData'));
    }
    function showValorant(ValorantService $valorantService)
    {
        $easyAgents = $valorantService->getEasyAgentByRol();
        // dd($easyAgents);
        $myFavoriteAgents = $valorantService->getMyFavoritesAgents();
        $myFavoriteWeapons = $valorantService->getMyFavoritesWeapons();
        $myFavoriteMaps = $valorantService->getMyFavoritesMaps();
        return Inertia::render('games/Valorant', compact('easyAgents', 'myFavoriteAgents', 'myFavoriteWeapons', 'myFavoriteMaps'));
    }
    function showPokemon(PokemonService $pokemonService)
    {
        $topGames = $pokemonService->getTopPokemonGames();
        $iconicPokemons = $pokemonService->getIconicPokemons();
        $myFavoritesPokemons = $pokemonService->getMyFavoritesPokemons();
        // dd($myFavoritesPokemons);
        return Inertia::render('games/Pokemon', compact('topGames', 'iconicPokemons', 'myFavoritesPokemons'));
    }
}

