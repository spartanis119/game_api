<?php

namespace App\Repositories;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class PokemonRepository
{
    private string $baseUrl;
    public function __construct()
    {
        $this->baseUrl = config('services.pokemon.base_url');
    }

    protected function request()
    {
        return Http::baseUrl($this->baseUrl);
    }

    public function getPokemonGames()
    {
        try {
            return $this->request()
                ->withQueryParameters([
                    'limit' => 100,
                ])
                ->get('/version')
                ->throw()
                ->json();
        } catch (RequestException $e) {
            logger(
                'Error al obtener los juegos de Pokémon: ',
                [
                    'message:' => $e->getMessage(),
                ]
            );
            throw $e;
        }
    }

    public function getKantoPokemons()
    {
        try {
            return $this->request()
                ->get('/generation/1/')
                ->throw()
                ->json();
        } catch (RequestException $e) {
            logger(
                'Error al obtener los juegos de Pokémon: ',
                [
                    'message:' => $e->getMessage(),
                ]
            );
            throw $e;
        }
    }

    public function getPokemon($pokemon_name)
    {
        try {
            return $this->request()
                ->get("/pokemon/{$pokemon_name}")
                ->throw()
                ->json();
        } catch (RequestException $e) {
            logger(
                'Error al obtener el pokemon: ',
                [
                    'message:' => $e->getMessage(),
                ]
            );
            throw $e;
        }
    }
}
