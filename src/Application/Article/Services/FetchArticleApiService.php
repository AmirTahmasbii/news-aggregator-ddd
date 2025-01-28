<?php

namespace Application\Article\Services;

use Application\Article\Contracts\FetchArticleApiServiceContract;
use Domain\Article\Repositories\ArticleRepositoryContract;
use Infrastructure\Article\Apis\Guardian\Client as GuardianClient;
use Infrastructure\Article\Apis\NewsApi\Client as NewsApiClient;
use Infrastructure\Article\Apis\NYT\Client as NytClient;

class FetchArticleApiService implements FetchArticleApiServiceContract
{
    public function __construct(
        private GuardianClient $guardianClient,
        private NewsApiClient $newsApiClient,
        private NytClient $nytClient,
        private ArticleRepositoryContract $articleRepository
    ) {}

    public function fetchAndStoreArticles(): void
    {
        $guardian_articles = $this->fetchGuardianArticles();
        $newsApi_articles = $this->fetchNewsApiArticles();
        $nyt_articles = $this->fetchNytArticles();

        $articles = array_merge($guardian_articles, $newsApi_articles, $nyt_articles);

        $this->storeArticles($articles);
    }

    private function fetchGuardianArticles(): array
    {
        return $this->guardianClient->fetchArticles();
    }

    private function fetchNewsApiArticles(): array
    {
        return $this->newsApiClient->fetchArticles();
    }

    private function fetchNytArticles(): array
    {
        return $this->nytClient->fetchArticles();
    }

    private function storeArticles(array $articles): void
    {
        $this->articleRepository->store($articles);
    }
}
