<?php

declare(strict_types=1);

namespace Presentation\PreferenceManagement\Controllers;

use Application\Preference\Contracts\PreferenceServiceContract;
use Application\Preference\Data\PreferenceData;
use Application\Bus\Contracts\CommandBusContract;
use Application\Bus\Contracts\QueryBusContract;
use Application\Preference\Commands\CreatePreferenceCommand;
use Application\Preference\Data\PreferencesListData;
use Application\Preference\Queries\ShowPreferenceQuery;
use Presentation\Controller;
use Presentation\PreferenceManagement\Requests\PerformanceFormRequest;

class PreferenceController extends Controller
{
    public function __construct(
        protected CommandBusContract $commandBus,
        protected QueryBusContract $queryBus,
        protected PreferenceServiceContract $preferenceService,
    ) {}

    public function show(): \Illuminate\Http\JsonResponse
    {
        $preference = $this->queryBus->ask(
            new ShowPreferenceQuery(auth()->id()),
        );
        
        $dataList = PreferencesListData::from($preference);

        return response()->json([
            'status' => 'success',
            'data' => $dataList,
        ]);
    }

    public function create(PerformanceFormRequest $request): \Illuminate\Http\JsonResponse
    {
        $preferenceData = PreferenceData::from($request->validated());

        $this->commandBus->dispatch(
            new CreatePreferenceCommand($preferenceData),
        );
        
        return response()->json([
            'status' => 'success',
            'message' => 'Preference created successfully',
        ]);
    }
}
