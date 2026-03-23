<?php
namespace App\Services\Pokemon;

use App\Repositories\PokemonRepository;

class PokemonService
{
    private PokemonRepository $pokemonRepository;

    public function __construct()
    {
        $this->pokemonRepository = new PokemonRepository();
    }

    public function getTopPokemonGames()
    {
        $games = $this->pokemonRepository->getPokemonGames();
        $topGames = collect($games['results'])
            ->pluck('name')
            ->filter(function ($name) {
                return in_array($name, ['red', 'blue', 'sword', 'shield', 'gold', 'silver']);
            })
            ->map(function ($name) {
                return ['name' => $name];
            })
            ->values()->toArray();
        return $topGames;
    }

    public function getIconicPokemons()
    {
        $pokemons = $this->pokemonRepository->getKantoPokemons();
        $iconicPokemons = collect($pokemons['pokemon_species'])
            ->pluck('name')
            ->filter(function ($name) {
                return in_array($name, ['pikachu', 'charizard', 'mewtwo']);
            })
            ->map(function ($name) {
                return ['name' => $name];
            })
            ->values()->toArray();
        return $iconicPokemons;
    }

    public function getMyFavoritesPokemons()
    {
        $pokemons = ['gyarados', 'articuno', 'dragonite', 'growlithe'];

        $myFavoritesPokemons = collect($pokemons)
            ->map(function ($pokemonName) {
                $pokemon = $this->pokemonRepository->getPokemon($pokemonName);
                $types = collect($pokemon['types'] ?? []);

                return [
                    'name' => $pokemon['name'] ?? null,
                    'types' => [
                        'primary' => data_get($types->firstWhere('slot', 1), 'type.name'),
                        'secondary' => data_get($types->firstWhere('slot', 2), 'type.name'),
                    ],
                    'abilities' => collect($pokemon['abilities'] ?? [])
                        ->map(function ($ability) {
                            return [
                                'name' => data_get($ability, 'ability.name'),
                                'is_hidden' => (bool) data_get($ability, 'is_hidden', false),
                            ];
                        })
                        ->values()
                        ->toArray(),
                    'base_experience' => $pokemon['base_experience'] ?? null,
                    'stats' => collect($pokemon['stats'] ?? [])
                        ->mapWithKeys(function ($stat) {
                            $statName = data_get($stat, 'stat.name');

                            if (!$statName) {
                                return [];
                            }

                            return [
                                $statName => [
                                    'base_stat' => data_get($stat, 'base_stat'),
                                ],
                            ];
                        })
                        ->toArray(),
                    'height' => isset($pokemon['height'])
                        ? number_format($pokemon['height'] / 10, 1, '.', '')
                        : null,
                    'weight' => isset($pokemon['weight'])
                        ? number_format($pokemon['weight'] / 10, 1, '.', '')
                        : null,
                    'sprite' => $pokemon['sprites']['front_default'] ?? null,
                ];
            })
            ->values()
            ->toArray();

        return $myFavoritesPokemons;
    }
}
