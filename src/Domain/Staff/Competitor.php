<?php


namespace Olympics\Domain\Staff;

use DateTime;

class Competitor extends Staff
{
    private $birthDate;
    private $result;

    /**
     * Competitor constructor.
     * @param string $name
     * @param string $lastName
     * @param string $passport
     * @param DateTime $birthDate
     * @param string $result
     * @throws \Exception
     */
    public function __construct(
        string $name,
        string $lastName,
        string $passport,
        DateTime $birthDate,
        string $result
    ) {
        $this->birthDate = $birthDate;
        $this->result = $result;
        parent::__construct($name, $lastName, $passport);
    }

    /**
     * @return DateTime
     */
    public function getBirthDate(): DateTime
    {
        return $this->birthDate;
    }

    /**
     * @param DateTime $birthDate
     */
    public function setBirthDate(DateTime $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return string
     */
    public function getResult(): string
    {
        return $this->result;
    }

    /**
     * @param string $result
     */
    public function setResult(string $result): void
    {
        $this->result = $result;
    }
}
