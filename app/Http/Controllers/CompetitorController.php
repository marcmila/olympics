<?php


namespace App\Http\Controllers;


use App\Http\Requests\CompetitorCreateRequest;
use DateTime;
use Joselfonseca\LaravelTactician\CommandBusInterface as CommandBus;
use Olympics\Application\Commands\CompetitorCreateCommand;
use Olympics\Application\Handlers\CompetitorCreateHandler;
use Symfony\Component\HttpFoundation\JsonResponse;

class CompetitorController extends Controller
{
    private $bus;

    /**
     * CompetitorController constructor.
     * @param CommandBus $bus
     */
    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }

    /**
     * @param CompetitorCreateRequest $request
     * @return JsonResponse
     */
    public function create(CompetitorCreateRequest $request): JsonResponse
    {
        $this->bus->addHandler(
            CompetitorCreateCommand::class,
            CompetitorCreateHandler::class
        );

        $birthDate = $request->input('birth_date');
        if (!is_null($birthDate)) {
            $birthDate = DateTime::createFromFormat(
                'Y-m-d',
                $birthDate
            );
        }

        $command = new CompetitorCreateCommand(
            $request->input('name'),
            $request->input('last_name'),
            $request->input('passport'),
            $birthDate
        );

        return $this->bus->dispatch($command);
    }
}
