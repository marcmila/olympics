<?php


class Admin extends Staff
{
    private $unsubscribedDate;

    /**
     * Admin constructor.
     * @param int $id
     * @param string $name
     * @param string $lastName
     * @param string $passport
     * @param DateTime $unsubscribedDate
     * @param DateTime $created
     * @param DateTime $modified
     * @param bool $deleted
     */
    public function __construct(
        int $id,
        string $name,
        string $lastName,
        string $passport,
        DateTime $unsubscribedDate,
        DateTime $created,
        DateTime $modified,
        bool $deleted
    ) {
        $this->unsubscribedDate = $unsubscribedDate;
        parent::__construct($id, $name, $lastName, $passport, $created, $modified, $deleted);
    }

    /**
     * @return DateTime
     */
    public function getUnsubscribedDate(): DateTime
    {
        return $this->unsubscribedDate;
    }

    /**
     * @param DateTime $unsubscribedDate
     */
    public function setUnsubscribedDate(DateTime $unsubscribedDate): void
    {
        $this->unsubscribedDate = $unsubscribedDate;
    }
}
