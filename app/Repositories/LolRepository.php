<?php

namespace App\Repositories;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class LolRepository
{
    private string $puuid;
    private string $apiKey;
    private string $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('services.riot.api_key');
        $this->puuid = config('services.riot.puuid');
        $this->baseUrl = config('services.riot.base_url');
    }

    protected function request($apiKey = true)
    {
        if ($apiKey == true) {
            return Http::
                withQueryParameters([
                    'api_key' => $this->apiKey,
                ])->
                baseUrl($this->baseUrl);
        } else {
            return Http::baseUrl($this->baseUrl);
        }


    }

    public function withPersonalizeBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    // * Api riot
    public function getLolAccount()
    {
        try {
            return $this->request()
                ->withUrlParameters([
                    'puuid' => $this->puuid,
                ])
                ->get('/riot/account/v1/accounts/by-puuid/{puuid}')
                ->throw()
                ->json();
        } catch (RequestException $e) {
            logger(
                'Error al obtener la cuenta: ',
                [
                    'message' => $e->getMessage()
                ]
            );
            throw $e;
        }
    }

    public function getAccountDetail()
    {
        try {
            return $this->withPersonalizeBaseUrl('https://la1.api.riotgames.com')
                ->request()
                ->withUrlParameters([
                    'encryptedPUUID' => $this->puuid,
                ])
                ->get('/lol/summoner/v4/summoners/by-puuid/{encryptedPUUID}')
                ->throw()
                ->json();
        } catch (RequestException $e) {
            logger(
                'Error al obtener datos del invocador: ',
                [
                    'message' => $e->getMessage()
                ]
            );
            throw $e;
        }

    }

    public function getChampionsMastery()
    {
        try {
            return $this->withPersonalizeBaseUrl('https://la1.api.riotgames.com')
                ->request()
                ->withUrlParameters([
                    'encryptedPUUID' => $this->puuid,
                ])
                ->withQueryParameters([
                    'count' => 6
                ])
                ->get('/lol/champion-mastery/v4/champion-masteries/by-puuid/{encryptedPUUID}/top')
                ->throw()
                ->json();
        } catch (RequestException $e) {
            logger(
                'Error al obtener la maestria: ',
                [
                    'message' => $e->getMessage()
                ]
            );
            throw $e;
        }
    }

    // * Data Dragon api

    public function getLastLolVesion()
    {
        try {
            return $this->withPersonalizeBaseUrl('https://ddragon.leagueoflegends.com')
                ->request(false)
                ->get('/api/versions.json')
                ->throw()
                ->json();
        } catch (RequestException $e) {
            logger(
                'Error al obtener la maestria: ',
                [
                    'message' => $e->getMessage()
                ]
            );
            throw $e;
        }
    }

    public function getSummaryChampions()
    {
        try {
            $lolLastVersion = Cache::remember('lol_last_version', now()->addMonth(), function () {
                return $this->getLastLolVesion()[0];
            });
            return $this->withPersonalizeBaseUrl('https://ddragon.leagueoflegends.com')
                ->request(false)
                ->get("/cdn/{$lolLastVersion}/data/es_MX/champion.json")
                ->throw()
                ->json();
        } catch (RequestException $e) {
            logger(
                'Error al obtener los campeones: ',
                [
                    'message' => $e->getMessage()
                ]
            );
            throw $e;
        }
    }

    public function getChampionInfo($championName)
    {
        try {
            $lolLastVersion = Cache::remember('lol_last_version', now()->addMonth(), function () {
                return $this->getLastLolVesion()[0];
            });
            return $this->withPersonalizeBaseUrl('https://ddragon.leagueoflegends.com')
                ->request(false)
                ->get("/cdn/{$lolLastVersion}/data/es_MX/champion/{$championName}.json")
                ->throw()
                ->json();
        } catch (RequestException $e) {
            logger(
                'Error al obtener las habilidades del campeon: ',
                [
                    'message' => $e->getMessage()
                ]
            );
            throw $e;
        }
    }


}
