<?php


namespace Olympics\Domain\Staff;

use DateTime;

class Journalist extends Staff
{
    private $companyName;

    /**
     * Journalist constructor.
     * @param string $name
     * @param string $lastName
     * @param string $passport
     * @param string $companyName
     * @throws \Exception
     */
    public function __construct(
        string $name,
        string $lastName,
        string $passport,
        string $companyName
    ) {
        $this->companyName = $companyName;
        parent::__construct($name, $lastName, $passport);
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
