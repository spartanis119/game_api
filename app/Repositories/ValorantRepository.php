<?php

namespace App\Repositories;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ValorantRepository
{
    private string $baseUrl;
    private string $defaultLanguage;

    public function __construct()
    {
        $this->baseUrl = config('services.valorant.base_url');
        $this->defaultLanguage = 'es-MX';
    }

    protected function request()
    {
        return Http::withQueryParameters([
            'language' => $this->defaultLanguage
        ])->baseUrl($this->baseUrl);
    }

    public function getAgents()
    {
        try {
            return Cache::remember('valorant_agents', now()->addMonth(), function () {
                return $this->request()
                    ->get('/agents')
                    ->throw()
                    ->json();
            });
        } catch (RequestException $e) {
            logger(
                'Error al obtener los agentes: ',
                [
                    'message:' => $e->getMessage(),
                ]
            );
            throw $e;
        }
    }

    public function getWeapons()
    {
        try {
            return Cache::remember('valorant_weapons', now()->addMonth(), function () {
                return $this->request()
                    ->get('/weapons')
                    ->throw()
                    ->json();
            });
        } catch (RequestException $e) {
            logger(
                'Error al obtener las armas: ',
                [
                    'message:' => $e->getMessage(),
                ]
            );
            throw $e;
        }
    }

    public function getMaps()
    {
        try {
            return Cache::remember('valorant_maps', now()->addMonth(), function () {
                return $this->request()
                    ->get('/maps')
                    ->throw()
                    ->json();
            });
        } catch (RequestException $e) {
            logger(
                'Error al obtener los mapas: ',
                [
                    'message: ' => $e->getMessage(),
                ]
            );
            throw $e;
        }
    }
}
