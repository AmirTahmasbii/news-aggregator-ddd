<?php

namespace Application\Article\Services;

use Application\Article\Contracts\FetchArticleApiServiceContract;
use Domain\Article\Repositories\ArticleRepositoryContract;
use Infrastructure\Article\Apis\Guardian\Client as GuardianClient;
use Infrastructure\Article\Apis\NewsApi\Client as NewsApiClient;

class FetchArticleApiService implements FetchArticleApiServiceContract
{
    public function __construct(
        private GuardianClient $guardianClient,
        private NewsApiClient $newsApiClient,
        // private BbcClient $bbcClient,
        private ArticleRepositoryContract $articleRepository
    ) {}

    public function fetchAndStoreArticles(): void
    {
        $guardian_articles = $this->guardianClient->fetchArticles();
        $newsApi_articles = $this->newsApiClient->fetchArticles();

        $articles = array_merge($guardian_articles, $newsApi_articles);
        
        $this->articleRepository->store($articles);
    }
}
