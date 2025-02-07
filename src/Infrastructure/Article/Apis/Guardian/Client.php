<?php

namespace Infrastructure\Article\Apis\Guardian;

use Carbon\Carbon;
use Domain\Source\Repositories\SourceRepositoryContract;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

final class Client
{
    private string $api_key;
    private string $api_url;
    private string $source_id;
    
    public function __construct(private SourceRepositoryContract $sourceRepository)
    {

    }

    public function fetchArticles()
    {
        $this->setConfig();
        
        $allArticles = [];

        do {
            $response = Http::get($this->api_url, [
                'from-date' => now()->subDays(2)->format('Y-m-d'),
                'to-date' => now()->subDays(1)->format('Y-m-d'),
                'api-key' => $this->api_key,
                'page' => $page = $page ?? 1,
            ]);

            if ($response->failed()) {
                Log::warning("Guardian API: " . $response->json());
                throw new \Exception('Failed to fetch articles from API.');
            }

            $articles = $this->mapArticles($response['response']['results']);
            $allArticles = array_merge($allArticles, $articles);

            $page++;
        } while ($response->json()['response']['pages'] >= $page);
        
        return $allArticles;
    }

    private function mapArticles(array $response): array
    {
        $articles = [];

        foreach ($response as $article) {
            $articles[] = [
                'title' => $article['webTitle'],
                'content' => $article['webUrl'],
                'keywords' => $article['sectionName'],
                'category' => $article['pillarName'] ?? 'unknown',
                'author' => $article['author'] ?? 'unknown',
                'source_id' => $this->source_id,
                'published_at' => Carbon::parse($article['webPublicationDate']),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        return $articles;
    }

    private function setConfig()
    {
        $source = $this->sourceRepository->index()->firstWhere('name', 'guardian');

        $this->source_id = $source->id;
        $this->api_key = $source->api_key;
        $this->api_url = $source->api_url;
    }
}
