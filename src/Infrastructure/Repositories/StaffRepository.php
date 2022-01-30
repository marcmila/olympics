<?php


namespace Olympics\Infrastructure\Repositories;

use Doctrine\ORM\EntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Exception;
use Olympics\Domain\Staff\Staff;
use Olympics\Domain\Staff\StaffRepositoryInterface;

class StaffRepository extends EntityRepository implements StaffRepositoryInterface
{
    /**
     * StaffRepository constructor.
     * @param ManagerRegistry $managerRegistry
     */
    public function __construct(ManagerRegistry $managerRegistry)
    {
        $staffClass = Staff::class;
        $em = $managerRegistry->getManagerForClass($staffClass);
        parent::__construct($em, $em->getClassMetadata($staffClass));
    }

    /**
     * @param Staff $staff
     * @return bool
     * @throws Exception
     */
    public function create(Staff $staff): bool
    {
        $em = $this->getEntityManager();

        try {
            $em->persist($staff);

        } catch (Exception $e) {
            throw new Exception('Something was wrong trying to persist the data', 500, $e);
        }

        $em->flush();
        return true;
    }

    /**
     * @param int $id
     * @return Staff|null
     * @throws Exception
     */
    public function getById(int $id): ?Staff
    {
        try {
            return $this->findOneBy(['id' => $id, 'deleted' => false]);

        } catch (Exception $e) {
            throw new Exception('Something was wrong trying to persist the data', 500, $e);
        }
    }

    /**
     * @param Staff $staff
     * @return bool
     * @throws Exception
     */
    public function update(Staff $staff): bool
    {
        $this->create($staff);
        return true;
    }

    /**
     * @param Staff $staff
     * @return bool
     * @throws Exception
     */
    public function delete(Staff $staff): bool
    {
        $staff->setDeleted(true);
        $this->create($staff);
        return true;
    }
}
