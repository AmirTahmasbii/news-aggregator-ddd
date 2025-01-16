<?php

declare(strict_types=1);

namespace Presentation\ArticleManagement\Controllers;

use Application\Article\Contracts\ArticleServiceContract;
use Application\Bus\Contracts\CommandBusContract;
use Application\Bus\Contracts\QueryBusContract;
use Presentation\Controller;

class ArticleController extends Controller
{
    public function __construct(
        protected CommandBusContract $commandBus,
        protected QueryBusContract $queryBus,
        protected ArticleServiceContract $articleService,
    ) {}

}
