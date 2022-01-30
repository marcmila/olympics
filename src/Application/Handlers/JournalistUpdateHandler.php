<?php


namespace Olympics\Application\Handlers;

use Exception;
use Illuminate\Http\JsonResponse;
use Olympics\Application\Commands\JournalistUpdateCommand;
use Olympics\Domain\Staff\Journalist;
use Olympics\Domain\Staff\Staff;
use Olympics\Domain\Staff\StaffRepositoryInterface as StaffRepository;

class JournalistUpdateHandler implements HandlerInterface
{
    private $staffRepository;

    /**
     * JournalistUpdateHandler constructor.
     * @param StaffRepository $staffRepository
     */
    public function __construct(StaffRepository $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }

    /**
     * @param JournalistUpdateCommand $command
     * @return JsonResponse
     * @throws \Exception
     */
    public function handle(JournalistUpdateCommand $command): JsonResponse
    {
        try {
            $journalist = $this->staffRepository->getById($command->getId());

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

        if (is_null($journalist)) {
            return JsonResponse::create(
                [
                    'status' => 'failed',
                    'message' => 'Not found.'
                ],
                404
            );
        }

        if (!$journalist instanceof Journalist) {
            return JsonResponse::create(
                [
                    'status' => 'failed',
                    'message' => 'Is not a journalist.'
                ],
                404
            );
        }

        $journalist = $this->updateJournalist($command, $journalist);

        try {
            $this->staffRepository->update($journalist);

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

        $message = $journalist->getName() . ' updated successfully.';
        return JsonResponse::create(
            [
                'status' => 'success',
                'data' => $journalist->toArray(),
                'message' => $message
            ],
            200
        );
    }

    /**
     * @param JournalistUpdateCommand $command
     * @param Staff $journalist
     * @return Staff
     */
    public function updateJournalist(JournalistUpdateCommand $command, Staff $journalist): Staff
    {
        if (!is_null($command->getName())) {
            $journalist->setName($command->getName());
        }

        if (!is_null($command->getLastName())) {
            $journalist->setLastName($command->getLastName());
        }

        if (!is_null($command->getPassport())) {
            $journalist->setPassport($command->getPassport());
        }

        if (!is_null($command->getCompanyName())) {
            $journalist->setCompanyName($command->getCompanyName());
        }

        return $journalist;
    }
}
