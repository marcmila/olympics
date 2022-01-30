<?php


namespace Olympics\Domain\Staff;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;

class Competitor extends Staff
{
    private $birthDate;
    private $results;

    /**
     * Competitor constructor.
     * @param string $name
     * @param string $lastName
     * @param string $passport
     * @param DateTime $birthDate
     * @throws \Exception
     */
    public function __construct(
        string $name,
        string $lastName,
        string $passport,
        DateTime $birthDate
    ) {
        $this->birthDate = $birthDate;
        $this->results = new ArrayCollection();
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
     * @return ArrayCollection
     */
    public function getResults(): ArrayCollection
    {
        return $this->results;
    }

    /**
     * @param ArrayCollection $results
     */
    public function setResults(ArrayCollection $results): void
    {
        $this->results = $results;
    }
}
