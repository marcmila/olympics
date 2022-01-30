<?php


namespace Olympics\Application\Commands;


use DateTime;

class AdminUpdateCommand implements CommandInterface
{
    private $id;
    private $name;
    private $lastName;
    private $passport;
    private $unsubscribedDate;
    private $birthDate;
    private $result;
    private $companyName;
    private $judgeId;

    /**
     * AdminUpdateCommand constructor.
     * @param int $id
     * @param string|null $name
     * @param string|null $lastName
     * @param string|null $passport
     * @param DateTime|null $unsubscribedDate
     * @param DateTime|null $birthDate
     * @param string|null $result
     * @param string|null $companyName
     * @param int|null $judgeId
     */
    public function __construct(
        int $id,
        ?string $name,
        ?string $lastName,
        ?string $passport,
        ?DateTime $unsubscribedDate,
        ?DateTime $birthDate,
        ?string $result,
        ?string $companyName,
        ?int $judgeId
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->passport = $passport;
        $this->unsubscribedDate = $unsubscribedDate;
        $this->birthDate = $birthDate;
        $this->result = $result;
        $this->companyName = $companyName;
        $this->judgeId = $judgeId;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     */
    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string|null
     */
    public function getPassport(): ?string
    {
        return $this->passport;
    }

    /**
     * @param string|null $passport
     */
    public function setPassport(?string $passport): void
    {
        $this->passport = $passport;
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
    public function getResult(): ?string
    {
        return $this->result;
    }

    /**
     * @param string|null $result
     */
    public function setResult(?string $result): void
    {
        $this->result = $result;
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
