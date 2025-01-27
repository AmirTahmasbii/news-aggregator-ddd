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
        $guardian_articles = $this->guardianClient->fetchArticles();
        $newsApi_articles = $this->newsApiClient->fetchArticles();
        $nyt_articles = $this->nytClient->fetchArticles();

        $articles = array_merge($guardian_articles, $newsApi_articles, $nyt_articles);

        $this->articleRepository->store($articles);
    }
}
