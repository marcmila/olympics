<?php


namespace Olympics\Domain\Result;


interface ResultRepositoryInterface
{
    public function create(Result $result): bool;
}
