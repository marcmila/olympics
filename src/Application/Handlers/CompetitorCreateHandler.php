<?php


namespace Olympics\Application\Handlers;


use Exception;
use Illuminate\Http\JsonResponse;
use Olympics\Application\Commands\CompetitorCreateCommand;
use Olympics\Domain\Staff\Competitor;
use Olympics\Domain\Staff\StaffRepositoryInterface as StaffRepository;

class CompetitorCreateHandler implements HandlerInterface
{
    private $staffRepository;

    /**
     * CompetitorCreateHandler constructor.
     * @param StaffRepository $staffRepository
     */
    public function __construct(StaffRepository $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }

    /**
     * @param CompetitorCreateCommand $command
     * @return JsonResponse
     * @throws \Exception
     */
    public function handle(CompetitorCreateCommand $command): JsonResponse
    {
        $competitor = new Competitor(
            $command->getName(),
            $command->getLastName(),
            $command->getPassport(),
            $command->getBirthDate()
        );

        try {
            $this->staffRepository->create($competitor);
        } catch (Exception $e) {
            return JsonResponse::create(
                [
                    'status' => 'failed',
                    'data' => [],
                    'message' => $e->getMessage()
                ],
                500
            );
        }

        $message = $command->getName() . ' created successfully.';
        return JsonResponse::create(
            [
                'status' => 'success',
                'data' => $competitor->toArray(),
                'message' => $message
            ],
            200
        );
    }
}
