<?php
namespace App\Services\Riot;

use App\Repositories\LolRepository;
use Illuminate\Support\Facades\Cache;

class LolService
{
    private LolRepository $lolRepository;

    public function __construct()
    {
        $this->lolRepository = new LolRepository();
    }
    public function getMyProfile()
    {
        // getting data
        $lolAccount = $this->lolRepository->getLolAccount();
        $accountDetail = $this->lolRepository->getAccountDetail();

        // formatting data
        $myProfile = [
            "name" => $lolAccount['gameName'],
            "code" => $lolAccount['tagLine'],
            "level" => $accountDetail['summonerLevel'],
            "profileIconId" => $accountDetail['profileIconId']
        ];
        return $myProfile;
    }


    public function getAllChampionNames()
    {
        $championsSummary = $this->lolRepository->getSummaryChampions()['data'];
        $championsName = collect($championsSummary)->mapWithKeys(function ($champion) {
            return [(int) $champion['key'] => $champion['name']];
        });
        return $championsName;
    }

    public function getMyChampionsMasteryData()
    {
        // getting data
        $champions = $this->lolRepository->getChampionsMastery();
        $championNames = $this->getAllChampionNames();

        // formatting data
        $summonerChampionsMastery = collect($champions)->map(function ($item) use ($championNames) {
            $grades = data_get($item, 'nextSeasonMilestone.requireGradeCounts', []);
            return [
                'championInfo' => $this->getMyChampionsInfo($championNames[$item['championId']] ?? null),
                'championLevel' => $item['championLevel'],
                'championPoints' => $item['championPoints'],
                'requireGradeCounts' => array_key_first($grades),
            ];
        })->values()->toArray();
        return $summonerChampionsMastery;
    }
    public function getMyChampionsInfo($championName)
    {
        if ($championName) {

            $championData = Cache::remember("{$championName}_info", now()->addMonth(), function () use ($championName) {
                return $this->lolRepository->getChampionInfo($championName);
            });

            $champion = collect(data_get($championData, 'data', []))->first();
            $spells = collect(data_get($champion, 'spells', []));
            $passive = data_get($champion, 'passive', []);

            return [
                'name' => data_get($champion, 'name'),
                'title' => ucwords((string) data_get($champion, 'title')),
                'lore' => strip_tags(data_get($champion, 'lore', '')),
                'habilities' => [
                    'passive' => [
                        'name' => data_get($passive, 'name'),
                        'description' => strip_tags(data_get($passive, 'description', '')),
                    ],
                    'q' => [
                        'name' => data_get($spells->get(0), 'name'),
                        'description' => strip_tags(data_get($spells->get(0), 'description', '')),
                    ],
                    'w' => [
                        'name' => data_get($spells->get(1), 'name'),
                        'description' => strip_tags(data_get($spells->get(1), 'description', '')),
                    ],
                    'e' => [
                        'name' => data_get($spells->get(2), 'name'),
                        'description' => strip_tags(data_get($spells->get(2), 'description', '')),
                    ],
                    'r' => [
                        'name' => data_get($spells->get(3), 'name'),
                        'description' => strip_tags(data_get($spells->get(3), 'description', '')),
                    ],
                ],
            ];
        }
        return null;
    }
}






