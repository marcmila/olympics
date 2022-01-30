<?php


namespace Olympics\Application\Handlers;

use Exception;
use Illuminate\Http\JsonResponse;
use Olympics\Application\Commands\AdminDeleteCommand;
use Olympics\Domain\Staff\StaffRepositoryInterface as StaffRepository;

class AdminDeleteHandler implements HandlerInterface
{
    private $staffRepository;

    /**
     * AdminDeleteHandler constructor.
     * @param StaffRepository $staffRepository
     */
    public function __construct(StaffRepository $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }

    /**
     * @param AdminDeleteCommand $command
     * @return JsonResponse
     * @throws \Exception
     */
    public function handle(AdminDeleteCommand $command): JsonResponse
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

        try {
            $this->staffRepository->delete($staff);

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

        $message = $staff->getName() . ' deleted successfully.';
        return JsonResponse::create(
            [
                'status' => 'success',
                'message' => $message
            ],
            200
        );
    }
}
