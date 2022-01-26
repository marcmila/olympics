<?php


abstract class Staff
{
    private $id;
    private $name;
    private $lastName;
    private $passport;
    private $created;
    private $modified;
    private $deleted;

    /**
     * Staff constructor.
     * @param int $id
     * @param string $name
     * @param string $lastName
     * @param string $passport
     * @param DateTime $created
     * @param DateTime $modified
     * @param bool $deleted
     */
    public function __construct(
        int $id,
        string $name,
        string $lastName,
        string $passport,
        DateTime $created,
        DateTime $modified,
        bool $deleted
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->passport = $passport;
        $this->created = $created;
        $this->modified = $modified;
        $this->deleted = $deleted;
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
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @param DateTime $created
     */
    public function setCreated(DateTime $created): void
    {
        $this->created = $created;
    }

    /**
     * @return DateTime
     */
    public function getModified(): DateTime
    {
        return $this->modified;
    }

    /**
     * @param DateTime $modified
     */
    public function setModified(DateTime $modified): void
    {
        $this->modified = $modified;
    }

    /**
     * @return bool
     */
    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    /**
     * @param bool $deleted
     */
    public function setDeleted(bool $deleted): void
    {
        $this->deleted = $deleted;
    }
}
