<?php


namespace Olympics\Application\Commands;


use DateTime;

class AdminCreateCommand implements CommandInterface
{
    private $name;
    private $lastName;
    private $passport;
    private $staffType;
    private $unsubscribedDate;
    private $birthDate;
    private $companyName;
    private $judgeId;

    /**
     * AdminCreateCommand constructor.
     * @param string $name
     * @param string $lastName
     * @param string $passport
     * @param string $staffType
     * @param DateTime|null $unsubscribedDate
     * @param DateTime|null $birthDate
     * @param string|null $companyName
     * @param int|null $judgeId
     */
    public function __construct(
        string $name,
        string $lastName,
        string $passport,
        string $staffType,
        ?DateTime $unsubscribedDate,
        ?DateTime $birthDate,
        ?string $companyName,
        ?int $judgeId
    ) {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->passport = $passport;
        $this->staffType = $staffType;
        $this->unsubscribedDate = $unsubscribedDate;
        $this->birthDate = $birthDate;
        $this->companyName = $companyName;
        $this->judgeId = $judgeId;
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
     * @return mixed
     */
    public function getStaffType()
    {
        return $this->staffType;
    }

    /**
     * @param mixed $staffType
     */
    public function setStaffType($staffType): void
    {
        $this->staffType = $staffType;
    }

    /**
     * @return DateTime|null
     */
    public function getUnsubscribedDate(): ?DateTime
    {
        return $this->unsubscribedDate;
    }

    /**
     * @param DateTime|null $unsubscribedDate
     */
    public function setUnsubscribedDate(?DateTime $unsubscribedDate): void
    {
        $this->unsubscribedDate = $unsubscribedDate;
    }

    /**
     * @return DateTime|null
     */
    public function getBirthDate(): ?DateTime
    {
        return $this->birthDate;
    }

    /**
     * @param DateTime|null $birthDate
     */
    public function setBirthDate(?DateTime $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return string|null
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * @param string|null $companyName
     */
    public function setCompanyName(?string $companyName): void
    {
        $this->companyName = $companyName;
    }

    /**
     * @return int|null
     */
    public function getJudgeId(): ?int
    {
        return $this->judgeId;
    }

    /**
     * @param int|null $judgeId
     */
    public function setJudgeId(?int $judgeId): void
    {
        $this->judgeId = $judgeId;
    }
}
