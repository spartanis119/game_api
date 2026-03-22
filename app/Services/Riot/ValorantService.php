<?php

namespace App\Services\Riot;

use App\Repositories\ValorantRepository;

class ValorantService
{
    private ValorantRepository $valorantRepository;

    public function __construct()
    {
        $this->valorantRepository = new ValorantRepository();
    }
    function formatDescription($text)
    {
        $text = mb_strtolower($text, 'UTF-8');
        $sentences = preg_split('/(\. )/', $text, -1, PREG_SPLIT_DELIM_CAPTURE);

        $result = '';

        foreach ($sentences as $index => $part) {
            if ($index % 2 === 0) {
                $result .= mb_strtoupper(mb_substr($part, 0, 1)) . mb_substr($part, 1);
            } else {
                $result .= $part;
            }
        }

        return $result;
    }

    public function getEasyAgentByRol()
    {
        $allAgents = $this->valorantRepository->getAgents();
        $data = collect($allAgents['data']);
        $abilities = [
            'Ability1' => 'c',
            'Ability2' => 'q',
            'Grenade' => 'e',
            'Ultimate' => 'x',
            'Passive' => 'passive',
        ];
        $agents = $data
            ->whereIn('displayName', ['Sage', 'Phoenix', 'Sova', 'Brimstone'])
            ->map(function ($agent) use ($abilities) {

                return [
                    'name' => $agent['displayName'],
                    'description' => $agent['description'],
                    'image' => $agent['fullPortrait'],
                    'role' => $agent['role']['displayName'] ?? null,
                    'abilities' => collect($agent['abilities'])
                        ->filter(fn($ability) => !is_null($ability))
                        ->mapWithKeys(function ($ability) use ($abilities) {
                            $key = $abilities[$ability['slot']] ?? null;

                            return [
                                $key => [
                                    'name' => $ability['displayName'],
                                    'description' => $this->formatDescription($ability['description']),
                                ]
                            ];
                        })
                        ->toArray()
                ];
            })
            ->values();
        return $agents->values()->toArray();
    }

    public function getMyFavoritesAgents()
    {
        $allAgents = $this->valorantRepository->getAgents();
        $data = collect($allAgents['data']);
        $abilities = [
            'Ability1' => 'c',
            'Ability2' => 'q',
            'Grenade' => 'e',
            'Ultimate' => 'x',
            'Passive' => 'passive',
        ];
        $agents = $data
            ->whereIn('displayName', ['Jett', 'Raze', 'Reyna', 'Killjoy'])
            ->map(function ($agent) use ($abilities) {

                return [
                    'name' => $agent['displayName'],
                    'description' => $agent['description'],
                    'image' => $agent['fullPortrait'],
                    'role' => $agent['role']['displayName'] ?? null,
                    'abilities' => collect($agent['abilities'])
                        ->filter(fn($ability) => !is_null($ability))
                        ->mapWithKeys(function ($ability) use ($abilities) {
                            $key = $abilities[$ability['slot']] ?? null;

                            return [
                                $key => [
                                    'name' => $ability['displayName'],
                                    'description' => $this->formatDescription($ability['description']),
                                ]
                            ];
                        })
                        ->toArray()
                ];
            })
            ->values();
        return $agents->values()->toArray();
    }

    public function getMyFavoritesWeapons()
    {
        $allWeapons = $this->valorantRepository->getWeapons();

        $reaverSkins = [
            'Odin Sepulcral',
            'Vandal Sepulcral',
            'Operator Sepulcral',
            'GhostSepulcral Sepulcral',
            'Spectre Sepulcral',
        ];

        $myFavoritesWeapons = collect($allWeapons['data'])
            ->flatMap(fn($weapon) => $weapon['skins'])
            ->filter(fn($skin) => in_array($skin['displayName'], $reaverSkins))
            ->map(fn($skin) => [
                'name' => $skin['displayName'],
                'image' => $skin['displayIcon'],
            ])
            ->values()->toArray();

        return $myFavoritesWeapons;
    }

    public function getMyFavoritesMaps()
    {
        $allMaps = $this->valorantRepository->getMaps();

        $mapNames = ['Bind', 'Split', 'Icebox', 'Breeze'];

        $myFavoritesMaps = collect($allMaps['data'] ?? [])
            ->whereIn('displayName', $mapNames)
            ->map(fn($map) => [
                'name' => $map['displayName'],
                'image' => $map['splash'],
            ])
            ->values()
            ->toArray();

        return $myFavoritesMaps;
    }

}
