<?php


namespace Olympics\Application\Handlers;

use Exception;
use Illuminate\Http\JsonResponse;
use Olympics\Application\Commands\JournalistCreateCommand;
use Olympics\Domain\Staff\Journalist;
use Olympics\Domain\Staff\StaffRepositoryInterface as StaffRepository;

class JournalistCreateHandler implements HandlerInterface
{
    private $staffRepository;

    /**
     * JournalistCreateHandler constructor.
     * @param StaffRepository $staffRepository
     */
    public function __construct(StaffRepository $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }

    /**
     * @param JournalistCreateCommand $command
     * @return JsonResponse
     * @throws \Exception
     */
    public function handle(JournalistCreateCommand $command): JsonResponse
    {
        $journalist = new Journalist(
            $command->getName(),
            $command->getLastName(),
            $command->getPassport(),
            $command->getCompanyName()
        );
        try {
            $this->staffRepository->create($journalist);
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
                'data' => $journalist->toArray(),
                'message' => $message
            ],
            200
        );
    }
}
