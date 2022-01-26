<?php


namespace App\Http\Controllers;


use App\Http\Requests\AdminCreateRequest;
use Joselfonseca\LaravelTactician\CommandBusInterface;
use Src\Application\Commands\AdminCreateCommand;
use Symfony\Component\HttpFoundation\JsonResponse;

class AdminController
{
    private $bus;

    /**
     * AdminController constructor.
     * @param CommandBusInterface $bus
     */
    public function __construct(CommandBusInterface $bus)
    {
        $this->bus = $bus;
    }

    public function create(AdminCreateRequest $request): JsonResponse
    {
        $this->bus->addHandler(AdminCreateCommand::class, GenerateOrderHandler::class);
        return $this->bus->dispatch(GenerateOrder::class, $data, $this->middleware);
        return JsonResponse::create(['name' => $request->input('name')]);
    }
}
