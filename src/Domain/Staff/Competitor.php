<?php


class Competitor extends Staff
{
    private $birthDate;
    private $result;

    /**
     * Competitor constructor.
     * @param int $id
     * @param string $name
     * @param string $lastName
     * @param string $passport
     * @param DateTime $birthDate
     * @param string $result
     * @param DateTime $created
     * @param DateTime $modified
     * @param bool $deleted
     */
    public function __construct(
        int $id,
        string $name,
        string $lastName,
        string $passport,
        DateTime $birthDate,
        string $result,
        DateTime $created,
        DateTime $modified,
        bool $deleted
    ) {
        $this->birthDate = $birthDate;
        $this->result = $result;
        parent::__construct($id, $name, $lastName, $passport, $created, $modified, $deleted);
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
