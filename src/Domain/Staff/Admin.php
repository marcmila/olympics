<?php


namespace Olympics\Domain\Staff;

use DateTime;

class Admin extends Staff
{
    private $unsubscribedDate;

    /**
     * Admin constructor.
     * @param string $name
     * @param string $lastName
     * @param string $passport
     * @param DateTime $unsubscribedDate
     * @throws \Exception
     */
    public function __construct(
        string $name,
        string $lastName,
        string $passport,
        DateTime $unsubscribedDate
    ) {
        $this->unsubscribedDate = $unsubscribedDate;
        parent::__construct($name, $lastName, $passport);
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
