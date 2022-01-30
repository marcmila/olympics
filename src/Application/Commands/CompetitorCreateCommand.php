<?php


namespace Olympics\Application\Commands;


use DateTime;

class CompetitorCreateCommand implements CommandInterface
{
    private $name;
    private $lastName;
    private $passport;
    private $birthDate;

    /**
     * CompetitorCreateCommand constructor.
     * @param string $name
     * @param string $lastName
     * @param string $passport
     * @param DateTime $birthDate
     */
    public function __construct(
        string $name,
        string $lastName,
        string $passport,
        DateTime $birthDate
    ) {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->passport = $passport;
        $this->birthDate = $birthDate;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getPassport(): string
    {
        return $this->passport;
    }

    /**
     * @param string $passport
     */
    public function setPassport(string $passport): void
    {
        $this->passport = $passport;
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
}
