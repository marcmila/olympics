<?php


namespace Olympics\Domain\Result;


use DateTime;
use Olympics\Domain\Staff\Competitor;

class Result
{
    private $id;
    private $competitor;
    private $modality;
    private $position;
    private $created;
    private $modified;
    private $deleted;

    /**
     * Result constructor.
     * @param Competitor $competitor
     * @param string $modality
     * @param int $position
     * @throws \Exception
     */
    public function __construct(Competitor $competitor, string $modality, int $position)
    {
        $this->id = null;
        $this->competitor = $competitor;
        $this->modality = $modality;
        $this->position = $position;
        $dateTime = new DateTime();
        $dateTime->format('Y/m/d H:i:s');
        $this->created = $dateTime;
        $this->modified = $dateTime;
        $this->deleted = false;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return Competitor
     */
    public function getCompetitor(): Competitor
    {
        return $this->competitor;
    }

    /**
     * @param Competitor $competitor
     */
    public function setCompetitor(Competitor $competitor): void
    {
        $this->competitor = $competitor;
    }

    /**
     * @return string
     */
    public function getModality(): string
    {
        return $this->modality;
    }

    /**
     * @param string $modality
     */
    public function setModality(string $modality): void
    {
        $this->modality = $modality;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @param int $position
     */
    public function setPosition(int $position): void
    {
        $this->position = $position;
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

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'competitor_id' => $this->competitor->getId(),
            'modality' => $this->modality,
            'position' => $this->position
        ];
    }
}
