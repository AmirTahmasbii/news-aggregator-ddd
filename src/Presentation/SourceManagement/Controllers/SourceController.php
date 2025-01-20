<?php

declare(strict_types=1);

namespace Presentation\SourceManagement\Controllers;

use Application\Bus\Contracts\CommandBusContract;
use Application\Bus\Contracts\QueryBusContract;
use Application\Source\Contracts\SourceServiceContract;
use Application\Source\Data\SourceData;
use Presentation\Controller;

class SourceController extends Controller
{
    public function __construct(
        protected CommandBusContract $commandBus,
        protected QueryBusContract $queryBus,
        protected SourceServiceContract $sourceService,
    ) {}

    public function index(): \Illuminate\Http\JsonResponse
    {
        $sources = $this->sourceService->index();

        $dataList = SourceData::collect($sources);

        return response()->json([
            'status' => 'success',
            'data' => $dataList
        ]);
    }
}
