<?php


class Journalist extends Staff
{
    private $companyName;

    /**
     * Journalist constructor.
     * @param int $id
     * @param string $name
     * @param string $lastName
     * @param string $passport
     * @param string $companyName
     * @param DateTime $created
     * @param DateTime $modified
     * @param bool $deleted
     */
    public function __construct(
        int $id,
        string $name,
        string $lastName,
        string $passport,
        string $companyName,
        DateTime $created,
        DateTime $modified,
        bool $deleted
    ) {
        $this->companyName = $companyName;
        parent::__construct($id, $name, $lastName, $passport, $created, $modified, $deleted);
    }

    /**
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     */
    public function setCompanyName(string $companyName): void
    {
        $this->companyName = $companyName;
    }
}
