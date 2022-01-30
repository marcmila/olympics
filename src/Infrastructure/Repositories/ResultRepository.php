<?php


namespace Olympics\Infrastructure\Repositories;

use Doctrine\ORM\EntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Exception;
use Olympics\Domain\Result\Result;
use Olympics\Domain\Result\ResultRepositoryInterface;

class ResultRepository extends EntityRepository implements ResultRepositoryInterface
{
    /**
     * ResultRepository constructor.
     * @param ManagerRegistry $managerRegistry
     */
    public function __construct(ManagerRegistry $managerRegistry)
    {
        $resultClass = Result::class;
        $em = $managerRegistry->getManagerForClass($resultClass);
        parent::__construct($em, $em->getClassMetadata($resultClass));
    }

    /**
     * @param Result $result
     * @return bool
     * @throws Exception
     */
    public function create(Result $result): bool
    {
        $em = $this->getEntityManager();

        try {
            $em->persist($result);

        } catch (Exception $e) {
            throw new Exception('Something was wrong trying to persist the data', 500, $e);
        }

        $em->flush();
        return true;
    }
}
