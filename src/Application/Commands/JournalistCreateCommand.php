<?php


namespace Olympics\Application\Commands;


class JournalistCreateCommand implements CommandInterface
{
    private $name;
    private $lastName;
    private $passport;
    private $companyName;

    /**
     * JournalistCreateCommand constructor.
     * @param string $name
     * @param string $lastName
     * @param string $passport
     * @param string $companyName
     */
    public function __construct(
        string $name,
        string $lastName,
        string $passport,
        string $companyName
    ) {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->passport = $passport;
        $this->companyName = $companyName;
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
