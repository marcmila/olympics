<?php


namespace Olympics\Application\Handlers;

use Exception;
use Illuminate\Http\JsonResponse;
use Olympics\Application\Commands\JudgeUpdateCommand;
use Olympics\Domain\Staff\Staff;
use Olympics\Domain\Staff\StaffRepositoryInterface as StaffRepository;

class JudgeUpdateHandler implements HandlerInterface
{
    private $staffRepository;

    /**
     * JudgeUpdateHandler constructor.
     * @param StaffRepository $staffRepository
     */
    public function __construct(StaffRepository $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }

    /**
     * @param JudgeUpdateCommand $command
     * @return JsonResponse
     * @throws \Exception
     */
    public function handle(JudgeUpdateCommand $command): JsonResponse
    {
        try {
            $judge = $this->staffRepository->getById($command->getId());

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

        if (is_null($judge)) {
            return JsonResponse::create(
                [
                    'status' => 'failed',
                    'message' => 'Not found.'
                ],
                404
            );
        }

        $judge = $this->updateStaffByType($command, $judge);

        try {
            $this->staffRepository->update($judge);

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

        $message = $judge->getName() . ' updated successfully.';
        return JsonResponse::create(
            [
                'status' => 'success',
                'data' => $judge->toArray(),
                'message' => $message
            ],
            200
        );
    }

    /**
     * @param JudgeUpdateCommand $command
     * @param Staff $judge
     * @return Staff
     * @throws Exception
     */
    public function updateStaffByType(JudgeUpdateCommand $command, Staff $judge): Staff
    {
        if (!is_null($command->getName())) {
            $judge->setName($command->getName());
        }

        if (!is_null($command->getLastName())) {
            $judge->setLastName($command->getLastName());
        }

        if (!is_null($command->getPassport())) {
            $judge->setPassport($command->getPassport());
        }

        if (!is_null($command->getJudgeId())) {
            $judge->setJudgeId($command->getJudgeId());
        }

        return $judge;
    }
}
