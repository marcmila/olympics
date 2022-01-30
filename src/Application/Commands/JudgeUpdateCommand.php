<?php


namespace Olympics\Application\Commands;


class JudgeUpdateCommand implements CommandInterface
{
    private $id;
    private $name;
    private $lastName;
    private $passport;
    private $judgeId;

    /**
     * JudgeUpdateCommand constructor.
     * @param int $id
     * @param string|null $name
     * @param string|null $lastName
     * @param string|null $passport
     * @param int|null $judgeId
     */
    public function __construct(
        int $id,
        ?string $name,
        ?string $lastName,
        ?string $passport,
        ?int $judgeId
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->passport = $passport;
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
