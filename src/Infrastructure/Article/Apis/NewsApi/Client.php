<?php

namespace Infrastructure\Article\Apis\NewsApi;

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
        $source = $this->sourceRepository->index()->firstWhere('name', 'newsapi');

        $this->source_id = $source->id;
        $this->api_key = $source->api_key;
        $this->api_url = $source->api_url;
        
        $response = Http::get($this->api_url, [
            'q' => 'everything',
            'language' => 'en',
            'from' => now()->subDays(2)->format('Y-m-d'),
            'to' => now()->subDays(1)->format('Y-m-d'),
            'apiKey' => $this->api_key,
        ]);

        if ($response->failed()) {
                Log::warning("News API: " . $response->json());
                throw new \Exception('Failed to fetch articles from API.');
        }
        
        $articles = $this->mapArticles($response['articles']);

        return $articles;
    }

    private function mapArticles(array $response): array
    {
        $articles = [];

        foreach ($response as $article) {
            $articles[] = [
                'title' => $article['title'],
                'content' => $article['content'],
                'keywords' => $article['keywords'] ?? 'everything',
                'category' => $article['category'] ?? 'everything',
                'author' => $article['author'] ?? 'unknown',
                'source_id' => $this->source_id,
                'published_at' => Carbon::parse($article['publishedAt']),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        return $articles;
    }
}
