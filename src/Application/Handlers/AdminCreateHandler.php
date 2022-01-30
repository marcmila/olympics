<?php


namespace Olympics\Application\Handlers;

use Exception;
use Illuminate\Http\JsonResponse;
use Olympics\Application\Commands\AdminCreateCommand;
use Olympics\Domain\Staff\Admin;
use Olympics\Domain\Staff\Competitor;
use Olympics\Domain\Staff\Journalist;
use Olympics\Domain\Staff\Judge;
use Olympics\Domain\Staff\Staff;
use Olympics\Domain\Staff\StaffRepositoryInterface as StaffRepository;

class AdminCreateHandler implements HandlerInterface
{
    private $staffRepository;

    /**
     * AdminCreateHandler constructor.
     * @param StaffRepository $staffRepository
     */
    public function __construct(StaffRepository $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }

    /**
     * @param AdminCreateCommand $command
     * @return JsonResponse
     * @throws \Exception
     */
    public function handle(AdminCreateCommand $command): JsonResponse
    {
        $staff = $this->buildStaffByType($command);

        try {
            $this->staffRepository->create($staff);
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
                'data' => $staff->toArray(),
                'message' => $message
            ],
            200
        );
    }

    /**
     * @param AdminCreateCommand $command
     * @return Staff
     * @throws Exception
     */
    public function buildStaffByType(AdminCreateCommand $command): Staff
    {
        switch ($command->getStaffType()) {
            case 'admin':
                $staff = new Admin(
                    $command->getName(),
                    $command->getLastName(),
                    $command->getPassport(),
                    $command->getUnsubscribedDate()
                );
                break;

            case 'competitor':
                $staff = new Competitor(
                    $command->getName(),
                    $command->getLastName(),
                    $command->getPassport(),
                    $command->getBirthDate(),
                    $command->getResult()
                );
                break;

            case 'journalist':
                $staff = new Journalist(
                    $command->getName(),
                    $command->getLastName(),
                    $command->getPassport(),
                    $command->getCompanyName()
                );
                break;

            case 'judge':
                $staff = new Judge(
                    $command->getName(),
                    $command->getLastName(),
                    $command->getPassport(),
                    $command->getJudgeId()
                );
                break;
        }

        return $staff;
    }
}
