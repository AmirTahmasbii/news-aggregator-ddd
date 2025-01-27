<?php

namespace Infrastructure\Article\Apis\NYT;

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
        $source = $this->sourceRepository->index()->firstWhere('name', 'nyt');

        $this->source_id = $source->id;
        $this->api_key = $source->api_key;
        $this->api_url = $source->api_url;
    }

    public function fetchArticles()
    {
        $response = Http::get($this->api_url, [
            'begin_date' => now()->subDays(2)->format('Ymd'),
            'end_date' => now()->subDays(1)->format('Ymd'),
            'api-key' => $this->api_key,
        ]);

        if ($response->failed()) {
            Log::warning($response->json());
            throw new \Exception('Failed to fetch articles from API.');
        }

        $articles = $this->mapArticles($response['response']['docs']);

        return $articles;
    }

    private function mapArticles(array $response): array
    {
        $articles = [];

        foreach ($response as $article) {
            $articles[] = [
                'title' => $article['abstract'],
                'content' => $article['web_url'],
                'keywords' => $article['news_desk'],
                'category' => $article['section_name'],
                'author' => $article['source'],
                'source_id' => $this->source_id,
                'published_at' => Carbon::parse($article['pub_date']),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        return $articles;
    }
}
