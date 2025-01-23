<?php

namespace App\Console\Commands;

use Application\Article\Contracts\FetchArticleApiServiceContract;
use Illuminate\Console\Command;

class FetchAndUpdateArticles extends Command
{
    protected $signature = 'articles:fetch';
    protected $description = 'Fetch and update articles from news APIs';

    public function __construct(private FetchArticleApiServiceContract $articleFetcherService)
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Fetching articles...');
        $this->articleFetcherService->fetchAndStoreArticles();
        $this->info('Articles updated successfully.');
    }
}
