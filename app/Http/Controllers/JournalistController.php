<?php


namespace App\Http\Controllers;


use App\Http\Requests\JournalistCreateRequest;
use App\Http\Requests\JournalistUpdateRequest;
use Joselfonseca\LaravelTactician\CommandBusInterface as CommandBus;
use Olympics\Application\Commands\JournalistCreateCommand;
use Olympics\Application\Commands\JournalistUpdateCommand;
use Olympics\Application\Handlers\JournalistCreateHandler;
use Olympics\Application\Handlers\JournalistUpdateHandler;
use Symfony\Component\HttpFoundation\JsonResponse;

class JournalistController extends Controller
{
    private $bus;

    /**
     * JournalistController constructor.
     * @param CommandBus $bus
     */
    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }

    /**
     * @param JournalistCreateRequest $request
     * @return JsonResponse
     */
    public function create(JournalistCreateRequest $request): JsonResponse
    {
        $this->bus->addHandler(
            JournalistCreateCommand::class,
            JournalistCreateHandler::class
        );

        $command = new JournalistCreateCommand(
            $request->input('name'),
            $request->input('last_name'),
            $request->input('passport'),
            $request->input('company_name')
        );

        return $this->bus->dispatch($command);
    }

    /**
     * @param JournalistUpdateRequest $request
     * @return JsonResponse
     */
    public function update(JournalistUpdateRequest $request): JsonResponse
    {
        $this->bus->addHandler(
            JournalistUpdateCommand::class,
            JournalistUpdateHandler::class
        );

        $command = new JournalistUpdateCommand(
            $request->input('id'),
            $request->input('name'),
            $request->input('last_name'),
            $request->input('passport'),
            $request->input('company_name')
        );

        return $this->bus->dispatch($command);
    }
}
