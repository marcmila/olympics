<?php


namespace Olympics\Domain\Staff;

interface StaffRepositoryInterface
{
    public function create(Staff $staff): bool;
    public function getById(int $id): ?Staff;
    public function update(Staff $staff): bool;
    public function delete(Staff $staff): bool;
}
