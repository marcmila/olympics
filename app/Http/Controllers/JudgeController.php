<?php


namespace App\Http\Controllers;


use App\Http\Requests\AddResultRequest;
use App\Http\Requests\JudgeUpdateRequest;
use Joselfonseca\LaravelTactician\CommandBusInterface as CommandBus;
use Olympics\Application\Commands\{AddResultCommand, JudgeUpdateCommand};
use Olympics\Application\Handlers\{AddResultHandler, JudgeUpdateHandler};
use Symfony\Component\HttpFoundation\JsonResponse;

class JudgeController extends Controller
{
    private $bus;

    /**
     * JudgeController constructor.
     * @param CommandBus $bus
     */
    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }

    /**
     * @param JudgeUpdateRequest $request
     * @return JsonResponse
     */
    public function update(JudgeUpdateRequest $request): JsonResponse
    {
        $this->bus->addHandler(
            JudgeUpdateCommand::class,
            JudgeUpdateHandler::class
        );

        $command = new JudgeUpdateCommand(
            $request->input('id'),
            $request->input('name'),
            $request->input('last_name'),
            $request->input('passport'),
            $request->input('judge_id')
        );

        return $this->bus->dispatch($command);
    }

    /**
     * @param AddResultRequest $request
     * @return JsonResponse
     */
    public function addResult(AddResultRequest $request): JsonResponse
    {
        $this->bus->addHandler(
            AddResultCommand::class,
            AddResultHandler::class
        );

        $command = new AddResultCommand(
            $request->input('competitor_id'),
            $request->input('modality'),
            $request->input('position')
        );

        return $this->bus->dispatch($command);
    }
}
