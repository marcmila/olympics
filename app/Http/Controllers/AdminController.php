<?php


namespace App\Http\Controllers;


use App\Http\Requests\AdminCreateRequest;
use App\Http\Requests\AdminDeleteRequest;
use App\Http\Requests\AdminUpdateRequest;
use DateTime;
use Joselfonseca\LaravelTactician\CommandBusInterface as CommandBus;
use Olympics\Application\Commands\{AdminCreateCommand, AdminDeleteCommand, AdminUpdateCommand};
use Olympics\Application\Handlers\{AdminCreateHandler, AdminDeleteHandler, AdminUpdateHandler};
use Symfony\Component\HttpFoundation\JsonResponse;

class AdminController extends Controller
{
    private $bus;

    /**
     * AdminController constructor.
     * @param CommandBus $bus
     */
    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }

    /**
     * @param AdminCreateRequest $request
     * @return JsonResponse
     */
    public function create(AdminCreateRequest $request): JsonResponse
    {
        $this->bus->addHandler(
            AdminCreateCommand::class,
            AdminCreateHandler::class
        );

        $unsubscribedDate = $request->input('unsubscribed_date');
        if (!is_null($unsubscribedDate)) {
            $unsubscribedDate = DateTime::createFromFormat(
                'Y-m-d',
                $unsubscribedDate
            );
        }

        $birthDate = $request->input('birth_date');
        if (!is_null($birthDate)) {
            $birthDate = DateTime::createFromFormat(
                'Y-m-d',
                $birthDate
            );
        }

        $command = new AdminCreateCommand(
            $request->input('name'),
            $request->input('last_name'),
            $request->input('passport'),
            $request->input('staff_type'),
            $unsubscribedDate,
            $birthDate,
            $request->input('company_name'),
            $request->input('judge_id')
        );

        return $this->bus->dispatch($command);
    }

    /**
     * @param AdminUpdateRequest $request
     * @return JsonResponse
     */
    public function update(AdminUpdateRequest $request): JsonResponse
    {
        $this->bus->addHandler(
            AdminUpdateCommand::class,
            AdminUpdateHandler::class
        );

        $unsubscribedDate = $request->input('unsubscribed_date');
        if (!is_null($unsubscribedDate)) {
            $unsubscribedDate = DateTime::createFromFormat(
                'Y-m-d',
                $unsubscribedDate
            );
        }

        $birthDate = $request->input('birth_date');
        if (!is_null($birthDate)) {
            $birthDate = DateTime::createFromFormat(
                'Y-m-d',
                $birthDate
            );
        }

        $command = new AdminUpdateCommand(
            $request->input('id'),
            $request->input('name'),
            $request->input('last_name'),
            $request->input('passport'),
            $unsubscribedDate,
            $birthDate,
            $request->input('result'),
            $request->input('company_name'),
            $request->input('judge_id')
        );

        return $this->bus->dispatch($command);
    }

    /**
     * @param AdminDeleteRequest $request
     * @return JsonResponse
     */
    public function delete(AdminDeleteRequest $request): JsonResponse
    {
        $this->bus->addHandler(
            AdminDeleteCommand::class,
            AdminDeleteHandler::class
        );

        $command = new AdminDeleteCommand($request->input('id'));

        return $this->bus->dispatch($command);
    }
}
