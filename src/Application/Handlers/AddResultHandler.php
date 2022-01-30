<?php


namespace Olympics\Application\Handlers;

use Exception;
use Illuminate\Http\JsonResponse;
use Olympics\Application\Commands\AddResultCommand;
use Olympics\Domain\Result\Result;
use Olympics\Domain\Result\ResultRepositoryInterface as ResultRepository;
use Olympics\Domain\Staff\Competitor;
use Olympics\Domain\Staff\StaffRepositoryInterface as StaffRepository;

class AddResultHandler implements HandlerInterface
{
    private $resultRepository;
    private $staffRepository;

    /**
     * AddResultHandler constructor.
     * @param ResultRepository $resultRepository
     * @param StaffRepository $staffRepository
     */
    public function __construct(
        ResultRepository $resultRepository,
        StaffRepository $staffRepository
    ) {
        $this->resultRepository = $resultRepository;
        $this->staffRepository = $staffRepository;
    }

    /**
     * @param AddResultCommand $command
     * @return JsonResponse
     * @throws \Exception
     */
    public function handle(AddResultCommand $command): JsonResponse
    {
        try {
            $competitor = $this->staffRepository->getById($command->getCompetitorId());

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

        if (is_null($competitor)) {
            return JsonResponse::create(
                [
                    'status' => 'failed',
                    'message' => 'Not found.'
                ],
                404
            );
        }

        if (!$competitor instanceof Competitor) {
            return JsonResponse::create(
                [
                    'status' => 'failed',
                    'message' => 'Is not a competitor.'
                ],
                404
            );
        }

        $result = new Result(
            $competitor,
            $command->getModality(),
            $command->getPosition()
        );

        try {
            $this->resultRepository->create($result);
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

        $message = 'Result added successfully.';
        return JsonResponse::create(
            [
                'status' => 'success',
                'data' => $result->toArray(),
                'message' => $message
            ],
            200
        );
    }
}
