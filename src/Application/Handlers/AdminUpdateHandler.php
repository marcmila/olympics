<?php


namespace Olympics\Application\Handlers;

use Exception;
use Illuminate\Http\JsonResponse;
use Olympics\Application\Commands\AdminUpdateCommand;
use Olympics\Domain\Staff\Admin;
use Olympics\Domain\Staff\Competitor;
use Olympics\Domain\Staff\Journalist;
use Olympics\Domain\Staff\Judge;
use Olympics\Domain\Staff\Staff;
use Olympics\Domain\Staff\StaffRepositoryInterface as StaffRepository;

class AdminUpdateHandler implements HandlerInterface
{
    private $staffRepository;

    /**
     * AdminUpdateHandler constructor.
     * @param StaffRepository $staffRepository
     */
    public function __construct(StaffRepository $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }

    /**
     * @param AdminUpdateCommand $command
     * @return JsonResponse
     * @throws \Exception
     */
    public function handle(AdminUpdateCommand $command): JsonResponse
    {
        try {
            $staff = $this->staffRepository->getById($command->getId());

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

        if (is_null($staff)) {
            return JsonResponse::create(
                [
                    'status' => 'failed',
                    'message' => 'Not found.'
                ],
                404
            );
        }

        $staff = $this->updateStaffByType($command, $staff);

        try {
            $this->staffRepository->update($staff);

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

        $message = $staff->getName() . ' updated successfully.';
        return JsonResponse::create(
            [
                'status' => 'success',
                'data' => $staff->toArray(),
                'message' => $message
            ],
            200
        );
    }

    /**
     * @param AdminUpdateCommand $command
     * @param Staff $staff
     * @return Staff
     * @throws Exception
     */
    public function updateStaffByType(AdminUpdateCommand $command, Staff $staff): Staff
    {
        if (!is_null($command->getName())) {
            $staff->setName($command->getName());
        }

        if (!is_null($command->getLastName())) {
            $staff->setLastName($command->getLastName());
        }

        if (!is_null($command->getPassport())) {
            $staff->setPassport($command->getPassport());
        }

        if ($staff instanceof Admin) {
            if (!is_null($command->getUnsubscribedDate())) {
                $staff->setUnsubscribedDate($command->getUnsubscribedDate());
            }

        } elseif ($staff instanceof Competitor) {
            if (!is_null($command->getBirthDate())) {
                $staff->setBirthDate($command->getBirthDate());
            }
            if (!is_null($command->getResult())) {
                $staff->setResult($command->getResult());
            }

        } elseif ($staff instanceof Journalist) {
            if (!is_null($command->getCompanyName())) {
                $staff->setCompanyName($command->getCompanyName());
            }

        } elseif ($staff instanceof Judge) {
            if (!is_null($command->getJudgeId())) {
                $staff->setJudgeId($command->getJudgeId());
            }
        }

        return $staff;
    }
}
