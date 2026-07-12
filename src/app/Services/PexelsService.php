<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PexelsService
{
    protected static string $baseUrl = 'https://api.pexels.com/v1';

    public static function search(string $query, int $perPage = 9): array
    {
        $response = Http::withHeaders(['Authorization' => config('pexels.api_key')])
            ->get(self::$baseUrl . '/search', [
                'query' => $query,
                'per_page' => $perPage,
                'locale' => 'en-US',
                'orientation' => 'landscape',
            ]);

        if (! $response->successful()) {
            return [];
        }

        return collect($response->json('photos'))->map(function ($photo) {
            return [
                'id' => $photo['id'],
                'thumb' => $photo['src']['medium'] ?? $photo['src']['original'],
                'full' => $photo['src']['landscape'] ?? $photo['src']['large'] ?? $photo['src']['original'],
                'photographer' => $photo['photographer'],
                'photographer_url' => $photo['photographer_url'],
                'pexels_url' => $photo['url'],
                'alt' => $photo['alt'] ?? '',
                'avg_color' => $photo['avg_color'] ?? '#1e293b',
            ];
        })->toArray();
    }
}
